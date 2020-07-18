@section('title')
	Quản lý Thông tin Người Dùng
@endsection

@extends('index')

@section('content')
<div class="container">

	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>THÔNG TIN TÀI KHOẢN</h4></div>
				<div class="panel-body">
					@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						<strong>{{ $err }}</strong><br/>                          
						@endforeach
					</div>
					@endif

					@if(session('message'))
					<div class="alert alert-success">
						<strong>{{ session('message') }}</strong>
					</div>
					@endif
					<form action="quan-ly-thong-tin" method="POST">
						{{ csrf_field() }}
						<div>
							<label>Tên Người Dùng</label>
							<input type="text" class="form-control" name="username" aria-describedby="basic-addon1" value="{{ $user_info->name }}">
						</div>
						<br>
						<div class="form-group1">
							<p><label>Bạn có muốn nâng cấp thành khách hàng VIP không?</label></p>
							<div class="form-group" style="text-align: left;">
                            <a style="font-style: italic;" href="http://sandbox.vnpayment.vn/tryitnow/Home/VnPayIPN?vnp_Amount=1000000&vnp_BankCode=NCB&vnp_BankTranNo=20170829152730&vnp_CardType=ATM&vnp_OrderInfo=Thanh+toan+don+hang+thoi+gian%3A+2017-08-29+15%3A27%3A02&vnp_PayDate=20170829153052&vnp_ResponseCode=00&vnp_TmnCode=2QXUI4J4&vnp_TransactionNo=12996460&vnp_TxnRef=23597&vnp_SecureHashType=SHA256&vnp_SecureHash=20081f0ee1cc6b524e273b6d4050fefd">Nhấp vào đấy để biết thêm chi tiết</a>    
                        </div>
						</div>
						<div>
							<label>Địa Chỉ Email</label>
							<input type="email" class="form-control" name="email" aria-describedby="basic-addon1" readonly value="{{ $user_info->email }}">
						</div>
						<br>	
						<div>
								<input type="checkbox" id="changePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" disabled name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" disabled name="password_again" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Xác nhận
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

