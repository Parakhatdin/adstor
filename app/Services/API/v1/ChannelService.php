<?php


namespace App\Services\API\v1;


use App\Repositories\API\v1\Interfaces\ChannelRepository;
use Illuminate\Http\Request;
use App\Services\API\v1\Interfaces\ChannelService as ChannelServiceInterface;
use Illuminate\Support\Facades\Validator;

class ChannelService implements ChannelServiceInterface
{
    private $channelRepository;

    /**
     * ChannelService constructor.
     * @param ChannelRepository $channelRepository
     */
    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

    public function index()
    {
        return $this->channelRepository->getAll();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'publisher_id' => 'required',
            'telegram_id' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()){
            return "error";
        }

        try {
            return $this->channelRepository->store($validator->validated());
        } catch (\PDOException $e) {
            return response("duplicated");
        }
    }

    public function show($id)
    {
        $a = $this->channelRepository->getById($id);
        if (!$a){
            return "error";
        }
        return $a;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'publisher_id' => 'integer',
            'telegram_id' => 'string',
            'type' => 'string'
        ]);

        if ($validator->fails()) {
            return "error";
        }

        try {
            return $this->channelRepository->update($validator->validated(), $id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            return $this->channelRepository->delete($id);
        } catch (\Exception $e) {
            return "error";
        }
    }
}
