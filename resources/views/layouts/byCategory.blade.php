
@extends('layouts/app')

@section('content')
		@include('partials/validation_errors')

<div class="container mt-3">
<div class="row">
	@foreach($articles as $article)
	@php
	$img=$article->images->first();
	$image_name=$img['image'];
	@endphp
	@endforeach
	
    @include('layouts.showCategory')
    
</div>
</div>
		
				
	
@endsection
