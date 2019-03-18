@extends('layouts/app')

@section('content')

  <div class="container cl-sm-3 text-center">
  <div class="row">
<h1>{{ $category->name }}</h1>
		<br>

<h5>All Articles in {{ $category->name }} category</h5>
	  @foreach($articles as $article)

	  <li><a href="/projects/{{ $article->name }}"> {{ $article->name }}</li>
			@endforeach
		</ol>

  </div>
   </div> </div>
		@endsection
