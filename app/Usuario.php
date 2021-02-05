<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends User
{
    use Notifiable;
    use HasRoles;

    protected $table = 'usuario';

    protected $fillable = [
        'email', 'username', 'password', 'tipousuario', 'empleado_id'
    ];

    protected $hidden = [
        'password', 'remmeber_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
}
