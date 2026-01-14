<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = [
        'user_id',
        'client_id',
        'long_url',
        'short_code',
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
