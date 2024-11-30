<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tango extends Model
{
    use HasFactory;

    protected $casts = [
        'initial_position_icon' => 'array',
        'initial_position_symbol' => 'array',
    ];

    protected $fillable = [

        'initial_position_icon',
        'initial_position_symbol'

    ];
}
