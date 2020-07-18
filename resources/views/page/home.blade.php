@section('title')
    Trang Chủ
@endsection

@extends('index')

@section('content')


        <div class="row main-left">
             @include('block.menu')
            
            @include('block.slide')
           
     <div class="container">
        
 
  <div class="space20"></div>
    
            <div class="row-lg-12">
                <div class="panel panel-default"style="border: none; ">            
                    
                        <h4 class="bvnb" style="text-transform: uppercase;border:none;font-size: 24px;font-weight: 800;background-size: 30px auto">BÀI VIẾT NỔI BẬT</h4>
                   

                    <div class="panel-body">
                        @foreach($data['theloai'] as $theloai)
                            @if(count($theloai->LoaiTin) > 0)
                            
                            <div class="row">
                                <h3>
                                    <a class="cate-list"style="text-transform: uppercase">{{ $theloai->Ten }}</a> |  
                                    @foreach($theloai->LoaiTin as $loaitin)
                                        <small><a class="sm" style="text-transform: uppercase" href="loai-tin/{{ $loaitin->TenKhongDau }}">{{ $loaitin->Ten }}</a>|</small>
                                    @endforeach
                                </h3>
                                <?php
                                    $data = $theloai->TinTuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                                    $chosen_article = $data->shift();

                                ?>

                                <div class="col-md-8">
                                    <div class="row-md-4"style="margin-top: 25px;">
                                        <a href="tin-tuc/{{ $chosen_article['TieuDeKhongDau'] }}.html">
                                            <img class="img-responsive" style="width: 750px;height: 380px;border-radius: 5px;" src="upload/tintuc/{{ $chosen_article['Hinh'] }}" alt="Hình ảnh đại diện của bài viết">
                                        </a>
                                    </div>

                                    <div class="col-md-12"style="position: absolute;bottom: 0;background: rgb(0, 0, 0);background: rgba(0,0,0,.6); color: #f1f1f1;width: 96%; padding: 5px 10px 10px 20px;">
                                        <h3><a style="color: white;text-transform: uppercase;" href="tin-tuc/{{ $chosen_article['TieuDeKhongDau'] }}.html">{{ $chosen_article['TieuDe'] }}</a></h3>
                                        <h5 style="color: #DDDDDD; ">{!! $chosen_article['TomTat'] !!}</h5>
                                        <a class="btn btn-primary"style="background: linear-gradient(to right, #04B404, #298A08);" href="tin-tuc/{{ $chosen_article['TieuDeKhongDau'] }}.html">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                        <h5 style="color: #89888b; "><span class= " glyphicon glyphicon-eye-open"></span> {{ $chosen_article['SoLuotXem']}}</h5>
                                    </div>

                                </div>
                               @foreach($data->all() as $remaining_article)
                                <div class="col-md-4"style="margin-top: 3%">
                                    
                                    
                                      
                                    <div class="row-md-4">
                                        <div class="col-md-4">
                                        <a href="tin-tuc/{{ $remaining_article['TieuDeKhongDau'] }}.html">
                                            <img class="img-responsive" style="border-radius: 5%;height: 20%;width: 150px" src="upload/tintuc/{{ $remaining_article['Hinh'] }}" alt="Hình ảnh đại diện của bài viết">
                                        </a>
                                        </div>
                                     <div class="col-md-8">
                                        <h5><a class="tt" href="tin-tuc/{{ $remaining_article['TieuDeKhongDau'] }}.html">{{ $remaining_article['TieuDe'] }}</a></h5>
                                        </div>   
                                    </div>
                                  <div class="break"></div>
                               
                              
                                </div>
                                @endforeach
                                <div class="break"></div>
                            </div>
                           
                            @endif
                        @endforeach
                    </div>
                    </div>

                         

                </div>
            </div>
        </div>
       
  
    </div>
   
@endsection
