<?php


namespace App\Services\API\v1;


use App\Models\Post;
use App\Models\Statistic;
use App\Repositories\API\v1\Interfaces\StatisticRepository;
use Illuminate\Http\Request;
use \App\Services\API\v1\Interfaces\StatisticService as StatisticServiceInterface;

class StatisticService implements StatisticServiceInterface
{
    private $statisticRepository;

    /**
     * StatisticService constructor.
     */
    public function __construct(StatisticRepository $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show(Statistic $post)
    {
        // TODO: Implement show() method.
    }

}
