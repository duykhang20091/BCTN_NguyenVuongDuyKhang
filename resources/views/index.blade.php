<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <link rel="stylesheet" type="text/css" href="admin_asset/dist/css/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
            
            <link rel="stylesheet" href="assets/css/style.css">


</head>
<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  transition: 0px;
  background-color: transparent;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}


</style>
<button onclick="topFunction()" id="myBtn" i class='far fa-arrow-alt-circle-up' style='font-size:36px'></i>
 </button>
<body>
    @include('block.header')

    @yield('content')
    
    @include('block.footer')
    
    <div style="text-align: left;" id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-login">

                <div class="csdsdd"style="width: 600px">
                <div class="panel panel-default">
                <div class="panel-heading"><h4>Đăng nhập</h4></div>
                <div class="panel-body">

                    <form action="dang-nhap" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control input" placeholder="Địa Chỉ Email" name="email" 
                            >
                        </div>
                        <br>    
                        <div>
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu" name="password">
                        </div>
                        <br>
                        <div class="form-group">
                            <button style="width: 100%;margin:auto"  type="submit" class="btn btn-primary">Đăng nhập
                            </button>    
                        </div>
                       <div class="form-group" style="text-align: right; margin-bottom: 3em;">
                            <a href="quen-mat-khau">Quên Mật Khẩu?</a>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <script src="js/jquery.js"></script>
    <script src="theme.js"></script>

    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/owl.carousel.js"></script>

<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script type="text/javascript">  
var mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<script type="text/javascript">
const chk = document.getElementById('chk');

chk.addEventListener('change', () => {
    document.body.classList.toggle('dark');
});

// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
    social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
    social_panel_container.classList.remove('visible')
});
</script>  
<script>
    $(document).ready(function() {
        $('#changePassword').change(function(){
            if($(this).is(':checked')){
                $('.password').removeAttr('disabled');
            }else{
                $('.password').prop('disabled', true);
            }
        });
    });
</script>
</body>

</html>
