@extends('back.layouts.master')
@section('content')
<div class="container mt-3">
		<h1>Create a New Project</h1>

		@include('partials/validation_errors')

		<form method="POST" action="/projects">

			@csrf

			<div class="form-group">
				<label for="title">Project Title</label>
				<input type="text" name="title" id="title" class="form-control" placeholder="Project Title" required value="{{ old('title') }}">
			</div>

			<div class="form-group">
				<label for="description">Project Description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Project Description" required value="{{ old('description') }}">
			</div>

			<input type="submit" value="Create New Project" class="btn btn-primary">
		</form>

		<a href="/projects">&laquo; Back to all Articles</a>
	</div>
@endsection
