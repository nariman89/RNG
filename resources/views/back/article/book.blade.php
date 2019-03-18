@extends('back.layouts.master')
@section('content')
<div class="container mt-3">
		<h1>Book</h1>

		@include('partials/validation_errors')

		<form method="POST" action="/projects">

			@csrf
			@endsection
