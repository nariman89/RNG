@extends('back.layouts.master')
@section('content')
<div class="container mt-3">
		<h1>Create a New Project</h1>

		@include('partials/validation_errors')
 <form method="POST" id="add-form" action="/admin/article">
 <!-- för the massage efter adding NA-->
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
  @endif
		{!! Form::open() !!}
			<div class="form-group">
				<label for="category_name">category name</label>
				<input type="text" name="category_name" id="name" class="form-control" placeholder="category_name" required value="{{old('category_name')}}">
                <button type="submit"  class="btn btn-primary">save</button>
    
    {!!Form::close()!!}
			</div>
</div>

		<a href="/projects">&laquo; Back to all Articles</a>
	</div>
@endsection
