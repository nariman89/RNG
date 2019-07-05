
<ul class="navbar-nav mr-auto">
                     @auth 
                    

                             <div class="row">
                              <?php $total = 0 ;
                                $basket = App\Basket::where('user_id', auth()->id())->get();  ?>
                                @if(session('basket'))
                        @foreach($basket[0]->items as $item)
                      
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> basket <span class="badge badge-pill badge-danger">{{$item->quantity}}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{$item->quantity }}</span>
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
                        @foreach($basket[0]->items as $item)
                            <div class="row cart-detail">
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{$item->article->name}}</p>
                                    <span class="price text-info"> ${{ $item->article->rent_price}}</span> <span class="count"> Quantity:{{$item->quantity }}</span>
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
                    @endif
        </ul>
        <li class="nav-item">
           <a class="fa fa-shopping-cart" >Basket item {{ $total }}</a>
        </li>
       
@endauth


