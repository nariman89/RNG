@extends('layouts/app')

@section('content')
	<div class="container mt-3">


        <h1>All Articles</h1>

<div class="col-lg-4 col-md-6 mb-4 text-left">
						<div class="card h-100">
                            <ol>
@foreach($articles as $article)
    <a href="#"><img class="card-img-top" height="150px" src="" alt="image" ></a>
    <div class="card-body">
        <h5 class="card-title">
            <a href="/projects/{{ $article->name }}">{{$article->name}}</a></li>
        </h5>
        <h6>{{ $article->rent_price }}</h6>
    </div>
</div>
</div>
@endsection
