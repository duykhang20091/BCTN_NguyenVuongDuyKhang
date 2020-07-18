<?php

namespace App\Exports;

use App\TheLoaiTinTuc;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection{
	/**
	*	@return \ILLuminate\Support\Collection
	*/
	public function collection()
	{

		return TheLoaiTinTuc::all();
	}
}