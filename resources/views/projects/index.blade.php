@extends('layouts/app')

@section('content')


	<div class="container mt-3">

		@include('partials/validation_errors')
	<div class="container text-left">
		<h4>Recommend article</h4><hr/>
		<div class="row">
		<div class="col-md-2"></div>
     <div class="col-md-6">
	<center ><h1 style="background-color:DodgerBlue;">Welcome {{Auth::user()->name}}</h1></center></div>
    <div class="container text-left">
  <h1 style="color: DodgerBlue; margin:30px;">All Articles</h1><br>
</div>
  <div class="container cl-sm-3 text-center">
  <div class="row">

	  @foreach($articles as $article)

	  <div class="card" style="margin:20px; max-width: 40%; border:1px solid black;">
	  <a href="#"><img class="card-img-top"  height="150px" src="{{$article->url }}" alt="image" ></a>
		<div class="card-body">
				<h5 class="card-title">
				  <a href="/showDetail/{{$article->article_id}}">{{$article->name}}</a>
				</h5>
				<h6>{{ $article->rent_price }} kr</h6>

				<button><a href="/showDetail/{{$article->article_id}}">Read More</a></button>
		</div>
		</div>@endforeach
		</div>


    </div>

     {{$articles->links()}}

  </div>
 </div>
</div>
</div>
<!-- https://placehold.it/150x80?text=IMAGE
 -->


{!!Form::close()!!}

       <a href="/ ">&laquo; Back to all projects</a>
</div>
@endsection






