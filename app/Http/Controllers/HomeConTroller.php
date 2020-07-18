<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\TheLoai;
use App\Password_reset;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use App\Slide;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon ;
class HomeConTroller extends Controller
{
    	public function __construct(){ 
		$data = [
			'theloai' => TheLoai::all(),
			'slide' => Slide::all()
		];
		view()->share('data',$data);
	}

    public function index(){
    	return view('page.home');
    }

    public function Contact(){
    	return view('page.contact');
    }
    public function get_lienhe(){
                return view('page.contact');

    }
     public function post_lienhe(Request $request){
               $data=['hoten'=>$request -> input('name'),'tinnhan'=>$request -> input('comments')];
               Mail::send('page.mail',$data,function($msg){
                $msg ->from('taikhoanglaj@gmail.com','Test');
                $msg ->to('taikhoanglaj@gmail.com','Khang')-> subject('Đây là mail test'); 
               });

               echo "<script>
                    alert('Cảm ơn bạn đã góp ý.');
                    window.location = '".url('')."'
               </script>";
    }
     
    public function Introduce(){
        return view('page.introduce');
    }
    public function LoaiTin($unsigned_name){
    	$loaitin = LoaiTin::where('TenKhongDau',$unsigned_name)->first(); 

    	$tintuc = TinTuc::where('idLoaiTin',$loaitin->id)->paginate(5);
    	return view('page.category',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function TinTuc($unsigned_name){
    	$tintuc = TinTuc::where('TieuDeKhongDau',$unsigned_name)->first();
        $loaitin = LoaiTin::where('id',$tintuc->idLoaiTin)->first(); 
    	$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
    	$tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        $theloai = TheLoai::where('id',$loaitin->idTheLoai)->first(); 

    	return view('page.detail',['tintuc' => $tintuc, 'tinnoibat' => $tinnoibat,'theloai'=>$theloai, 'tinlienquan' => $tinlienquan,'loaitin' => $loaitin]);
    }
         public function Login(){
    	return view('page.login');
    }

    public function LoginAuth(Request $request)
    {
    	
    	$validator = Validator::make($request->all(),
    		[
    			'email' => 'required',
    			'password' => 'required|min:6',
    		],
    		[
    			'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    		]);

    	if($validator->fails())
    		return redirect('dang-nhap')->withErrors($validator)->withInput();
    	else
    	{
    		if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
	    		return redirect('/');
	    	else
	    		return redirect('dang-nhap')->with('message','Đăng nhập không thành công!');
    	}
    }
    	

    public function Logout(){
    	Auth::logout();
    	return redirect('/');
    }

    public function UserConf(){
    	if(Auth::check())
    		return view('page.user-profile',['user_info' => Auth::user()]);
    	else
    		return redirect('dang-nhap')->with('message','Bạn chưa Đăng Nhập!');
    }

    public function ExUserConf(Request $request){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    		]);

    	$user = Auth::user();
    	$user->name = $request->username;
    	if($request->has('password'))
    	{
    		$this->validate($request,
    		[
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
    		],
    		[
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
    		]);
    		$user->password = bcrypt($request->password_again);
    	}

    	$user->save();
    	return redirect('quan-ly-thong-tin')->with('message','Thay Đổi thông tin Người Dùng thành công!');
    }

    public function Register(){
    	return view('page.register');
    }

    public function DoRegister(Request $request){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    			'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    			'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
    			'email.unique' => 'Địa chỉ Email đã tồn tại!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
    		]);

    	$user = new User;
    	$user->name = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password_again);
    	$user->quyen = 0;

    	$user->save();
    	return redirect('dang-ky-tai-khoan')->with('message','Đăng ký tài khoản thành công!');
    }
    public function ForgotPassword(){
        return view('page.password_reset');
    }
    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;
        $checkUser= User::where('email',$email)->first();
        
        if(!$checkUser)
        {
                   return redirect('quen-mat-khau')->with('message', 'Email không tồn tại');       
        } 
        $code = bcrypt(md5(time().'$email'));
        
        $checkUser->remember_token=$code;
        $checkUser->created_at=Carbon::now();
        $checkUser->save();
        return redirect('quen-mat-khau')->with('message','Link đã được gửi vào email của bạn !');

        $url = route('get.link.reset.password',['remember_token'=>$checkUser->code,'email'=>$email]);
        $data=[
            'route'=>$url
        ]
            ;

        Mail::send('page.forgot', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
        });
    

    }
    public function resetPassword(){
       
        $email=User::all();
        return view('page.reset');
    }

    public function Search(Request $request){
    	$keyword = $request->keyword;
    	$tintuc = TinTuc::where('TieuDe','like',"%$request->keyword%")->orWhere('TomTat','like',"%$request->keyword%")->orWhere('TomTat','like',"%$request->keyword%")->paginate(5)->appends(['keyword' => $keyword]);

    	return view('page.search',['tintuc' => $tintuc, 'keyword' => $request->keyword]);
    }
    
}
