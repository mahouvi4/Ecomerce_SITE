@extends('base2')

@section('emo')
<main class="main">
    <div id="lokx"></div>
    <div class="page-header text-center" style="background-image: url('{{asset('assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div>
        <!-- End .container -->
    </div>
    <!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div>
        <!-- End .container -->
    </nav>
    <!-- End .breadcrumb-nav -->

   
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>COD_SHIPPING</th>
                                        <th>DATE</th>
                                        <th>STATUT</th>
                                        <th>TOTAL</th>
                                        <th>DETAIL_SHIPPING</th>
                                        
                                        
                                    </tr>
                                </thead>
    
                                <tbody>
                                   
                                   @foreach ($show_com_all as $item)
                               
                                    
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                             
                                          <h5 style="color:aqua"> {{$item->codcommande}}</h5>
                                               
                                      </div>       
                                        <!-- End .product -->
                                    </td>
                                    <td>
                                        <h3 class="product-title">
                                            {{$item->created_at}}
                                        </h3>
                                        <!-- End .product-title -->
                                    </td>

                                    <td>
                                        <h3 class="product-title">
                                           @if ($item->statut==0)
                                            <h6 style="color: crimson">En attente de paiement</h6>

                                            @elseif($item->statut==1)
                                            <h6 style="color:navy">En cours de livraison</h6>
                                                @else
                                                <h6 style="color: lime">Livrée</h6>

                                           @endif
                                            
                                        </h3>
                                        <!-- End .product-title -->
                                    </td>
                                    
                                    <td class="total-col">${{$item->totalcommande}}</td>
                                    <td>
                                        <a href="{{url('template/show_commande_instant_t/'.$item->id)}}" class="btn btn-outline-dark-2"><span>VIEW</span><i class="icon-refresh"></i></a>
    
                                    </td>
                                </tr>
                              
                                   
                                 
                                  
                                   @endforeach
                                   
                                </tbody>
                            </table>
                            <!-- End .table table-wishlist -->
    
                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div>
                                            <!-- .End .input-group-append -->
                                        </div>
                                        <!-- End .input-group -->
                                    </form>
                                </div>
                                <!-- End .cart-discount -->
    
                            </div>
                            <!-- End .cart-bottom -->
                        </div>
                       
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .cart -->
        </div>
    
    <!-- End .page-content -->
</main>
<!-- End .main -->

   @section('scripts')
   @endsection 
@endsection