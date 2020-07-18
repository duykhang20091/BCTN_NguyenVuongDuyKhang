<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\Comment;
use App\TheLoai;
use App\LoaiTin;
use App\User;
use App\Slide;
class AdminController extends Controller
{
    //
    public function index(){
    	$comment = Comment::latest()->take(10)->get();
    	$tintuc = TinTuc::latest()->take(10)->get();
    	$tt=TinTuc::all();
    	$tl=TheLoai::all();
    	$lt=LoaiTin::all();
    	$cm=Comment::all();
    	$user=User::all();
    	$sl=Slide::all();
    	return view('admin.home',['comment' => $comment, 'tintuc' => $tintuc,'tt'=>$tt,'tl'=>$tl,'lt'=>$lt,'cm'=>$cm,'user'=>$user,'sl'=>$sl]);
    }
}
