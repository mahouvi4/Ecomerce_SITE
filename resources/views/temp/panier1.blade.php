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
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
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
                               @foreach ($show_cart as $item)
                               <tr class="papa">
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{asset('produit/'.$item->produit->photo)}}" alt="">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            {{$item->produit->nom}}
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col">${{$item->produit->prix}}</td>
                                <td>
                                    
                 
                        <button type="button" class="btn btn decrement2 xinx">-</button>
                    <input type="text" class="qt_modif" value="{{$item->qt}}" style="width: 15px">
                    <button type="button" class="btn btn increment1 xinx">+</button>

                   
                                   <!-- End .cart-product-quantity -->
                                </td>
                                <td class="total-col" style="color: darkslateblue">${{$item->produit->prix*$item->qt}}</td>
                                <td class="remove-col"><button class="btn-remove" onclick="delete_produit_panier({{$item->id}})"><i class="icon-close"></i></button></td>
                            

                               <input type="hidden" value="{{$item->id}}" class="id_panier">
                            </tr> 
                                 
                            @php
                            $total+=$item->produit->prix*$item->qt;
                       @endphp
                               @endforeach
                               
                            </tbody>
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
                    <aside class="col-lg-3" style="background-color: rgb(36, 21, 33)">
                        <div class="summary summary-cart" style="background-color: rgb(233, 90, 147)">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary" style="background-color: rgb(117, 205, 242)">
                                <tbody>
                                   
                                  
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{$total}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    @foreach ($show_cart as $item)
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">{{$item->produit->nom}}</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>${{$item->produit->prix}}</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    @endforeach
                                  
                                    <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="{{url('template/mon_compte')}}">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{$total}}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->
                    @if ($total !=0)
                        <a href="{{url('template/checkout_x')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>

                    @else
                    <a href="{{url('/')}}" class="btn btn-outline-primary-2 btn-order btn-block">ChOOSE YOUR PRODUCT </a>
 
                    @endif
                        </div><!-- End .summary -->

                        <a href="{{url('template/product_category')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->