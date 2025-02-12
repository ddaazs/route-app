<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getPost(){
        return Post::all();
    }

    public function savePost($postRequest){
        return Post::create($postRequest);
    }

    public function deletePost($post){
        return Post::destroy($post->id);
    }
}
