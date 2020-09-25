<?php


namespace App\Repositories\API\v1\Interfaces;


interface PublisherRepository
{
    public function getAll();

    public function store($validatedData);
}
