<?php

namespace App\Imports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use App\LoaiTin_model;
class ImportLoaiTin implements toModel{

	
	public function model(array $row)
	{
		return new LoaiTin_model([
			'id'=>$row[0],
			'idTheLoai'=>$row[1],
			'Ten'=>$row[2],
			'TenKhongDau'=>$row[3],
			'created_at'=>$row[4],
			'updated_at'=>$row[5],
		]);
	}
	
}