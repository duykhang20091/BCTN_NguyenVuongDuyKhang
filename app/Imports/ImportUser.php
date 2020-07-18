<?php

namespace App\Imports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use App\User_model;
class ImportUser implements toModel{

	
	public function model(array $row)
	{
		return new User_model([
		  'id'=>$row[0],
		  'name'=>$row[1],
		  'email'=>$row[2],
		  'quyen'=>$row[3],
		  'password'=>$row[4],
		  'remember_token'=>$row[5],
		  'created_at'=>$row[6],
		  'updated_at'=>$row[7]
		]);
	}
	
}