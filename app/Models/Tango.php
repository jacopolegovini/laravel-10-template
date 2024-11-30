<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tango extends Model
{
    // Specifica la tabella associata (opzionale se il nome è "tangos")
    protected $table = 'tango';

    // Specifica le colonne che possono essere compilate tramite `create()`
    protected $fillable = [
        'initial_position_icon',
        'initial_position_symbol',
    ];
}
