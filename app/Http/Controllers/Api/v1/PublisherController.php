<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\Api\Interfaces\PublisherService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PublisherController extends Controller
{
    private $publisherService;

    /**
     * PublisherController constructor.
     * @param PublisherService $publisherService
     */
    public function __construct(PublisherService $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response($this->publisherService->index());
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
            'bot_token' => 'required',
            'name' => 'required',
            'ext_id' => 'required',
        ]);

        if ($validator->fails()){
            return response("error");
        }

        return response($this->publisherService->store($validator->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return response($this->publisherService->show($id));
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
            'bot_token' => 'string',
            'name' => 'string',
            'ext_id' => 'string'
        ]);

        if ($validator->fails()) {
            return response('error');
        }

        return response($this->publisherService->update($validator->validated(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        return response($this->publisherService->destroy($id));
    }
}
