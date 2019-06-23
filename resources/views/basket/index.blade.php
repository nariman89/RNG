@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Basket</div>

                <div class="panel-body">
                	<ul>
                     <li> 
                     @if ($basket = App\Basket::where('user_id', auth()->id())->get())
                        @foreach($basket[0]->items as $item)
                             {{$item->quantity}} pc of
                             {{$item->article->name ?? "You Have No Thing"}} 
                        @endforeach
                    @else
                        <p> "You Have No Thing" </p>
                    @endif
                     </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

 
 
    
