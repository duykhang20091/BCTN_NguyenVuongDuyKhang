@section('title')
	Lấy lại mật khẩu 
@endsection

@extends('index')

@section('content')
<!-- Page Content -->
<div class="container">

	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8"style="height: 300px">
			<div class="panel panel-default">
			<div class="panel-heading"><h4>Lấy lại mật khẩu</h4></div>
				<div class="panel-body">
					@if(session('danger'))
                            <div class="alert alert-danger error-sec">
							<strong>{{ session('danger') }}</strong>
						</div>
					@endif
				
					@if(session('message'))
						<div class="alert alert-success">
							<strong>{{ session('message') }}</strong>
						</div>
					@endif
					<label for='email'>Vui lòng cung cấp email để lấy lại mật khẩu</label>
					<form method="POST" action="quen-mat-khau">
						@csrf
						
						<div>
							
							<input id="email" type="email" class="form-control {{$errors->has('email')? 'is-invalid' :''}}"value="{{old('email')}}" placeholder="Nhập Địa Chỉ Email" name="email" 
							>
							
						</div>
						
						<br>
						<button type="submit" class="btn btn-primary">Hoàn tất
						</button>
						
					</form>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection