<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Đăng Nhập Hệ Thống</title>

    <base href="{{ asset('') }}">
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">TRANG ĐĂNG NHẬP</h3>
                    </div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger text-center">
                                @foreach($errors->all() as $err)
                                    <strong>{{ $err }}</strong><br/>
                                @endforeach
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-danger text-center">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        <form role="form" action="admin/login" method="POST">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <label>Địa chỉ mail:</label>
                                    <input class="form-control" placeholder="Địa chỉ Email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                     <label>Mật khẩu:</label>
                                    <input class="form-control" placeholder="Mật Khẩu" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block"><span class= "glyphicon glyphicon-log-in"></span> Đăng Nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

</body>

</html>
