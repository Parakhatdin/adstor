<?php


namespace App\Services\API\v1;


use App\Models\Publisher;
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
            return response()->json($validator->errors());
        }

        return $this->publisherRepository->store($validator->validated());
    }

    public function show(Publisher $post)
    {
        // TODO: Implement show() method.
    }

    public function update(Request $request, Publisher $post)
    {
        // TODO: Implement update() method.
    }

    public function destroy(Publisher $post)
    {
        // TODO: Implement destroy() method.
    }
}
