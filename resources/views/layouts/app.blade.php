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

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #4b5c6b;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: blue;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: blue;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: whitesmoke;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: whitesmoke;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: black;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('RMG', 'RNG') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						@auth
							<li class="nav-item">
								<a class="nav-link" href="/layouts/index">Articles</a>
							</li>
						@endauth
                    </ul>
                     <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/layouts/adsCategory">Add a new Article</a>
                            </li>
                        @endauth
					</ul>
					<ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/bookings/bookfinish">My booking</a>
                            </li>
                        @endauth
					</ul>
					<ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/projects/myarticles">MY Article</a>
                            </li>
                        @endauth
                    </ul>

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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
			<div class="container ">
				<div class="row">
					<div class="col-2">

					<h1 class="my-4">Category</h1>

					 {{-- `isNotEmpty` collection method was added in Laravel 5.3 --}}
					 {{-- @if($item->childs->isNotEmpty()) --}}
                    {{-- <a>@include('/layouts/sub_category_list', [
                        'childs' => $item->childs
                    ])</a> --}}
				{{-- @endif --}}
				 <form method="POST" id="add-form" action="/layouts/app">
				{!! Form::open(array('files'=>true)) !!}
			  <div class="form-group">
				<div class="list-group ">
					  @foreach($items as $item)



{{-- <h2>Hoverable Dropup</h2> --}}
{{-- <p><a href="/category/{{$item->category_id}}" class="list-group-item">{{$item->category_name}}</a></p> --}}
<div class="navbar">

<div class="subnav">
    <button class="subnavbtn"><a href="/category/{{$item->category_id}}" class="list-group-item">{{$item->category_name}}</a><i class="fa fa-caret-down"></i></button>
    <div class="dropup-content">
    <a href="#">{{$item->parent_id}}</a>

  </div>
  </div>




{{-- <div class="dropup">
  <button class="dropbtn"><a href="/category/{{$item->category_id}}" class="list-group-item">{{$item->category_name}}</a></button>
  <div class="dropup-content">
    <a href="#">{{$item->parent_id}}</a>

  </div> --}}
</div>
@endforeach



				{{-- <div class="form-group">
				<label for="category_id"><a href="/category/{{$item->category_id}}" class="list-group-item">{{$item->category_name}}</a></label>
				{{ Form::select ($item->parent_id)}}
            </div>
				{!!Form::close()!!}
			   @endforeach --}}
		</ul>


			<a href="" class="list-group-item">Dator</a>

				  </div>
				  </div>
			  </div>
				<div class="col-10">
            @yield('content')
		</main>
		</div>
		</div>
		</div>
		</div>
    </div>
</body>
</html>
