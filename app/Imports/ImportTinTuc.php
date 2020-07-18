<?php

namespace App\Imports;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TinTuc_model;
class ImportTinTuc implements toModel{

	
	public function model(array $row)
	{
		return new TinTuc_model([
		  'id'=>$row[0],
		  'TieuDe'=>$row[1],
		  'TieuDeKhongDau'=>$row[2],
		  'TomTat'=>$row[3],
		  'NoiDung'=>$row[4],
		  'Hinh'=>$row[5],
		  'NoiBat'=>$row[6],
		  'SoLuotXem'=>$row[7],
		  'idLoaiTin'=>$row[8],
		  'created_at'=>$row[9],
		  'updated_at'=>$row[10]
		]);
	}
	
}