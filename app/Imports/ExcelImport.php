<?php

namespace App\Imports;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TheLoaiTinTuc;
class ExcelImport implements toModel{

	
	public function model(array $row)
	{
		return new TheLoaiTinTuc([
			'id'=>$row[0],
			'Ten'=>$row[1],
			'TenKhongDau'=>$row[2],
			'created_at'=>$row[3],
			'updated_at'=>$row[4],
		]);
	}
	
}