@extends('frontend.main_master')
@section('title')
Home - Beauty World
@endsection
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('frontend.common.vertical_menu')
        <!-- ================================== TOP NAVIGATION : END ================================== -->

        <!-- ============================================== HOT DEALS ============================================== -->
        @include('frontend.common.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">
                  @foreach($special_offer as $product)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{$product->image_link }}" alt=""> </a> </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                              @else {{ $product->product_name_en }} @endif
                              </a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> ${{ $product->price }} </span> </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  @endforeach <!-- // end special offer foreach -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        @include('frontend.common.product_tags')
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">
                  @foreach($special_deals as $product)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ $product->image_link }}"  alt=""> </a> </div>
                              <!-- /.image -->
                            </div>
                           <!-- /.product-image -->
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name">
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                                @else {{ $product->product_name_en }}
                                @endif
                                </a>
                              </h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> ${{ $product->price }} </span> </div>
                              <!-- /.product-price -->
                            </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  @endforeach <!-- // end special deals foreach -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
        @include('frontend.common.testimonials')
        <!-- ============================================== Testimonials: END ============================================== -->

        <div class="home-banner"> <img src="/frontend/assets/images/banners/banner-pd.jpg" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            @foreach($sliders as $slider)
              <div class="item" style="background-image: url({{ $slider->slider_img }});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="big-text fadeInDown-1" style="color: white; margin-top: 120px;">{{ $slider->title }} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs" style="color: #e8bbfa; font-size: 20px; font-style: italic;"> <span>{{ $slider->description }}</span> </div>
                    <div class="button-holder fadeInDown-3" style="margin: 10px 0 0;"> <a  class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  </div>
                  <!-- /.caption -->
                </div>
                <!-- /.container-fluid -->
              </div>
              <!-- /.item -->
            @endforeach

          </div>
          <!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        @include('frontend.common.info_boxes')
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== NEW Products - SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              @foreach($categories as $category)
              <li>
                <a data-transition-type="backSlide" href="#category{{ $category->category_name_en }}" data-toggle="tab">{{ str_replace('_', ' ', $category->category_name_en) }}</a>
              </li>
              @endforeach
            </ul>
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{$product->image_link}}" alt="{{ $product->product_name_en}}" height="200"></a>
                          </div>
                          <!-- /.image -->
                          @php
                          $amount = $product->price - $product->discount_price;
                          $discount = ($amount/$product->price) * 100;
                          @endphp
                          {{-- <div class="tag new"><span>new</span></div>
                        </div> --}}
                        <div>
                          @if ($product->discount_price == NULL)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name">
                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                              @else {{ $product->product_name_en }}
                              @endif
                            </a>
                          </h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if ($product->discount_price == NULL)
                          <div class="product-price"> <span class="price"> ${{ $product->price }} </span></div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">${{ $product->price }}</span> </div>
                          @endif
                          <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->

                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  @endforeach<!--  // end all optionproduct foreach  -->
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

            @foreach($categories as $category)
            <div class="tab-pane" id="category{{ $category->category_name_en }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                @php
                  $catwiseProduct = App\Models\Product::where('product_type', strtolower($category->category_name_en))->orderBy('id','DESC')->limit(6)->get();
                @endphp
                  @forelse($catwiseProduct as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{$product->image_link }}" alt="{{ $product->product_name_en}}" height="200"></a> </div>
                          <!-- /.image -->
                          @php
                          $amount = $product->price - $product->discount_price;
                          $discount = ($amount/$product->price) * 100;
                          @endphp
                          <div>
                            @if ($product->discount_price == NULL)
                            <div class="tag new"><span>new</span></div>
                            @else
                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                            @endif
                          </div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name">
                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                              @else {{ $product->product_name_en }}
                              @endif
                            </a>
                          </h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if ($product->discount_price == NULL)
                          <div class="product-price"> <span class="price"> ${{ $product->price }} </span></div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">${{ $product->price }}</span> </div>
                          @endif
                          <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                       <!-- /.product -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  @empty
                  <h5 class="text-danger">No Product Found</h5>

                  @endforelse<!--  // end all optionproduct foreach  -->
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->
            @endforeach <!-- end category foreach -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
         <!-- ============================================== WIDE PRODUCTS 1 ============================================== -->
         <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <a href="{{url('/category/products/brand/maybelline')}}"><img class="img-responsive" src="/frontend/assets/images/banners/home-banner2.jpg" alt=""></a> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right"><br>
                      <span class="shopping-needs"></span></h2>
                  </div>
                </div>
                {{-- <div class="new-label">
                  <div class="text">NEW</div>
                </div> --}}
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS 1: END ============================================== -->

        <!-- ============================== ======= skip_category PRODUCTS ============================= ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'swedish') {{ $skip_category_1->category_name_sv }}
            @else {{ str_replace('_', ' ', $skip_category_1->category_name_en) }}
            @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          @foreach($skip_product_1 as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ $product->image_link }}" alt="{{ $product->product_name_en}}" width="200" height="200"></a> </div>
                    <!-- /.image -->

                    {{-- @php
                    $amount = $product->price - $product->discount_price;
                    $discount = ($amount/$product->price) * 100;
                    @endphp --}}

                    <div>
                      @if ($product->discount_price)
                      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                      @endif
                    </div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                      @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                      @else {{ $product->product_name_en }}
                      @endif
                      </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if ($product->discount_price == NULL)
                      <div class="product-price"> <span class="price"> ${{ $product->price }} </span>  </div>
                    @else
                      <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->price }}</span> </div>
                    @endif
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->
         @endforeach
        </div>
        <!-- /.home-owl-carousel -->
      </section>
      <!-- /.section -->
      <!-- ================================= ==== skip_category PRODUCTS : END ================================== === -->

      <!-- ============================== ======= skip_brand PRODUCTS ============================= ==== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'swedish') {{ $skip_brand_19->brand_name_sv }}
            @else {{ str_replace('_', ' ', $skip_brand_19->brand_name_en) }}
            @endif
          </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          @foreach($skip_brand_product_19 as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{$product->image_link }}" alt="{{ $product->product_name_en}}" width="200" height="200"></a> </div>
                    <!-- /.image -->

                    {{-- @php
                    $amount = $product->price - $product->discount_price;
                    $discount = ($amount/$product->price) * 100;
                    @endphp --}}

                    <div>
                      @if ($product->discount_price)
                      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                      @endif
                    </div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                      @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                      @else {{ $product->product_name_en }}
                      @endif
                      </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if ($product->discount_price == NULL)
                      <div class="product-price"> <span class="price"> ${{ $product->price }} </span>  </div>
                    @else
                      <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->price }}</span> </div>
                    @endif
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->
         @endforeach
        </div>
        <!-- /.home-owl-carousel -->
      </section>
      <!-- /.section -->
      <!-- ================================= ==== skip_brand_product PRODUCTS : END ================================== === -->

        <!-- ============================================== WIDE PRODUCTS 2 ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"><a href="{{url('/category/products/brand/nyx')}}"><img class="img-responsive" src="/frontend/assets/images/banners/home-banner1.jpg" alt=""></a> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right"><br>
                      <span class="shopping-needs"></span></h2>
                  </div>
                </div>
                {{-- <div class="new-label">
                  <div class="text">NEW</div>
                </div> --}}
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS 2 : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        @include('frontend.common.featured_products')
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">Beauty blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href=""><img src="/frontend/assets/images/blog-post/post1.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="">Voluptatem accusantium doloremque laudantium</a></h3>
                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->
                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href=""><img src="/frontend/assets/images/blog-post/post2.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
          </div>
          <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

         <!-- ============================================== WIDE PRODUCTS 3 ============================================== -->
         <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="/frontend/assets/images/banners/home-banner.jpg" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Palettes<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS 3 : END ============================================== -->


      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection