<!-- Header -->
<style type="text/css">
    .navbar{
        margin-bottom: 0px;
    }
    .navbar-form .form-control{
        width: 400px;
    }
    
body {
 
  background-color: white;
  color: black; 
}

.dark-mode {
  background-color: black;
  color: white;
}
</style>

<nav class="navbar navbar-default navbar-fixed-top  ">
        <div class="container">       
            <div  class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-size: 1.4em;font-family: 'Pacifico', cursive;color: black;" href="{{ url('/') }}">NewsOnline </a>
            </div>
           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a style="color: black;" href="gioi-thieu"><span class= "glyphicon glyphicon-home"></span> Giới thiệu</a>
                    </li>
                    <li>
                        <a style="color: black;"href="lien-he"><span class= "glyphicon glyphicon-earphone"></span> Liên hệ</a>
                    </li>
                        
                </ul>

                <form  method="GET" action="tim-kiem" class="navbar-form navbar-left" role="search">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="keyword" class="form-control" placeholder="Bạn cần tìm gì?">
                    </div>
                    <button type="submit" class="btn btn-default"><span class= "glyphicon glyphicon-search"></span></button>
                </form>
                @if(Auth::user())
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        
                        <span class="usr-name"></span>  
                        
                    </a>
                    <ul class="nav navbar-nav pull-left">
                        <li class="nav-item dropdown">
                            <a style="cursor: pointer;" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user fa-fw" style="margin-right: 0.5em;"></i>{{ Auth::user()->name }}<i style="margin-left: 0.5em;" class="fa fa-caret-down"></i>
                            </a>
                            <div style="left: 15px; padding: 0.5em 1em; " class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="quan-ly-thong-tin"><i class="fa fa-gear fa-fw"></i> Thiết Lập Tài Khoản</a>
                                <div class="divider"></div>
                                <a class="dropdown-item" href="dang-xuat"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
                            </div>
                        </li>
                    </ul>
                    
                @else
                    <ul class="nav navbar-nav pull-left" >
                        <li>
                            <a style="color: black;" href="dang-ky-tai-khoan"><span class= "glyphicon glyphicon-registration-mark"></span> Đăng ký</a>
                        </li>
                        @if(!Request::is('dang-nhap'))
                        <li>
                            <a style="cursor: pointer;color: black;" class="login-sec" data-toggle="modal" data-target="#myModal"><span class= "glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
                        </li>
                        @endif
                        
                    </ul>
                    
                @endif
                <ul class="nav navbar-nav pull-right" >

             <li style="margin-top: 14px;float: right;">
                            <input type="checkbox" class="checkbox" id="chk" />
                    <label class="label1" for="chk">
                        <i class="fas fa-moon " ></i>
                        <i class="fas fa-sun"></i>
                        <div class="ball"></div>
                    </label>
                        </li></ul>
            </div>
                  
    </div>
        
 </nav>