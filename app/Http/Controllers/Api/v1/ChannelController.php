<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\Api\Interfaces\ChannelService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ChannelController extends Controller
{
    private $channelService;

    /**
     * ChannelController constructor.
     * @param ChannelService $channelService
     */
    public function __construct(ChannelService $channelService)
    {
        $this->channelService = $channelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response($this->channelService->index());
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
            'publisher_id' => 'required',
            'telegram_id' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()){
            return response('error');
        }

        return response($this->channelService->store($validator->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return response($this->channelService->show($id));
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
            'publisher_id' => 'integer',
            'telegram_id' => 'string',
            'type' => 'string'
        ]);

        if ($validator->fails()) {
            return response('error');
        }

        return response($this->channelService->update($validator->validated(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        return response($this->destroy($id));
    }
}
