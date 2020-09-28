<?php


namespace App\Repositories\Api\Interfaces;


interface BaseRepository
{
    public function getAll();

    public function store($validatedData);

    public function getById($id);

    public function update($validatedData, $id);

    public function delete($id);
}
