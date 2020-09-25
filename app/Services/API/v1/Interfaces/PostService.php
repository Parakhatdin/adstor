<?php


namespace App\Services\API\v1\Interfaces;


use App\Models\Post;
use Illuminate\Http\Request;

interface PostService
{
    public function index();

    public function store(Request $request);

    public function show(Post $post);

    public function update(Request $request, Post $post);

    public function destroy(Post $post);
}
