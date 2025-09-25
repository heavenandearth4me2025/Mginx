<?php

namespace App\Models\Rough;

use Illuminate\Database\Eloquent\Model;

class MicrosoftUser extends Model
{
    protected $fillable = ['info'];

    protected $casts = [
        'info' => 'array',
    ];
}
