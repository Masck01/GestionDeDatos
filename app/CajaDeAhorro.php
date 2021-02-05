<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CajaDeAhorro extends Model
{
    protected $table = 'cajadeahorro';

    protected $fillable = [
        'codigo','banco_id'
    ];
}
