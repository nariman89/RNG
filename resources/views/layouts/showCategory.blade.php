@extends('layouts/app')

@section('content')

<div class="container mt-3">

		<h1>All Articles</h1>

<!-- 		@include('partials/status')
 -->
		<!-- <ol>
		@foreach($articles as $article)
			<li><a href="/projects/{{ $article->article_id }}">{{ $article->article_name}}</a></li>
		@endforeach
		</ol> -->

		<a href="/projects/adsCategory">Create a New Project</a>
	</div>
@endsection
