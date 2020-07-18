<?php

namespace App\Exports;

use App\TinTuc_model;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTinTuc implements FromCollection{
	/**
	*	@return \ILLuminate\Support\Collection
	*/
	public function collection()
	{

		return TinTuc_model::all();
	}
}