@section('title')
	ResetPassword
@endsection

@extends('index')

@section('content')
<!-- Page Content -->
<div class="container">

	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
			<div class="panel-heading"><h4>Đặt lại mật khẩu</h4></div>
				
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
					<form method="POST" action="{{route('reset',['code'=>$code])}}">
						{{ csrf_field() }}
						<br>	
						<div>
								
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control password"  name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password"  name="password_again" aria-describedby="basic-addon1">
							</div>
							
						<br>
						<button type="submit" class="btn btn-primary">Xác nhận
						</button>
						
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
@endsection