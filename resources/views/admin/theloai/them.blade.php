@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>> Thêm</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">

                   
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <strong>{{$err}}</strong><br>
                            @endforeach
                        </div>
                    @endif

                   
                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                        <form action="admin/theloai/them" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p><label>Tên Thể Loại</label></p>
                                <input class="form-control input-width" name="cate_name" placeholder="Nhập tên Thể Loại.." />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm</button>

                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                
            </div>
           
        </div>
@endsection