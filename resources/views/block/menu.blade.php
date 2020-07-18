
<nav class="navbar navbar-default  ">
  <div class="container"style="text-transform: uppercase">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DANH MỤC THỂ LOẠI</a>
    </div>
    <ul class="nav navbar-nav">
        @foreach($data['theloai'] as $cate)
                            @if(count($cate->LoaiTin) > 0)
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$cate ->Ten}}
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
              @foreach($cate->LoaiTin as $subcate)
          <li> <a class="tt"  href="loai-tin/{{ $subcate->TenKhongDau }}">{{ $subcate->Ten }}</a></li>
          @endforeach
        </ul>
      </li>
      @endif
      @endforeach
    </ul>
  </div>
</nav>