@extends('layouts/app')
@section('content')
@include('partials/validation_errors')
    <link href="{{ asset('css/adsArticle.css') }}" rel="stylesheet">
    <form method="POST" id="add-form" action="/article/adsArticle">
 <!-- för the massage efter adding NA-->
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
  @endif

    {!! Form::open(array('files'=>true)) !!}
			<div class="form-group">
				<label for="name">Article Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Article Name" required value="{{ old('name') }}">
			</div>

			<div class="form-group">
				<label for="rent_price">Article Price</label>
				<input type="text" name="rent_price" id="rent_price" class="form-control" placeholder="Article rent_price" required value="{{ old('rent_price') }}">
      </div>

      <div class="form-group">
				<label for="description">Article Description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Article description" required value="{{ old('description') }}">
      </div>
      <div class="form-group">
				<label for="category_id">Article category</label>
        
				{{ Form::select('category_id',$categories,1,['class'=>'form-control'])}}
      </div>
      <div class="form-group">
				<label for="city">Article City</label>
				<input type="text" name="city" id="city" class="form-control" placeholder="city name" required value="{{ old('city') }}">
			</div>

			<div class="form-group">
				<label for="url">Image</label>
				<input type="text" name="url" id="url" class="form-control" placeholder="URL" required value="{{ old('url') }}">
			</div>
    <button type="submit"  class="btn btn-primary">save</button>
    
    {!!Form::close()!!}
    <a href="/ ">&laquo; Back to all Articles</a>
  @endsection

