@extends('layouts/app')

@section('content')
	<div class="container mt-3">

		@include('partials/validation_errors')
	<div class="container text-left">
		<h4>last article</h4><hr/>
		<div class="row">
	<div class="col-3  ml-4 text-left">
		<div class="card h-100">
			<a href="#"><img class="card-img-top" height="150px" src="https://www.elgiganten.se/image/dv_web_D18000100279466/APPLEMQD22HYA/apple-tv-4k-generation-5-32-gb.jpg?$fullsize$" alt="image" ></a>
		<div class="card-body">
				<h5 class="card-title">
				  <a href="">Apple TV 4K generation </a>
				</h5>
				<h6>600 kr</h6>
				<a>read more</a>
				<button href="/layouts/book">Boka</button>
		</div>
		</div>
		</div>
	<div class="col-3 ml-4 text-left">
		<div class="card h-100">
			<a href="#"><p>New Camera</p><img class="card-img-top" height="150px" src="https://www.elgiganten.se/image/dv_web_D180001002181495/12022/nikon-d7200-dslr-kameraaf-s-dx-nikkor-18-105-mm-telefotozoomobjektiv.jpg?$fullsize$"  alt="image" ></a>
			<div class="card-body">
				<h5 class="card-title">
				  <a href="">Camera</a>
				</h5>
				<h6>300 Kr</h6>
				<a>read more</a>
				<button href="/layouts/book">Boka</button>
			</div>
						</div>
	</div>
	<div class="col-3 ml-4  text-left">
		<div class="card h-100">
			<a href="#"><img class="card-img-top" height="150px" src="https://www.elgiganten.se/image/dv_web_D18000100230239/ATLP120USBHCB/audio-technica-at-lp120-usbhc-skivspelare.jpg?$fullsize$"  alt="image" ></a>
			<div class="card-body">
				<h5 class="card-title">
				<a href="">Audio Technica AT-LP120-USBHC skivspelare</a>
				</h5>
				<h6>4000 kr</h6>
				<a>read more</a>
				<button href="/layouts/book">Boka</button>
			</div>
			</div>
		</div>

	
    <div class="container text-center">    
  <h3>All Articles</h3><br>
</div>
  <div class="container text-center">    
  <div class="row">

  	@foreach($articles as $article)
  	<div class="col-sm-5"> 
      <div class="panel panel-danger">
        <div class="panel-heading"><a>{{$article->name}}</a></div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">{{ $article->rent_price }}</div>
      </div>
    </div>
    @endforeach
   
  </div>
 </div>
</div>
</div>

     

 
{!!Form::close()!!}

       <a href="/ ">&laquo; Back to all projects</a>
</div>
@endsection






