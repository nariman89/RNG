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
                         @foreach($items as $item)
                             {{$item->quantity}} pc of
                             {{$item->article->name ?? "You Have No Thing"}} 
                        @endforeach
                     </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
