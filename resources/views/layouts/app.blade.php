<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RMG') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'RNG') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						@auth
							<li class="nav-item">
								<a class="nav-link" href="/article">Articles</a>
							</li>
						@endauth
                    </ul>
                     <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/article/create">Add a new Article</a>
							</li>
							 @endauth
					</ul>
					<ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/bookings/bookfinish/{$article->article_id}}">My booking</a>
                            </li>
                        @endauth
					</ul>
                    <ul class="navbar-nav mr-auto">
                     @auth 
                             <div class="row">
                              <?php $total = 0 ;
                                $basket = App\Basket::where('user_id', auth()->id())->get(); ?>
                        @foreach($basket[0]->items as $item)
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> basket <span class="badge badge-pill badge-danger">{{$item->quantity}}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{$item->quantity}}</span>
                        </div>
                                
                             {{$item->quantity}} pc of
                             
                             {{$item->article->name ?? "You Have No Thing"}} 
                            <?php $total += ($item->article->rent_price) * ($item->quantity) ?>
                        @endforeach
 
                        <div class="col-lg-8 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total}}</span></p>
                        </div>
                    </div>
 
                    @if(session('basket'))
                        @foreach(session('basket') as $id => $details)
                            <div class="row cart-detail">
                               
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['rent_price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                        <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('basket') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
   
                    </ul>
                        @endauth
					<ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/projects/myarticles">MY Article</a>
                            </li>
                        @endauth
                    </ul>
                    @if (Auth::user() &&  Auth::user()->role_id != 2) 
                      <div>
                        <a href="/admin/article/" class="btn btn-warning" style="width:100%">Admin</a>
                     </div>
    
                  @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
<fb:login-button
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
            </div>
        </nav>

     <main class="py-4">
		<div class="container ">
		  <div class="row">
			<div class="col-2">
				<h1 class="my-4">Category</h1>
			   <div class="list-group ">
                <?php $categories = App\Category::where('parent_id', 0)->orderBy('name')->get()->take(10); ?>
				@foreach($categories as $category)
			      <a href="/category/{{$category->category_id}}" >{{$category->name}}</a>
				  @if($category->categories()->exists())
				    <ul>
					 @foreach($category->categories()->orderBy('name')->get() as $subcategory)
						<li>
							<a href="/category/{{ $subcategory->category_id }}" >
								{{$subcategory->name}}
							</a>
						</li>
					 @endforeach
				    </ul>
			         @endif
			@endforeach
		{{-- jag läggt den bara för att visa gruppen var måste finnas category --}}
			<a href="" >Dator</a>
			</div>
			  </div>
	<div class="col-10">

        @yield('content')
        @yield('scripts')

		</main>
		</div>
		</div>
		</div>
		</div>
    </div>
</body>
</html>
