@extends('layouts/app')

@section('content')
		@include('partials/validation_errors')

         <form method="POST" action="/projects">
            @csrf

            {!! Form::open(array('files'=>true)) !!} 
             <!--  jag skriv array för att låta användare ladda upp fler bilder NA -->
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
				<input type="text" name="description" id="description" class="form-control" placeholder="Article Description" required value="{{ old('description') }}">
            </div>
           <div class="form-group">
				<label for="category">Article category</label>
				{{ Form::select('category_id',$categories,1,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
				<label for="city">Article City</label>
				{{ Form::select('city_id',$cities,1,['class'=>'form-control'])}} 
			</div>
   <input type="submit" value="Create New Article" class="btn btn-primary">
{!!Form::close()!!}

       <a href="/ ">&laquo; Back to all projects</a>
</div> 
@endsection

