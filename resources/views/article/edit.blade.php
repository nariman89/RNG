@extends('layouts/app')
@section('content')
@php
use App\Article;
$articles = Article::where('article_id', auth()->id())->get();
		// @if ($article->user_id == Auth::user()->id)
@endphp

	<div class="container mt-3">
		<h1>Edit Article: {{$article->name}}</h1>

		<form method="POST" action="/layouts/edit">

			@csrf
			@method('PATCH')
@foreach ($articles as $article)

			<div class="form-group">
				<label for="name">Article Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Article Name" required value="{{$article->name}}">
			</div>

			<div class="form-group">
				<label for="rent_price">Article Price</label>
				<input type="text" name="rent_price" id="rent_price" class="form-control" placeholder="Pris" value="{{ $article->rent_price }}">
			</div>
            <div class="form-group">
				{{-- <label for="description">Article Description</label> --}}
				<input type="hidden" name="description" id="description" class="form-control" placeholder="Article description" required value="{{$article->description}}"></div>

            <div class="form-group">
				{{-- <label for="city_name">Article City</label> --}}
				<input type="hidden" name="city_name" id="city_name" class="form-control" placeholder="city name" required value="{{$article->city}}">

			</div>
			 <div class="form-group">
				<label for="url">Image</label>
				<input type="text" name="url" id="url" class="form-control" placeholder="URL" required value="{{ $article->url}}">
			</div>
			 <div class="form-group">
				<input type="hidden" name="category_id" id="category_id" class="form-control" placeholder="Article category_id"  value="{{$article->category_id}}"></div>
           <div class="form-group">
            </div>
			  <div class="form-group">
				<input type="hidden" name="user_id" id="user_id" class="form-control" placeholder="User_id">
	</div>

			<input type="submit" value="Save Changes" class="btn btn-primary">
		</form>

		<a href="/projects">&laquo; Back to all projects</a>
	</div>
	{{-- @else <p>You do not have permission to edit this article</p> --}}


@endforeach
@endsection
