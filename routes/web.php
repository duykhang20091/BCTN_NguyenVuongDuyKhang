<?php


Route::get('qrcode_blade', function () {
    return QrCode::size(500)->generate('Google.com');
});

  
Route::get('/', 'HomeController@index');



Route::get('lien-he','HomeController@Contact');
Route::get('lien-he',[ 'as'=>'getLienhe','uses'=>'HomeController@get_lienhe']);
Route::post('lien-he',[ 'as'=>'postLienhe','uses'=>'HomeController@post_lienhe']);



Route::get('gioi-thieu','HomeController@Introduce');
Route::get('loai-tin/{unsigned_name}','HomeController@LoaiTin');

Route::get('tin-tuc/{unsigned_name}.html','HomeController@TinTuc');

Route::get('dang-nhap','HomeController@Login');

Route::post('dang-nhap','HomeController@LoginAuth');

Route::get('dang-xuat','HomeController@Logout');

Route::post('binh-luan/{article_id}','CommentController@Them');

Route::get('quan-ly-thong-tin','HomeController@UserConf');

Route::post('quan-ly-thong-tin','HomeController@ExUserConf');

Route::get('dang-ky-tai-khoan','HomeController@Register');

Route::post('dang-ky-tai-khoan','HomeController@DoRegister');

Route::get('quen-mat-khau','HomeController@ForgotPassword');

Route::post('quen-mat-khau','HomeController@sendCodeResetPassword');

Route::get('password-reset/{code}','HomeController@getresetPassword');

Route::post('password-reset/{code}','HomeController@resetPassword')->name('reset');

Route::get('tim-kiem','HomeController@Search');

Route::get('admin/login','UserController@Login');

Route::post('admin/login','UserController@LoginAuth');

Route::get('admin/logout','UserController@Logout');



Route::group(['prefix' => 'admin','middleware' => 'adminAuth'],function(){

	Route::get('/','AdminController@index');

	
	Route::group(['prefix' => 'theloai'],function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('them','TheLoaiController@Them');

		Route::post('them','TheLoaiController@XuLyThemTL');

		Route::get('sua/{id}','TheLoaiController@Sua');

		Route::post('sua/{id}','TheLoaiController@XuLySuaTL');

		Route::get('xoa/{id}','TheLoaiController@Xoa');

		Route::post('/export-csv','TheLoaiController@export_csv');
		Route::post('/import-csv','TheLoaiController@import_csv');

	});

	Route::group(['prefix' => 'loaitin'],function(){
		Route::get('danhsach','LoaiTinController@getDanhSach');

		
		Route::post('them','LoaiTinController@XuLyThemLT');
		Route::get('them','LoaiTinController@Them');

		Route::get('sua/{id}','LoaiTinController@Sua');

		Route::post('sua/{id}','LoaiTinController@XuLySuaLT');

		Route::get('xoa/{id}','LoaiTinController@Xoa');
		Route::post('/export-csv','LoaiTinController@export_csv');
		Route::post('/import-csv','LoaiTinController@import_csv');
	});

	Route::group(['prefix' => 'tintuc'],function(){
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('them','TinTucController@Them');

		Route::post('them','TinTucController@XuLyThemTT');

		Route::get('sua/{id}','TinTucController@Sua');

		Route::post('sua/{id}','TinTucController@XuLySuaTT');

		Route::get('xoa/{id}','TinTucController@Xoa');
		Route::post('/export-csv','TinTucController@export_csv');
		Route::post('/import-csv','TinTucController@import_csv');

	});

	Route::group(['prefix' => 'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('them','UserController@Them');

		Route::post('them','UserController@XuLyThemUser');

		Route::get('sua/{id}','UserController@Sua');

		Route::post('sua/{id}','UserController@XuLySuaUser');

		Route::get('xoa/{id}','UserController@Xoa');

		Route::post('/export-csv','UserController@export_csv');
		Route::post('/import-csv','UserController@import_csv');
	});

	Route::group(['prefix' => 'comment'],function(){
		Route::get('danhsach','CommentController@getDanhSach');

		Route::get('xoa/{id}','CommentController@Xoa');
	});

	Route::group(['prefix' => 'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('them','SlideController@Them');

		Route::post('them','SlideController@XuLyThemSlide');

		Route::get('sua/{id}','SlideController@Sua');

		Route::post('sua/{id}','SlideController@XuLySuaSlide');

		Route::get('xoa/{id}','SlideController@Xoa');
		Route::post('/export-csv','SlideController@export_csv');
		Route::post('/import-csv','SlideController@import_csv');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('layloaitin/{idTheLoai}','AjaxController@getLoaiTin');

		Route::get('timestamp','AjaxController@timestamp');
	});


});
