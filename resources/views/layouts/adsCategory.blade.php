@extends('layouts/app')

@section('content')

        <form method="POST" id="add-form" action="/layouts/adsCategory">
            {{csrf_field() }}


<!--             action="{{route('projects.store')}}"
 -->
            {!! Form::open() !!} 
             <!--  jag skriv array för att låta användare ladda upp fler bilder/ ska bli sakert att koden aktiveras NA -->
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
<!-- 				{!!Form::label('description', 'description:') !!}
 -->            </div>
           <div class="form-group">
				<label for="category_id">Article category</label>
				{{ Form::select('category_id',$categories,1,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
				<label for="city_id">Article City</label>
				{{ Form::select('city_id',$cities,1,['class'=>'form-control'])}} 
			</div>
			 <div class="form-group">
				<label for="image">Article Images</label>
				<input type="file" class="form-control" name="images[]" multiple/>
			</div>
   <button type="submit"  class="btn btn-primary">save</button>
{!!Form::close()!!}

       <a href="/ ">&laquo; Back to all projects</a>
</div> 
@endsection

