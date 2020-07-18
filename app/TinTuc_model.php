<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc_model extends Model
{
     protected $fillable = [
        'id', 'TieuDe', 'TieuDeKhongDau','TomTat','NoiDung','Hinh','NoiBat','SoLuotXem','idLoaiTin','created_at','updated_at'
    ];
    protected $primaryKey='id';
    protected $table='tintuc';

}
