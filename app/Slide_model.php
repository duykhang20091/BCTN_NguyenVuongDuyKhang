<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide_model extends Model
{
     protected $fillable = [
        'Ten', 'Hinh', 'NoiDung','link','created_at','updated_at'
    ];
    protected $primaryKey='id';
    protected $table='slide';

}
