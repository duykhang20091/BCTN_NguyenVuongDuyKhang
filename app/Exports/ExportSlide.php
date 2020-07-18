<?php

namespace App\Exports;

use App\Slide_model;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSlide implements FromCollection{
	/**
	*	@return \ILLuminate\Support\Collection
	*/
	public function collection()
	{

		return Slide_model::all();
	}
}