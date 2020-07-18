@section('title')
	{{ $tintuc->TieuDe }}
@endsection

@extends('index')

@section('content')
@include('block.menu')

<div class="container"style="width: 85%;margin-top: 5%">
	<div class="row">
		   <!-- {!! QrCode::size(150)->generate(' tin-tuc/{{ $tintuc->TieuDeKhongDau }}.html'); !!}-->

		<div class="col-lg-8"> 
			<div style="font-size: 18px;color: #6c757d"><span style="text-transform: uppercase;color: #e22027;font-size: 20px">{{$theloai -> Ten}}</span>/ <a style="text-transform: uppercase" href="loai-tin/{{ $loaitin->TenKhongDau }}">{{ $loaitin->Ten }}</a></div>
			<hr>
			<h1>{{ $tintuc->TieuDe }}</h1>
			<p><i class='far fa-calendar-alt' ></i>
				@if(!empty($tintuc->created_at))
				<small>{{ date('F d, Y',strtotime($tintuc->created_at)) }} at {{ date('g:ia',strtotime($tintuc->created_at)) }} </small>

				@else
					{{ 'Không Xác Định' }}
				@endif
			</p>
 	<h5 ><span class= " glyphicon glyphicon-eye-open"></span> {{ $tintuc->SoLuotXem }}</h5>
			<div class="float-right">
                            
    
	<div class="float-right" style="position: relative;">
    <div class="fb-like fb_iframe_widget" data-href="tin-tuc/{{ $tintuc->TieuDeKhongDau }}.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=134101490625119&amp;container_width=0&amp;&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false&amp;size=large"><span style="vertical-align: bottom; width: 156px; height: 28px;"><iframe name="f868777b45e0c" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.1/plugins/like.php?action=like&amp;app_id=134101490625119&amp;container_width=0&amp;href=tin-tuc/{{ $tintuc->TieuDeKhongDau }}.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false&amp;size=large" style="border: none; visibility: visible; width: 156px; height: 28px;" class=""></iframe></span></div>
</div>
<div class="clearfix"></div>
                        </div>
			<p class="lead">
				Tác giả:  <a href="#">Admin</a>
			</p>
			<h5><span class="label label-danger">HOT</span> <span class="label label-primary">New</span></h5><br>
			
			<img class="img-rounded"style="padding: auto;width: 100%" src="upload/tintuc/{{ $tintuc->Hinh }}" alt="Hình ảnh của bài viết">

			
			
			<hr>

			
			<p class="lead">
				{!! $tintuc->TomTat !!}
			</p>

			<p>
				{!! $tintuc->NoiDung !!}
			</p>

			<hr>

			 
			@if(Auth::user())
				<div class="well">
					<h4>Để lại bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
					@if(count($errors) > 0)
						@foreach($errors->all() as $err)
						<div class="alert alert-danger" style="margin-top: 1em;">
							<strong>{{ $err }}</strong><br/>
						</div>
						@endforeach
					@endif
					
					@if(session('message'))
					<div class="alert alert-success">
						<strong>{{ session('message') }}</strong>
					</div>
					@endif
					<form role="form" method="POST" action="binh-luan/{{ $tintuc->id }}">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea name="content" class="form-control" rows="3"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Gửi</button>
					</form>
				</div>
			@endif

			<hr>

			
			<div id="fb-root"></div>
	  <script>(function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));



		</script>

  


			@foreach($tintuc->Comment as $binhluan)
				<!-- Comment -->
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="http://placehold.it/64x64" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							{{ $binhluan->User->name }} | 
							<small>{{ $binhluan->created_at }}</small>
						</h4>
						{{ $binhluan->NoiDung }}
					</div>
				</div>
			@endforeach

		</div>

		<div class="col-lg-4"style="margin-top: 25%">

			<div class="panel panel-primary">
				<div class="panel-heading"><b>TIN LIÊN QUAN</b></div>
				<div class="panel-body">
					@foreach($tinlienquan as $tlq)
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-6">
								<a href="tin-tuc/{{ $tlq->TieuDeKhongDau }}.html">
									<img class="img-responsive"style="border-radius: 5px" src="upload/tintuc/{{ $tlq->Hinh }}" alt="Hình ảnh của bài viết">
								</a>
							</div>
							<div class="col-md-6">
								<a class="tt" href="tin-tuc/{{ $tlq->TieuDeKhongDau }}.html"><b>{{ $tlq->TieuDe }}</b></a>
							</div>
							
							<div class="break"></div>
						</div>
					@endforeach
				</div>
			</div>

			<div class="panel panel-success">
				<div class="panel-heading"><b>TIN NỔI BẬT</b></div>
				<div class="panel-body">
					@foreach($tinnoibat as $tnb)
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-6">
								<a href="tin-tuc/{{ $tnb->TieuDeKhongDau }}.html">
									<img class="img-responsive"style="border-radius: 5px" src="upload/tintuc/{{ $tnb->Hinh }}" alt="Hình ảnh của bài viết">
								</a>
							</div>
							<div class="col-md-6">
								<a class="tt" href="tin-tuc/{{ $tnb->TieuDeKhongDau }}.html"><b>{{ $tnb->TieuDe }}</b></a>
							</div>
							
							<div class="break"></div>
						</div>
					@endforeach
					
				</div>
			</div>

		</div>
</div>

	</div>

@endsection