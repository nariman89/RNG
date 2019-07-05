@extends('layouts/app')

@section('content')
    <link href="{{ asset('css/basket.css') }}" rel="stylesheet">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
  @endif
  
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Article</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
        @if ($basket = App\Basket::where('user_id', auth()->id())->get())
                        @foreach($basket[0]->items as $item)
               
 
                <tr>
                    <td data-th="article">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{$item->article->url}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$item->article->name}}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{$item->article->rent_price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{$item->quantity}}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php $total += ($item->article->rent_price) * ($item->quantity) ?></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{$item->id}}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{$item->id}}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                 
       
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{ url('/article') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
 @endforeach
                    @else
                        <p> "You Have No Thing" </p>
                    @endif
            </div>
        </div>
    </div>
</div>

@endsection

