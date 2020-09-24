<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Services\API\Interfaces\StatisticService;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    private $statisticService;

    /**
     * StatisticController constructor.
     * @param StatisticService $statisticService
     */
    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->statisticService->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        return $this->statisticService->show($statistic);
    }
}
