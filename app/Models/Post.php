<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['channel_id', 'title', 'text', 'media', 'post_time', 'published_id'];

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel');
    }
}
