<?php

namespace App\Interfaces;

interface PostInterface
{
    public function getPost();

    public function savePost($request);

    public function deletePost($post);

    public function getPostById($post);

    public function updatePost($request,$post);
}
