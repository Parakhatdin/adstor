<?php


namespace App\Services\API\v1;


use App\Models\Post;
use App\Repositories\API\v1\Interfaces\PostRepository;
use Illuminate\Http\Request;
use \App\Services\API\v1\Interfaces\PostService as PostServiceInterface;
use Illuminate\Support\Facades\Validator;

class PostService implements PostServiceInterface
{
    private $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return $this->postRepository->getAll();
    }

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
            return "error";
        }

        try {
            return $this->postRepository->store($validator->validated());
        } catch (\PDOException $e) {
            return response("duplicated");
        }
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        $a = $this->postRepository->getById($id);
        if (!$a){
            return "error";
        }
        return $a;
    }

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
            return "error";
        }

        try {
            return $this->postRepository->update($validator->validated(), $id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            return $this->postRepository->delete($id);
        } catch (\Exception $e) {
            return "error";
        }
    }
}
