
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
		<li><a href="/showDetail/{{$article->article_id}}">{{$article->name}}</a></li>

		@endforeach
	</ol>
<div class="container mt-3">

@endsection
