<style type="text/css">
    .content {
  position: absolute; /* Position the background text */
  bottom: 0; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.2); /* Black background with 0.5 opacity */
  width: 100%; /* Full width */
  padding: 20px; /* Some padding */
  text-align: center;
}

</style>
<div class="owl-carousel owl-theme" >
   
                @foreach($data['slide'] as $slide)
                <div class="item"> 
                    <img class="img-responsive"style="position: relative;text-align: center;color: white;border-radius: 6px;margin-bottom: 15px" src="upload/slide/{{ $slide->Hinh }}" title="{{ $slide->NoiDung }}">
                    <div class="content">
                        <a  href="{{ $slide->link }}"><h5 style="color: white" >{{ $slide->Ten }}</h5></a> 
                      
                        </div>
                    
                </div>
                @endforeach"></div>


</div>

 