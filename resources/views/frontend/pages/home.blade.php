@extends('frontend.layouts.app')

@section('main-body')

<!-- Block Spotlight1  -->
<section class="so-spotlight1 ">
    <div class="container">
        <div class="row">
            <div id="yt_header_left" class="col-md-9 col-md-12">
                <div id="wowslider-container1" style="margin-top: -2px;">
                    <div class="ws_images">
                        <ul>
                            <li><img src="{{ asset('') }}frontend/assets/image/demo/slider/v2-slide1.jpg" alt="v2-slide1" title="v2-slide1" id="wows1_0" /></li>
                            <li>
                                <a href="http://wowslider.com/vi"><img src="{{ asset('') }}frontend/assets/image/demo/slider/v2-slide2.jpg" alt="wordpress slider" title="v2-slide2" id="wows1_1" /></a>
                            </li>
                            <li><img src="{{ asset('') }}frontend/assets/image/demo/slider/v2-slide3.jpg" alt="v2-slide3" title="v2-slide3" id="wows1_2" /></li>
                        </ul>
                    </div>
                    
                    
                </div>
                
                
                        {{-- <div class="module ">
                            <div class="yt-content-slider yt-content-slider--arrow1" data-autoplay="no"
                                data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0"
                                data-items_column0="1" data-items_column1="1" data-items_column2="1"
                                data-items_column3="1" data-items_column4="1" data-arrows="yes"
                                data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                <div class="yt-content-slide">
                                    <a href="#"><img src="{{ asset('') }}frontend/assets/image/demo/slider/v2-slide1.jpg" alt="slider1"
                                            class="img-responsive"></a>
                                </div>
                                <div class="yt-content-slide">
                                    <a href="#"><img src="{{ asset('') }}frontend/assets/image/demo/slider/v2-slide2.jpg" alt="slider2"
                                            class="img-responsive"></a>
                                </div>
                                <div class="yt-content-slide">
                                    <a href="#"><img src="{{ asset('') }}frontend/assets/image/demo/slider/v2-slide3.jpg" alt="slider3"
                                            class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="loadeding"></div>
                        </div> --}}
                    
            </div>
            <div id="yt_header_right" class="col-md-3 hidden-sm hidden-xs">
                <div class="module">
                    <div class="modcontent clearfix">
                        <div class="banners">
                            <div>
                                <a href="#"><img src="{{ asset('') }}frontend/assets/image/demo/cms/v3-banner-header.png" alt="left-image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-html col-sm-12">
                <div class="module customhtml policy-v3">
                    <div class="modcontent clearfix">
                        <div class="block-policy-v3">
                            <div class="policy policy1 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="policy-inner">
                                    <span class="ico-policy"></span>
                                    <h2>30 days return</h2>
                                    <a href="#">money back</a>
                                </div>
                            </div>
                            <div class="policy policy2 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="policy-inner">
                                    <span class="ico-policy"></span>
                                    <a href="#">
                                        <h2>free shipping</h2>
                                        on all orders over $99
                                    </a>
                                </div>
                            </div>
                            <div class="policy policy3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="policy-inner">
                                    <span class="ico-policy"></span>
                                    <a href="#">
                                        <h2>lowest price</h2>
                                        guarantee
                                    </a>
                                </div>
                            </div>
                            <div class="policy policy4 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="policy-inner">
                                    <span class="ico-policy"></span>
                                    <a href="#">
                                        <h2>safe shopping</h2>
                                        guarantee
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Block Spotlight1  -->



<section class="so-spotlight1">
    <div class="main-container container">
        <div class="products-list row grid">



            <div class="banner-html col-sm-12">
                <h3 class="modtitle">All collections</h3>
                <div class="module customhtml policy-v3">
                    <div class="modcontent clearfix">
                        <div class="block-policy-v3">


                            @foreach ($main_cat as $item)
                            <div class="policy policy1 col-lg-2 col-md-3 col-sm-6 col-xs-6" style="margin: 10px auto;">
                                <a href="#">
                                    <div class="show-category-list">
                                        <img href="#" src="{{ asset('storage/categories/images/'.$item->photo.'') }}" alt="">
                                        <h4>{{ $item->name }}</h4>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<section class="so-spotlight3" style="background-color: #fff;">
    <div class="main-container container">

        <div class="row">
            <div id="so_categories_173761471880018" class="so-categories module titleLine preset01-4 preset02-3 preset03-3 preset04-1 preset05-1">
                
                    <h3 class="modtitle col-sm-8">Hot deals</h3>
                    
                    <div id="clockdiv">
                        <div>
                          <span class="days" id="day"></span>
                          <div class="smalltext">Days</div>
                        </div>
                        <div>
                          <span class="hours" id="hour"></span>
                          <div class="smalltext">Hours</div>
                        </div>
                        <div>
                          <span class="minutes" id="minute"></span>
                          <div class="smalltext">Minutes</div>
                        </div>
                        <div>
                          <span class="seconds" id="second"></span>
                          <div class="smalltext">Seconds</div>
                        </div>
                      </div>
                
                
            </div>
        </div>

        <div class="products-list row grid">

                @foreach ($products as $product)
                @php
                    
                    $photo_arr = json_decode($product->image);
                    $photo_name = $photo_arr[2];
                    $photo_name2 = $photo_arr[1];
                
                   
                @endphp 

                <div class="product-layout col-md-2 col-sm-4 col-xs-6">
                    <div class="product-item-container">

                        
                        <div class="left-block">
                            <div class="product-image-container lazy second_img  lazy-loaded">
                                <img data-src="{{ $pro_img.'/'.$photo_name }}" src="{{ $pro_img.'/'.$photo_name }}" alt="Apple Cinema 30&quot;" class="img-responsive">
                                <img data-src="{{ $pro_img.'/'.$photo_name2 }}" src="{{ $pro_img.'/'.$photo_name2 }}" alt="Apple Cinema 30&quot;" class="img_0 img-responsive">
                            </div>
                            <!--Sale Label-->
                            <span class="label label-sale">Sale</span>
                            <!--full quick view block-->
                            <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.html">  Quickview</a>
                            <!--end full quick view block-->
                        </div>
                        
                        
                        <div class="right-block">
                            <div class="caption">
                                <h4><a href="product.html">{{ $product->title }}</a></h4>		
                                <div class="ratings">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                                    
                                <div class="price">
                                    <span class="price-new">৳ {{ $product->sell_price }}</span> 
                                    <span class="price-old">৳ {{ $product->price }}</span>		 
                                    <span class="label label-percent">-40%</span>    
                                </div>
                                <div class="description item-desc hidden">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
                                </div>
                            </div>
                            
                            <div class="button-group">
                                <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
                                <button class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                                <button class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div><!-- right block -->
                        

                    </div>
                </div>
                
                @endforeach

            

            
            </div>
        </div>

    </div>
