<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEntity extends Model
{
  protected $guarded = ['id'];
  protected $table = 'user_entities';
}
