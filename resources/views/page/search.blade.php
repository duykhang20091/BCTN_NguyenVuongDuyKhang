@section('title')
    Tìm Kiếm với từ khóa "{{ $keyword }}"
@endsection

@extends('index')

@section('content')
 @include('block.menu')
<div class="container">
    <div class="row">

       <div class="space20"></div>

        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <h4><b>Tìm thấy tổng cộng {{ count($tintuc) }} tin tức có liên quan đến từ khóa "{{ $keyword }}".</b></h4>
                </div>

                @foreach($tintuc as $chitiet)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{ $chitiet->Hinh }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">{!!$keyword,$chitiet->TieuDe !!}</a></h3>
                            <p>{!! $keyword,$chitiet->TomTat !!}</p>
                            <a class="btn btn-primary" href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">Xem Thêm.. <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                @endforeach

                <div class="row text-center">
                    {{ $tintuc->links() }}
                </div>

            </div>
        </div> 

    </div>

</div>

@endsection
