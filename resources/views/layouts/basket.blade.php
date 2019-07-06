<ul class="navbar-nav mr-auto">
    @auth 
      <div class="row">
        <?php $total = 0 ;
        $totalQuantity = 0 ;
        $basket = App\Basket::where('user_id', auth()->id())->get(); 
        foreach($basket[0]->items as $item)
            $totalQuantity +=($item->quantity) ; 
            ?>   
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Basket<span class="badge badge-pill badge-danger"> {{$totalQuantity}}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-8 col-sm-8 col-8">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                         @foreach($basket[0]->items as $item)
                         
                         <ul><li>
                             {{$item->quantity}} pc of
                             {{$item->article->name ?? "You Have No Thing"}} </li></ul>
                            <?php $total += ($item->article->rent_price) * ($item->quantity) ?>
                             <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <p>{{$total}}Kr</p></div></div></div>
                         <div class="row total-header-section">
                        <div class="col-lg-10 col-sm-10 col-6">
                            <a href="{{url('basket')}}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>    
                    </div>
                    </div>
                </div>
</ul> 
          @endforeach          
       
@endauth


