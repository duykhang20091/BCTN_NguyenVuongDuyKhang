<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin_model extends Model
{
     protected $fillable = [
        'idTheLoai', 'Ten', 'TenKhongDau','created_at','updated_at'
    ];
    protected $primaryKey='id';
    protected $table='loaitin';

}
