<?php

namespace App\Services;

use App\Interfaces\PostInterface;

class PostService
{
    protected $postInterface;

    public function __construct(PostInterface $postInterface) {
        $this->postInterface = $postInterface;
    }
    public function getPost(){
        return $this->postInterface->getPost();
    }

    public function savePost($request){
        $post = $this->mapPost($request);
        return $this->postInterface->savePost($post);
    }

    public function mapPost($request){
        return [
            'user_id' => $request->user()->id,
            'content' => $request->content,
        ];
    }

    public function deletePost($post){
        return $this->postInterface->deletePost($post);
    }

    public function getPostById($post){
        return $this->postInterface->getPostById($post);
    }

    public function updatePost($request,$post){
        $posts = ['content' => $request->content];
        return $this->postInterface->updatePost($posts,$post);
    }
}

?>
