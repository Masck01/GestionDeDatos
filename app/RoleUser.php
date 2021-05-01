<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
  protected $table = "model_has_roles";

  protected $fillable = [
    'role_id','usuario_id','model_type'
  ];
}
