<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_model extends Model
{
     protected $fillable = [
        'name', 'email', 'password','quyen','password','remember_token','created_at','updated_at'
    ];
    protected $primaryKey='id';
    protected $table='users';

}
