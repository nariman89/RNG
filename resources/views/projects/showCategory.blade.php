@extends('layouts/app')

@section('content')
{{-- @php
use App\Category;
$categories = Category::where('article_id', auth()->id())->get();
@endphp --}}

  <div class="container cl-sm-3 text-center">
  <div class="row">
			 {{-- @foreach($articles as $article)
			 @php
				$img=$article->image->first
			 @endphp --}}

        {{-- <h1>{{ $category->name }}</h1> --}}
		<br>

{{-- <h5>All Articles in {{ $category->name }} category</h5> --}}
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
   </div> </div>
		@endsection
