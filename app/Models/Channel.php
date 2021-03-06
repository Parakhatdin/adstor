<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['publisher_id', 'telegram_id', 'type'];

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }
}
