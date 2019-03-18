@extends('layouts/app')

@section('content')
	<div class="container mt-3">
		<h1>Edit Article: {{ $article->name }}</h1>

		{{-- @include('partials/validation_errors') --}}

		<form method="POST" action="/projects/{{ $article->id }}">

			@csrf
			@method('PUT')

			<div class="form-group">
				<label for="title">article Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="article Title" required value="{{ old('title') ? old('title') : $article->title }}">
			</div>

			<div class="form-group">
				<label for="description">article Description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Project Description" value="{{ old('description') ? old('description') : $article->description }}">
			</div>

			<input type="submit" value="Save Changes" class="btn btn-primary">
		</form>

		<a href="/projects">&laquo; Back to all projects</a>
	</div>
@endsection
