@extends('layouts/app')

@section('content')
@include('partials/validation_errors')
@php
use Carbon\Carbon;
@endphp

		<form method="POST" action="/layouts/{{ $article->id }}"">
			<div class="container mt-3">
		<h1>Create a New Article</h1>


			{{csrf_field() }}


 {!! Form::open(array('files'=>true)) !!}
  <div class="form-row">
			<div class="form-group col-md-12">
				<label for="name">Article Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Article Name">
			</div>

			<div class="form-group col-md-12">
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

 <div class="form-group">
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

    <div class="form-group">
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
      <input type="phone" class="form-control" id="phone" name="phone" placeholder="+4600.." required>
    </div>


			<div class="form-group">
				<input type="hidden" name="user_id" id="user_id" class="form-control" placeholder="User_id">
			</div>


<br>
			<input type="submit" value="book" class="btn btn-primary">
		{!!Form::close()!!}



		<a href="/articles">&laquo; Back to all articles</a>
	</div>
@endsection
