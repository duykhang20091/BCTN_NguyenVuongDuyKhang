<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoaiTinTuc extends Model
{
     protected $fillable = [
        'id', 'Ten', 'TenKhongDau','created_at','updated_at'
    ];
    protected $primaryKey='id';
    protected $table='theloai';

}
