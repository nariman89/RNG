
@extends('layouts.app')

@section('content')

@php
use App\Article;
$articles = Article::where('user_id', auth()->id())->get();
@endphp
  <div class="container mt-3">
		<div class="card">
			<div class="card-header">
	      <h1>My Articles</h1>
      </div>
			<div class="card-body">
	       <ol>
		       @foreach($articles as $article)
		       <li><a href="/article/{{$article->article_id}}">{{$article->name}}</a></li>
		      @endforeach
	       </ol>
    </div>
	    </div>

	

@endsection
