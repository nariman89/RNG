@extends('layouts/app')
{{--  Creates New Article Page   --}}
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/icon?family=Material+Icons);
body {
	background-image: url('https://wallpaperdownload.xyz/wp-content/uploads/2016/11/grumpy-cat-wallpaper4.jpg');
	background-size: cover;
	background-repeat: no-repeat;
}
.form-control {
	width:50% !important;
}
.wrapper {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

h1 {
  font-family: inherit;
  margin: 0 0 .75em 0;
  color: #728c8d;
  text-align: center;
}

.box {
  display: block;
  min-width: 300px;
  height: 300px;
  margin: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  overflow: hidden;
}

.upload-options {
  position: relative;
  height: 75px;
  background-color: cadetblue;
  cursor: pointer;
  overflow: hidden;
  text-align: center;
  -webkit-transition: background-color ease-in-out 150ms;
  transition: background-color ease-in-out 150ms;
}
.upload-options:hover {
  background-color: #7fb1b3;
}
.upload-options input {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.upload-options label {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
  height: 100%;
  font-weight: 400;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  overflow: hidden;
}
.upload-options label::after {
  content: 'add';
  font-family: 'Material Icons';
  position: absolute;
  font-size: 2.5rem;
  color: #e6e6e6;
  top: calc(50% - 2.5rem);
  left: calc(50% - 1.25rem);
  z-index: 0;
}
.upload-options label span {
  display: inline-block;
  width: 50%;
  height: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  vertical-align: middle;
  text-align: center;
}
.upload-options label span:hover i.material-icons {
  color: lightgray;
}

.js--image-preview {
  height: 225px;
  width: 100%;
  position: relative;
  overflow: hidden;
  background-image: url("");
  background-color: white;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.js--image-preview::after {
  content: "photo_size_select_actual";
  font-family: 'Material Icons';
  position: relative;
  font-size: 4.5em;
  color: #e6e6e6;
  top: calc(50% - 3rem);
  left: calc(50% - 2.25rem);
  z-index: 0;
}
.js--image-preview.js--no-default::after {
  display: none;
}

i.material-icons {
  -webkit-transition: color 100ms ease-in-out;
  transition: color 100ms ease-in-out;
  font-size: 2.25em;
  line-height: 55px;
  color: white;
  display: block;
}

.drop {
  display: block;
  position: absolute;
  background: rgba(95, 158, 160, 0.2);
  border-radius: 100%;
  -webkit-transform: scale(0);
          transform: scale(0);
}

.animate {
  -webkit-animation: ripple 0.4s linear;
          animation: ripple 0.4s linear;
}

@-webkit-keyframes ripple {
  100% {
    opacity: 0;
    -webkit-transform: scale(2.5);
            transform: scale(2.5);
  }
}

@keyframes ripple {
  100% {
    opacity: 0;
    -webkit-transform: scale(2.5);
            transform: scale(2.5);
  }
}
</style>
@section('content')
@include('partials/validation_errors')
        <form method="POST" id="add-form" action="/layouts/adsCategory">
<!--             {{csrf_field() }}
 -->
<!-- för the massage efter adding NA
 -->@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
 -->
            {!! Form::open(array('files'=>true)) !!}
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
				<input type="text" name="description" id="description" class="form-control" placeholder="Article description" required value="{{ old('description') }}">
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
				<label for="url">Image</label>
				<input type="text" name="url" id="url" class="form-control" placeholder="URL">
			</div>
   <button type="submit"  class="btn btn-primary">save</button>
{!!Form::close()!!}





       <a href="/ ">&laquo; Back to all projects</a>
</div>
@endsection

