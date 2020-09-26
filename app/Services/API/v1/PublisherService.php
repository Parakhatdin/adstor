<?php


namespace App\Services\API\v1;

use App\Repositories\API\v1\Interfaces\PublisherRepository;
use Illuminate\Http\Request;
use App\Services\API\v1\Interfaces\PublisherService as PublisherServiceInterface;
use Illuminate\Support\Facades\Validator;

class PublisherService implements PublisherServiceInterface
{

    private $publisherRepository;

    /**
     * PublisherService constructor.
     * @param PublisherRepository $publisherRepository
     */
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }

    public function index()
    {
        return $this->publisherRepository->getAll();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bot_token' => 'required',
            'name' => 'required',
            'ext_id' => 'required',
        ]);

        if ($validator->fails()){
            return "error";
        }

        try {
            return $this->publisherRepository->store($validator->validated());
        } catch (\PDOException $e) {
            return response("duplicated");
        }
    }

    public function show($id)
    {
        $a = $this->publisherRepository->getById($id);
        if (!$a){
           return "error";
        }
        return $a;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bot_token' => 'string',
            'name' => 'string',
            'ext_id' => 'string'
        ]);

        if ($validator->fails()) {
            return "error";
        }

        try {
            return $this->publisherRepository->update($validator->validated(), $id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            return $this->publisherRepository->delete($id);
        } catch (\Exception $e) {
            return "error";
        }
    }
}
