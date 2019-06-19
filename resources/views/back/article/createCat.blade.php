@extends('back.layouts.master')
@section('content')
<div class="container mt-3">
		<h1>Create a New Project</h1>
		@include('partials/validation_errors')
		@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
  @endif
	
 <form method="POST" id="add-form" action="/admin/article">
 <!-- för the massage efter adding NA-->
  
		{!! Form::open() !!}
		@csrf
			<div class="form-group">
				<label for="name">category name</label>
				  <input type="text" name="name" id="name" class="form-control" placeholder="name" required value="{{old('name')}}">
					 
      </div>
			{{Form::select('parent_id',$categories, null,  ['class'=>'form-control'])}}  
        <button type="submit"  class="btn btn-primary">save</button>
      {!!Form::close()!!}
			</div>
		
</div>
		<a href="/projects">&laquo; Back to all Articles</a>
	</div>
@endsection
<style>
optgroup {
   label {
		 display:none;
	 }
}
</style>