
		@extends('layouts.app')

@section('content')

@php
use App\Article;
$articles = Article::where('user_id', auth()->id())->get();
@endphp


<div class="container mt-3">
	<h1>My Articles</h1>

	<ol>
		@foreach($articles as $article)
		<li><a href="/articles/{{$article->id }}">{{$article->name }}</a></li>
		@endforeach
	</ol>
<div class="container mt-3">



{{-- @if($booking->article_id == Auth::user()->id) --}}

{{-- <h1>Booking Info:</h1>
{{-- <p><strong>Firstname:</strong> {{ $booking->firstname }}</p> --}}
		{{-- @foreach($bookings as $booking)
		<li><a href="/bookings/{{$booking->id }}">{{$booing->name }}</a></li>

<p><strong>Firstname:</strong> {{ $booking->name }}</p>
<p><strong>Email:</strong> {{ $booking->email }}</p>
<p><strong>Phone:</strong> {{ $booking->phone }}</p>
<p><strong>Date Start:</strong> {{ $booking->date_start }}</p>
<p><strong>Date End:</strong> {{ $booking->date_end }}</p>
@endforeach
@endif

</div>  --}}

@endsection
