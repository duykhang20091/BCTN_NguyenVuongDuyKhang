<?php

namespace App\Exports;

use App\User_model;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection{
	/**
	*	@return \ILLuminate\Support\Collection
	*/
	public function collection()
	{

		return User_model::all();
	}
}