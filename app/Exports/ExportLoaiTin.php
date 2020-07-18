<?php

namespace App\Exports;

use App\LoaiTin_model;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLoaiTin implements FromCollection{
	/**
	*	@return \ILLuminate\Support\Collection
	*/
	public function collection()
	{

		return LoaiTin_model::all();
	}
}