</section>





<section class="so-spotlight3" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div id="so_categories_173761471880018" class="so-categories module titleLine preset01-4 preset02-3 preset03-3 preset04-1 preset05-1">
                <h3 class="modtitle">Featured products</h3>
                
            </div>
        </div>

        <div class="products-list row grid">

                @foreach ($products as $product)
                @php
                    
                    $photo_arr = json_decode($product->image);
                    $photo_name = $photo_arr[0];
                    $photo_name2 = $photo_arr[3];
                @endphp

                <div class="product-layout col-md-2 col-sm-4 col-xs-6">
                    <div class="product-item-container">

                        
                        <div class="left-block">
                            <div class="product-image-container lazy second_img  lazy-loaded">
                                <img data-src="{{ $pro_img.'/'.$photo_name2 }}" src="{{ $pro_img.'/'.$photo_name2 }}" alt="Apple Cinema 30&quot;" class="img-responsive">
                                <img data-src="{{ $pro_img.'/'.$photo_name }}" src="{{ $pro_img.'/'.$photo_name }}" alt="Apple Cinema 30&quot;" class="img_0 img-responsive">
                            </div>
                            <!--Sale Label-->
                            <span class="label label-sale">Sale</span>
                            <!--full quick view block-->
                            <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.html">  Quickview</a>
                            <!--end full quick view block-->
                        </div>
                        
                        
                        <div class="right-block">
                            <div class="caption">
                                <h4><a href="product.html">{{ $product->title }}</a></h4>		
                                <div class="ratings">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                                    
                                <div class="price">
                                    <span class="price-new">৳ {{ $product->sell_price }}</span> 
                                    <span class="price-old">৳ {{ $product->price }}</span>		 
                                    <span class="label label-percent">-40%</span>    
                                </div>
                                <div class="description item-desc hidden">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
                                </div>
                            </div>
                            
                            <div class="button-group">
                                <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
                                <button class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                                <button class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div><!-- right block -->
                        

                    </div>
                </div>
                
                @endforeach

            

            
            </div>
        </div>


    </div>
</section>





<section class="" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div id="so_categories_173761471880018" class="col-sm-4 so-categories module titleLine preset01-4 preset02-3 preset03-3 preset04-1 preset05-1">
                <h3 class="modtitle">Electronics</h3>
                
            </div>
            <div class="col-sm-8">
                <div class="module">
                    <div class="modcontent clearfix">
                        <div class="banners">
                            <div>
                                <a href="#"><img src="{{ asset('') }}frontend/assets/image/demo/cms/v2-banner-home.jpg" alt="left-image" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="products-list row grid">

                @foreach ($products as $product)
                @php
                    
                    $photo_arr = json_decode($product->image);
                    $photo_name = $photo_arr[3];
                    $photo_name2 = $photo_arr[0];
                @endphp

                <div class="product-layout col-md-2 col-sm-4 col-xs-6">
                    <div class="product-item-container">

                        
                        <div class="left-block">
                            <div class="product-image-container lazy second_img  lazy-loaded">
                                <img data-src="{{ $pro_img.'/'.$photo_name2 }}" src="{{ $pro_img.'/'.$photo_name2 }}" alt="Apple Cinema 30&quot;" class="img-responsive">
                                <img data-src="{{ $pro_img.'/'.$photo_name }}" src="{{ $pro_img.'/'.$photo_name }}" alt="Apple Cinema 30&quot;" class="img_0 img-responsive">
                            </div>
                            <!--Sale Label-->
                            <span class="label label-sale">Sale</span>
                            <!--full quick view block-->
                            <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.html">  Quickview</a>
                            <!--end full quick view block-->
                        </div>
                        
                        
                        <div class="right-block">
                            <div class="caption">
                                <h4><a href="product.html">{{ $product->title }}</a></h4>		
                                <div class="ratings">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                                    
                                <div class="price">
                                    <span class="price-new">৳ {{ $product->sell_price }}</span> 
                                    <span class="price-old">৳ {{ $product->price }}</span>		 
                                    <span class="label label-percent">-40%</span>    
                                </div>
                                <div class="description item-desc hidden">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
                                </div>
                            </div>
                            
                            <div class="button-group">
                                <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
                                <button class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                                <button class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div><!-- right block -->
                        

                    </div>
                </div>
                
                @endforeach

            

            
            </div>
        </div>


    </div>
</section>












    
@endsection