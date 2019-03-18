@extends('layouts/app')
<style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: rgb(102, 151, 204);
  margin-top: 20px;
  display: none;
}
.container-detail{
	margin-top: 40px;
}
</style>
@section('content')
@include('partials/validation_errors')
@method('POST')
@php
use Carbon\Carbon;
@endphp
 <div class="container text-left mt-20">
	<h3 class="card-title"> {{$article->name}}</h3><hr>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="card-body">
		<img class="img-thumbnail card-img-top" alt="Cinque Terre" width="304" height="350px" src="{{$article->url }}" alt="image" >
		{{-- <p class="card-text">User Name {{$article->user->name}}</p> --}}
		<div class="container-detail">
			<div class="row"  >
		<h2 class="text-info">Price:</h2>
		<h2 class="card-text">{{$article->rent_price }} kr</h2></div></div>
		<div>
			<div class="row">
		<h2 class="text-info">City:</h2>
		<h3 class="card-text"> {{$article->city_id }}</h3>
		</div></div>
		<div>
			<div class="row">
    	<h2 class="text-info">Description:</h2>
		<h2 class="card-text">{{$article->description}}</h2>
		</div></div>
		<button  onclick="myFunction()"> Boka</button>
		<div id="myDIV">
			<div class="container mt-3">
		<h1>Book an Article</h1>


			{{csrf_field() }}

<form method="POST" id="add-form" action="/layouts/showDetail">
 {!! Form::open(array('files'=>true)) !!}
  <div class="form-row">
			<input type="hidden" class="form-control col-md-6" id="article_id" name="article_id" value="{{$article->article_id}}">
    </div>

			<div class="form-group col-md-6">
				<label for="rent_price">Pris</label>
				<input type="text" name="rent_price" id="rent_price" class="form-control" placeholder="Exempel: 300">
			</div>
			<div class="form-group col-md-6">
      <label for="name">First Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
	</div>
	<div class="form-group col-md-6">
      <label for="city_name">City Name</label>
      <input type="text" class="form-control" id="city_name" name="city_name" placeholder="city_name" required>
	</div>
	<div class="form-group col-md-6">
      <label for="adress">Adress Name</label>
      <input type="text" class="form-control" id="adress" name="adress" placeholder="Adress" required>
    </div>

	{{-- <div class="form-group col-md-6">
      <label for="date_start">date_start</label>
      <input type="text" class="form-control" id="date_start" name="date_start" placeholder="date_start" required>
	</div>
	<div class="form-group col-md-6">
      <label for="date_end">date_end</label>
      <input type="text" class="form-control" id="date_end" name="date_end" placeholder="date_end" required>
    </div> --}}
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
			<input type="submit" value="save" class="btn btn-primary">

		{!!Form::close()!!}



		<a href="/projects/index">&laquo; Back to all articles</a>
	</div>
</div>
    </div>
	</div>


	</div>



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

