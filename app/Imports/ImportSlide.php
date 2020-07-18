<?php

namespace App\Imports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Slide_model;
class ImportSlide implements toModel{

	
	public function model(array $row)
	{
		return new Slide_model([
		  'id'=>$row[0],
		  'Ten'=>$row[1],
		  'Hinh'=>$row[2],
		  'NoiDung'=>$row[3],
		  'link'=>$row[4],
		  'created_at'=>$row[5],
		  'updated_at'=>$row[6]
		]);
	}
	
}