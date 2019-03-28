@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Index/Dashboard</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            		<p>Welcome {{Auth::user()->name}}!</p>
					</div>
      </div>
    </div>
  </div>
</div>
@endsection

	   @foreach($articles as $article)

	  <div class="card" style="margin:20px; max-width: 40%; border:1px solid black;">
	  <a href="#"><img class="card-img-top"  height="150px" src="{{$article->url }}" alt="image" ></a>
		<div class="card-body">
				<h5 class="card-title">
				  <a href="/showDetail/{{$article->article_id}}">{{$article->name}}</a>
				</h5>
				<h6>{{ $article->rent_price }} kr</h6>

				<button><a href="/showDetail/{{$article->article_id}}">Read More</a></button>
		</div>
		</div>@endforeach
		</div>


    </div>

     {{--  {{$articles->links()}}  --}}

  </div>
 </div>
</div>
</div>

{!!Form::close()!!}






