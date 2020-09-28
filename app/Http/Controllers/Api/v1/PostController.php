<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\Api\Interfaces\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    /**
     * @var PostService
     */
    private $postService;
    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response($this->postService->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'channel_id' => 'required',
            'title' => 'required',
            'text' => 'required',
            'media' => 'required',
            'post_time' => 'required',
            'published_at' => 'required',
        ]);

        if ($validator->fails()){
            return response("error");
        }

        return response($this->postService->store($validator->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return response($this->postService->show($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'channel_id' => 'integer',
            'title' => 'string',
            'text' => 'text',
            'media' => 'string',
            'post_time' => 'date',
            'published_at' => 'date',
        ]);

        if ($validator->fails()) {
            return response("error");
        }

        return response($this->postService->update($validator->validated(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        return response($this->postService->destroy($id));
    }
}
