<?php


namespace App\Repositories\API\v1\Interfaces;


interface BaseRepository
{
    public function getAll();

    public function store($validatedData);

    public function getById($id);

    public function update($validatedData, $id);

    public function delete($id);
}
