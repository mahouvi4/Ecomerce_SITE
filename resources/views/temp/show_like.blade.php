@extends('base2')

@section('emo')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Wishlist<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                <li class="breadcrumb-item"><a href="{{url('template/all_commande_user_checkout')}}">All SHIPPING</a></li>

            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($show_list_like as $item)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{asset('produit/'.$item->produit->photo)}}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">{{$item->produit->nom}}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">${{$item->produit->prix}}</td>
                          @if ($item->produit->stock > 0)
                            <td class="stock-col"><span class="in-stock">In Stock</span></td>
                                 @else
                                 <td class="stock-col"><span class="Out-stock">Out of Stock</span></td>

                          
                              
                          @endif
                        <td class="action-col">
                            <div class="dropdown">
                           @if ($item->produit->stock > 0)
                           <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="add_panierx({{$item->produit->id}})">
                            <i class="icon-list-alt"></i>Add To Cart</button>
                        
                        </div>
                              @else
                              <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" reandonly="reandonly">
                                <i class="icon-list-alt"></i>Out of Stock
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">First option</a>
                                <a class="dropdown-item" href="#">Another option</a>
                                <a class="dropdown-item" href="#">The best option</a>
                              </div>
                            </div>
                           @endif

                            
                        </td>
                        <td class="remove-col"><button type="button" class="btn-remove" onclick="destroy_like({{$item->id}})"><i class="icon-close"></i></button></td>
                    </tr>
                    @endforeach
                   
                
                </tbody>
            </table><!-- End .table table-wishlist -->
            <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">Share on:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .wishlist-share -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@section('scripts')
@endsection
@endsection