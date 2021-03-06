<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use Session;
use App\Imports\ImportTinTuc;
use App\Exports\ExportTinTuc;
use Excel;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    //
    public function getDanhSach(){
    	$tintuc = TinTuc::all();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function Them(){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.tintuc.them',['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function XuLyThemTT(Request $request){
    	$this->validate($request,
    		[
    			'sub_cate'=>'required',
    			'article_title' => 'required|unique:TinTuc,TieuDe|min:3',
    			'article_desc' => 'required',
    			'article_content'=> 'required|min:20',
    		],
    		[
    			'sub_cate.required'=>'Bạn chưa chọn Loại Tin cho Bài viết!',
    			'article_title.required'=>'Bạn chưa nhập Tiêu Đề cho Bài viết!',
    			'article_title.unique'=>'Tiêu Đề bài viết đã tồn tại!',
    			'article_title.min'=>'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
    			'article_desc.required'=>'Bạn chưa nhập Tóm tắt cho Bài viết!',
    			'article_content.required'=>'Bạn chưa nhập nội dung cho Bài viết!',
    			'article_content.min'=>'Bài viết quá ngắn, yêu cầu tối thiểu gồm 20 ký tự trở lên!',
    		]);
    	$tintuc = new TinTuc;
    	$tintuc->TieuDe = $request->article_title;
    	$tintuc->TieuDeKhongDau = ($request->article_title);
    	$tintuc->TomTat = $request->article_desc;
    	$tintuc->NoiDung = $request->article_content;
    	if($request->hasFile('article_img')) 
    	{
    		$img_file = $request->file('article_img'); 
    		
    		$img_file_extension = $img_file->getClientOriginalExtension(); 

    		if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return redirect('admin/tintuc/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    		}

    		$img_file_name = $img_file->getClientOriginalName(); 
    		$random_file_name = str_random(4).'_'.$img_file_name; 
    		while(file_exists('upload/tintuc/'.$random_file_name)) 
    		{
    			$random_file_name = str_random(4).'_'.$img_file_name;
    		}
    		echo $random_file_name;

    		$img_file->move('upload/tintuc',$random_file_name);
    		$tintuc->Hinh = $random_file_name;
    	}
    	else
    		$tintuc->Hinh = ''; 
    	$tintuc->NoiBat = $request->article_rep;
    	$tintuc->idLoaiTin = $request->sub_cate;
    	$tintuc->save();

    	return redirect('admin/tintuc/them')->with('message','Thêm Bài viết mới thành công!');
    }

    public function Sua($id){
    	$tintuc = TinTuc::find($id);
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.tintuc.sua',['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function XuLySuaTT(Request $request,$id){
    	$tintuc = TinTuc::find($id);
    	$this->validate($request,
    		[
    			'sub_cate'=>'required',
    			'article_title' => 'required|unique:TinTuc,TieuDe|min:3',
    			'article_desc' => 'required',
    			'article_content'=> 'required|min:20',
    		],
    		[
    			'sub_cate.required'=>'Bạn chưa chọn Loại Tin cho Bài viết!',
    			'article_title.required'=>'Bạn chưa nhập Tiêu Đề cho Bài viết!',
    			'article_title.unique'=>'Tiêu Đề bài viết đã tồn tại!',
    			'article_title.min'=>'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
    			'article_desc.required'=>'Bạn chưa nhập Tóm tắt cho Bài viết!',
    			'article_content.required'=>'Bạn chưa nhập nội dung cho Bài viết!',
    			'article_content.min'=>'Bài viết quá ngắn, yêu cầu tối thiểu gồm 20 ký tự trở lên!',
    		]);

    	$tintuc->TieuDe = $request->article_title;
    	$tintuc->TieuDeKhongDau = $request->article_title;
    	$tintuc->TomTat = $request->article_desc;
    	$tintuc->NoiDung = $request->article_content;

    	if($request->hasFile('article_img'))
    	{
    		$img_file = $request->file('article_img');
    		
    		$img_file_extension = $img_file->getClientOriginalExtension();

    		if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return redirect('admin/tintuc/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    		}

    		$img_file_name = $img_file->getClientOriginalName();

    		$random_file_name = str_random(4).'_'.$img_file_name;
    		while(file_exists('upload/tintuc/'.$random_file_name))
    		{
    			$random_file_name = str_random(4).'_'.$img_file_name;
    		}
    		echo $random_file_name;

    		$img_file->move('upload/tintuc',$random_file_name);

    		unlink('upload/tintuc/'.$tintuc->Hinh); 
    		$tintuc->Hinh = $random_file_name; 
    	}
    	
    	$tintuc->NoiBat = $request->article_rep;
    	$tintuc->idLoaiTin = $request->sub_cate;
    	$tintuc->save();

    	return redirect('admin/tintuc/sua/'.$id)->with('message','Sửa Bài viết thành công!');
    }

    public function Xoa($id){
    	TinTuc::find($id)->delete();
    	return redirect('admin/tintuc/danhsach')->with('message','Xóa Bài viết thành công!');
    }
    public function export_csv(){
        return Excel::download(new ExportTinTuc , 'TinTuc.xlsx');
    }

    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ImportTinTuc, $path);
        return back();
    }
}
