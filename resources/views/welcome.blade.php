@extends('layouts/app')

@section('content')
<h1 align="center">Welcome to  Rent My Gear <br> First page!</h1>
{{--  Temporär styling   --}}
  {{-- <h1 align="center">Välkommen till Rent My Gear <br> Första sidan! <br> Var god att logga in eller registrera dig =)</h1> --}}
  <img style="padding-left:20%" width="700px" height="auto" src="https://freelancedirectory.co.nz/wp-content/uploads/2018/04/Art_5_Feature.jpg"/>
@endsection

  {{--    COMMENTED OUT <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>  --}}


