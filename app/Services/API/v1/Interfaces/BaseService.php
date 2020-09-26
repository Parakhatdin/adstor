<?php


namespace App\Services\API\v1\Interfaces;


use Illuminate\Http\Request;

interface BaseService
{
    public function index();

    public function store(Request $request);

    public function show($id);

    public function update(Request $request, $id);

    public function destroy($id);
}
