<!-- Sticky Bar -->
<div class="sticky-bar">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="{{asset('produit/'.$descript->photo)}}" alt="Product image">
                    </a>
                </figure><!-- End .product-media -->
                <h4 class="product-title"><a href="product.html">Dark yellow lace cut out swing dress</a></h4><!-- End .product-title -->
            </div><!-- End .col-6 -->

            <div class="col-6 justify-content-end">
                <div class="product-price">
                    ${{$descript->prix}}
                </div><!-- End .product-price -->
                <div class="product-details-quantity">
                    <input type="number" id="sticky-cart-qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                </div><!-- End .product-details-quantity -->

                <div class="product-details-action">
                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                </div><!-- End .product-details-action -->
            </div><!-- End .col-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .sticky-bar -->




{{dump(session('info_user')[0]->name)}}


---------------------------------------------------------------------------------------------

                              <div class="col-6">
                                @foreach ($show_produit as $item)
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">Top</span>
                                        <span class="product-label label-circle label-sale">Sale</span>
                                        <a href="{{url('Template/description/'.$item->id)}}">
                                            <img src="{{asset('produit/'.$item->photo)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="" class="btn-product btn-cart" title="Add to cart" onclick="add_panierx({{$item->id}})"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{$item->nom}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{$item->description}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">${{$item->prix}}</span>
                                            <span class="old-price">Was $3,999.99</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 5 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @endforeach
                            </div><!-- 


                                ***********************************************************************************************

                                  @foreach ($show_produit as $item)
                    <div class="product product-2">

                       
                        <figure class="product-media">
                           
                            <span class="product-label label-circle label-new">New</span>
                            <a href="{{url('Template/description/'.$item->id)}}">
                                <img src="{{asset('produit/'.$item->photo)}}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            </div><!-- End .product-action -->


                            <div class="product-action product-action-dark">
                                <a href="" class="btn-product btn-cart" title="Add to cart" onclick="add_panierx({{$item->id}})"><span>add to cart</span></a>
                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{$item->nom}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{$item->description}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                ${{$item->prix}}
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->

                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #f2bc9e;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                            
                        </div><!-- End .product-body -->
                        
                        
                    </div><!-- End .product -->
                    @endforeach
                    ---------------------------------------------------------------------------------------------
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                          
                          </div>
                         
                        </div>
                      </div>




---------------------------------------------------------------------------------------------
<div class="carousel-item">
    <img class="d-block w-100" src="..." alt="Second slide">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="..." alt="Third slide">
  </div>
------------------------------

                      <figure class="slide-image">
                        <picture>

                          <source media="(max-width: 480px)" srcset="{{asset('assets/images/demos/demo-3/slider/slide-1-480w.jpg')}}">
                            <img src="{{asset('assets/images/demos/demo-3/slider/slide-1.jpg')}}" alt="Image Desc">
                        </picture>






                    </figure><!-- End .slide-image -->
                    <div class="carousel-item">
                      
                      </div>

                      @A?25cb1jf%8+8U*