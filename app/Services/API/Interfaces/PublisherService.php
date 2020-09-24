<?php


namespace App\Services\API\Interfaces;

use App\Models\Publisher;
use Illuminate\Http\Request;

interface PublisherService
{
    public function index();

    public function store(Request $request);

    public function show(Publisher $post);

    public function update(Request $request, Publisher $post);

    public function destroy(Publisher $post);
}
