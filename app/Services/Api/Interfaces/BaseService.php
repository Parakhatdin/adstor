<?php


namespace App\Services\Api\Interfaces;


use Illuminate\Http\Request;

interface BaseService
{
    public function index();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function destroy($id);
}
