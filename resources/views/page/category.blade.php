@section('title')
    {{ $loaitin->Ten }}
@endsection

@extends('index')

@section('content')
 
  @include('block.menu')
<div class="container"style="width: 85%">
    <div class="space20"></div>
    <div class="row">

      

        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <h3><b>{{ $loaitin->Ten }}</b></h4>
                </div>

                @foreach($tintuc as $chitiet)
                    <div class="row-item row">
                        <div class="col-md-2">

                            <a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">
                                <br>
                                <img class="img-responsive" style="height: 150px" src="upload/tintuc/{{ $chitiet->Hinh }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-8">
                            <h3><a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">{{ $chitiet->TieuDe }}</a></h3>
                            <p>{!! $chitiet->TomTat !!}</p>
                            <a class="btn btn-warning" href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">Xem Thêm.. <span class="glyphicon glyphicon-chevron-right"></span></a>
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
