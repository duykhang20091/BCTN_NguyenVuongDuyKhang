<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trang Quản Trị dành cho trang web của tôi">
    <meta name="author" content="">
    <title>Trang Quản Trị</title>

  
    <base href="{{ asset('') }}">

   
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin_asset/dist/css/style.css">


    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">


    
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

   
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

  
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body>

    <div id="wrapper">

       
        @include('admin.layout.header')
       
       
        @yield('content')
       

    </div>
   
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    
</body>

</html>
