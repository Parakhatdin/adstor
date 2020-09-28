<?php


namespace App\Services\Api\Interfaces;


use App\Models\Statistic;
use Illuminate\Http\Request;

interface StatisticService
{
    public function index();

    public function show(Statistic $post);

}
