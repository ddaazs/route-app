<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->getPost();
        return view('post.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = $this->postService->savePost($request);
        if ($post) {
            return back()->with('success', 'Post created successfully');
        }
        return redirect()->route('posts.index')->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = $this->postService->getPostById($post);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('edit', $post);
        // $response = Gate::inspect('edit', $post);
        // if ($response->allowed()) {
            $post = $this->postService->getPostById($post);
            $editing = true;
            return view('post.show', compact('post', 'editing'));
        // }
        // else {
        //     $response->message();
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post = $this->postService->updatePost($request, $post);
        if ($post) {
            return back()->with('success', 'Post updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = $this->postService->deletePost($post);
        if ($post) {
            return back()->with('success', 'Post deleted successfully');
        }
        return redirect()->route('posts.index')->with('error', 'Something went wrong');
    }
}
