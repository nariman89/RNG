@extends('layouts.app')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>

  @endif	
	
	<div class="container text-left">
		<div class="row">
		  <div class="col-md-2"></div>
      <div class="col-md-6">
          <h1 style="background-color:DodgerBlue;">Welcome {{Auth::user()->name}}</h1></center>
					<?php
								echo "Today is " . date("Y/m/d") . "<br>";
					?>
			</div>
      <div class="container text-left">
        <h1 style="color: DodgerBlue; margin:30px;">All Articles</h1><br>
      </div>
  <div class="container cl-sm-3 text-center">
      <div class="row">
	     @foreach($articles as $article)
	       <div class="card" style="margin:20px; max-width: 40%; border:1px solid black;">
	         <a href="/article/{{$article->article_id}}"><img class="card-img-top"  height="150px" src="{{$article->url }}" alt="image" ></a> 
		    <div class="card-body">
		      <h5 class="card-title">
			  <a href="/article/{{$article->id}}">{{$article->name}}</a>
		     </h5>
			   <h6>{{ $article->rent_price }} kr</h6>
			<button>
			  <a href="/article/{{$article->id}}">Read More</a>
			</button> 
			@endforeach
		
<?php $baskets=App\Basket::all();
foreach($baskets as $basket)?>
			 <form method="POST" id="add-form" action="/basket/{{$basket->id}}">
			 @csrf
	@method('PUT')
    {!! Form::open(array('files'=>true)) !!}
		@if ($basket = App\Basket::where('user_id', auth()->id())->get())
                        @foreach($basket[0]->items as $item)
												<!-- <?php // dd($item); ?> -->
			<div class="form-group">
				<input type="hidden" name="user_id" id="user_id" class="form-control" placeholder="user_id">
	    </div>
			<div class="form-group">
				<input type="hidden" name="basket_id" id="basket_id" class="form-control" placeholder="basket_id" value="{{$item->basket_id}}">
	    </div>

			<div class="form-group">
				<input type="hidden" name="article_id" id="article_id" class="form-control" placeholder="article_id" value="{{$item->article_id}}">
	    </div>
			<div class="form-group">
				<input   name="quantity"  class="form-control" placeholder="quantity" value="{{$item->quantity}}">
	    </div>
			<a style="margin-top:10px;"  href=" basket/{{$basket[0]->id}}"      class="btn btn-warning btn-block text-center" type="submit" id="hm" role="button"  >Add to Basket</a>
			@endforeach
                    @else
                        <p> "You Have No Thing" </p>
                    @endif
      {!!Form::close()!!}
		
    <a href="/ ">&laquo; Back to all Articles</a>
			
			  
		  </div>
		 </div>
	 {{-- för paginate --}}
	 
	 {{$articles->links()}}
  
{!!Form::close()!!}

@endsection
 
