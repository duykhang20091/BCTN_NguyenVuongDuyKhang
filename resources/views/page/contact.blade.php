@section('title')
    Liên Hệ
@endsection

@extends('index')

@section('content')
    
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em></em></p>

  <div class="row">
   <form  action="{!!url('lien-he')!!}" method="post">
    <input type="hidden" name="_token"value="{!! csrf_token()!!}" />
    <fieldset>
    <div class="col-md-16">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required="">
        </div>
        
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="form-action">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
        </fieldset>
      </div>
    </div>
  </div>
  <br>
 
 
</div>
@endsection
