@extends('layouts/app')
@section('content')
@include('partials/validation_errors')
@csrf
@method('PATCH')

@php
use Carbon\Carbon;
@endphp
  <link href="{{ asset('css/showDetail.css') }}" rel="stylesheet">
     <div class="container text-left mt-20">
	     <h3 class="card-title"> {{$article->name}}</h3><hr>
   @if(session()->has('message'))
      <div class="alert alert-success">
         {{ session()->get('message') }}
      </div>
    @endif

    <div class="card-body">
		  <img class="img-thumbnail card-img-top" alt="Cinque Terre" width="304" height="350px" src="{{$article->url }}" alt="image" >
    </div>
		<div class="container-detail">
			<div class="row"  >
		    <h2 class="text-info">Price:</h2>
		    <h2 class="card-text">{{$article->rent_price }} kr</h2>
    </div>
		<div class="row">
		  <h2 class="text-info">City:</h2>
		  <h3 class="card-text">{{$article->city}}</h3>
		</div>
		<div class="row">
    	    <h2 class="text-info">Description:</h2>
		      <h2 class="card-text">{{$article->description}}</h2>
		</div>
    <div class="d-flex">
		  <button class="btn btn-success" onclick="myFunction()"> Book</button>
	    <br>
        @if (Auth::check())
	      @if ($article->user_id == Auth::user()->user_id)
      <a href="/article/{{$article->article_id}}/edit" class="btn btn-warning">Edit Article</a>
      <form method="POST" action="/article/{{$article->article_id}}">
        @csrf
        @method('DELETE')
          <input type="submit" value="Delete article" class="btn btn-danger">
      </form>
  </div>
  </div>
    @endif
    @endif
		<div id="myDIV">
			<div class="container mt-3">
		<h1>Book The Article</h1>
			
  <form method="POST" id="add-form" action="/bookings/bookfinish">
        {!! Form::open(array('files'=>true)) !!}
      <div class="form-row">
			  <input type="hidden" class="form-control col-md-6" id="article_id" name="article_id" value="{{$article->article_id}}">
      </div>
			<div class="form-group col-md-6">
				<h3 class="card-title">Article Name:  {{$article->name}}</h3><hr>
				<h3 class="card-text">Price: {{$article->rent_price }} kr</h3>
			</div>
			<div class="row">
			<div class="form-group col-md-6">
        <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
	    </div>
	    <div class="form-group col-md-6">
        <label for="city_name">City Name</label>
          <input type="text" class="form-control" id="city_name" name="city_name" placeholder="city_name" required>
	</div>
  <div class="form-group col-md-6">
    <label for="date_start">Date Start</label>
    <select class="form-control" name="date_start">
      <option>{{ Carbon::now()->addDay(0) }}</option>
      <option>{{ Carbon::now()->addDay(1) }}</option>
      <option>{{ Carbon::now()->addDay(2) }}</option>
      <option>{{ Carbon::now()->addDay(3) }}</option>
      <option>{{ Carbon::now()->addDay(4) }}</option>
      <option>{{ Carbon::now()->addDay(5) }}</option>
      <option>{{ Carbon::now()->addDay(6) }}</option>
      <option>{{ Carbon::now()->addDay(7) }}</option>
    </select>
  </div>

    <div class="form-group col-md-6">
      <label for="date_end">Date End</label>
      <select class="form-control" name="date_end">
        <option>{{ Carbon::now()->addDay(0) }}</option>
        <option>{{ Carbon::now()->addDay(1) }}</option>
        <option>{{ Carbon::now()->addDay(2) }}</option>
        <option>{{ Carbon::now()->addDay(3) }}</option>
        <option>{{ Carbon::now()->addDay(4) }}</option>
        <option>{{ Carbon::now()->addDay(5) }}</option>
        <option>{{ Carbon::now()->addDay(6) }}</option>
        <option>{{ Carbon::now()->addDay(7) }}</option>
      </select>
    </div>
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				 <input type="text" name="email" id="email" class="form-control" placeholder="exempel@exempel.com">
			</div>
			<div class="form-group col-md-6">
        <label for="phone">PHONE NUMBER</label>
         <input type="phone" class="form-control" id="phone" name="phone" placeholder="+467000000" required>
      </div>
      <div class="form-group">
				<input type="hidden" name="user_id" id="user_id" class="form-control" placeholder="User_id">
	    </div>
    <br>
		<input style="margin:20px" type="submit" value="save" class="btn btn-primary">
		{!!Form::close()!!}
    <br>
		<a href="/article/index">&laquo; Back to all articles</a>
@endsection

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

