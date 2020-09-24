<?php


namespace App\Services\API\Interfaces;


use App\Models\Channel;
use Illuminate\Http\Request;

interface ChannelService
{
    public function index();

    public function store(Request $request);

    public function show(Channel $post);

    public function update(Request $request, Channel $post);

    public function destroy(Channel $post);
}
