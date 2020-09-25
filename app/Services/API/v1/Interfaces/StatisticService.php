<?php


namespace App\Services\API\v1\Interfaces;


use App\Models\Statistic;
use Illuminate\Http\Request;

interface StatisticService
{
    public function index();

    public function show(Statistic $post);

}
