@extends('base2')

@section('emo')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                <li class="breadcrumb-item"><a href="{{url('template/all_commande_user_checkout')}}">All SHIPPING</a></li>
                
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                  $total = 0;  
                                @endphp
                               @foreach ($show_com_t->list_commande  as $item)
                               <tr class="papa">
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{asset('produit/'.$item->produit->photo)}}" alt="{{$item->produit->nom}}">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            {{$item->produit->nom}}
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col">${{$item->produit->prix}}</td>
                                <td>
                                    
                 
                                          {{$item->quantitelist}}

                   
                                   <!-- End .cart-product-quantity -->
                                </td>
                                <td class="total-col">${{$item->produit->prix*$item->quantitelist}}</td>
                                 
                               @php
                                    $total+=$item->produit->prix*$item->quantitelist;
                               @endphp

                            </tr> 
                               @endforeach
                               
                            </tbody>
                            <tfoot>
                                <tr class="summary-total">
                                    <td>Total:</td>
                                    <td><h2>${{$total}}</h2></td>
                                   
                                </tr><!-- End .summary-total -->
                                  <tr>
                                    <td style="color: maroon">STATUT</td>
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
                                  </tr>
                            </tfoot>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">ADRESS OF SHIPPING</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                   
                                  
                            <tr>
                               
                                        @if($show_com_t->adresscommande==NULL)
                                           <td>Votre adresse de livraison sera la meme que votre adresse de compte!!.Au cas ou vous voudriez changer l'addresse, veillez bien vouloir cliquer sur le bouton "Change Your Adress Shipping"</td>
                                        @else
                                        <td style="text-align: center">{{$show_com_t->adresscommande}}</td>
 
                                        @endif
                                    </tr><!-- End .summary-shipping-row -->
  
                                </tbody>
                                 
                            </table><!-- End .table table-summary -->
                             @if ($show_com_t->statut==0)
                             <a href="{{url('template/update_adress_shipping/'.$show_com_t->id)}}" class="btn btn-outline-primary-2 btn-order btn-block">UPDATE ADRESS_SHIPPING</a>
                               @else
                               

                             @endif


                        </div><!-- End .summary -->

                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
 @section('scripts')
 @endsection   
@endsection