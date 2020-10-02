<?php


namespace App\Services\Api;


use App\Models\Statistic;
use App\Repositories\Api\Interfaces\StatisticRepository;
use App\Services\Api\Interfaces\StatisticService as StatisticServiceInterface;

class StatisticService implements StatisticServiceInterface
{
    private $statisticRepository;

    /**
     * StatisticService constructor.
     * @param StatisticRepository $statisticRepository
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
