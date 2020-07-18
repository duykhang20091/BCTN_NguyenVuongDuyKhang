<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use TheLoaiTinTuc;
use Session;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Excel;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
    	$theloai = TheLoai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function Them(){
    	return view('admin.theloai.them');
    }

    public function XuLyThemTL(Request $request){
    	$this->validate($request,
    		[
    			'cate_name'=>'required|unique:TheLoai,Ten|min:3|max:100'
    			
    		],
    		[
    			'cate_name.required'=>'Bạn chưa nhập tên Thể Loại!',
    			'cate_name.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
    			'cate_name.min'=>'Tên Thể Loại gồm ít nhất 3 ký tự!',
    			'cate_name.max'=>'Tên Thể Loại gồm tối đa 100 ký tự!'
    		]);

    

    	$theloai = new TheLoai;
    	$theloai->Ten = $request->cate_name;
    	$theloai->TenKhongDau = changeTitle($request->cate_name);
    	$theloai->save();

    	return redirect('admin/theloai/them')->with('message','Đã thêm Thể Loại!');
    }

    public function Sua($id){

    	$theloai = TheLoai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function XuLySuaTL(Request $request,$id){
    	$theloai = TheLoai::find($id);
    	$this->validate($request,
    		[
    			'cate_changed' => 'required|unique:TheLoai,Ten|min:3|max:100'
    		],
    		[
    			'cate_changed.required' => 'Bạn chưa nhập tên Thể Loại!',
    			'cate_changed.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!!',
    			'cate_changed.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
    			'cate_changed.max' => 'Tên Thể Loại gồm tối đa 100 ký tự!'
    		]);
    	$theloai->Ten = $request->cate_changed;
    	$theloai->TenKhongDau = changeTitle($request->cate_changed);
    	$theloai->save();

    	return redirect('admin/theloai/sua/'.$id)->with('message','Cập nhật tên Thể Loại thành công');
    }

    public function Xoa($id){
    	$theloai = TheLoai::find($id);
        $theloai->Delete();

    	return redirect('admin/theloai/danhsach')->with('message','Xóa Thể Loại thành công!');
    }
 public function export_csv(){
        return Excel::download(new ExcelExport , 'TheLoai.xlsx');
    }

    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }
}
