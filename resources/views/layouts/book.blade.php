@extends('layouts/app')
@section('content')

<h1>Book Now!</h1>
<form>
 <form method="POST" action="/projects">
            @csrf

            {!! Form::open(array('files'=>true)) !!}
			<div class="form-group">
				<label for="name">Article Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Article Name" required value="{{ old('name') }}">
			</div>

			<div class="form-group">
				<label for="rent_price">Article Name</label>
				<input type="text" name="rent_price" id="rent_price" class="form-control" placeholder="Article rent_price" required value="{{ old('rent_price') }}">
            </div>
            <div class="form-group">
				<label for="description">start Date</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Article Description" required value="{{ old('description') }}">
			</div>
			<div class="form-group">
				<label for="description">finish Date</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Article Description" required value="{{ old('description') }}">
			</div>
			<div class="form-group">
				<label for="description">user_name</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Article Description" required value="{{ old('description') }}">
            </div>

			</div>
   <input type="submit" value="Create New Article" class="btn btn-primary">
{!!Form::close()!!}

       <a href="/ ">&laquo; Back to all projects</a>
</div>
</form>

@endsection
