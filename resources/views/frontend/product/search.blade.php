@extends('frontend.main_master')
@section('content')
@section('title')
Category Wise Products
@endsection

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'>

        <!-- ===== == TOP NAVIGATION ======= ==== -->
        @include('frontend.common.vertical_menu')
        <!-- = ==== TOP NAVIGATION : END === ===== -->

        <div class="sidebar-module-container">
          <div class="sidebar-filter">

            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder -->
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== PRICE SILDER : END ============================================== -->


            <!-- ============================================== PRODUCT TAGS ============================================== -->
            @include('frontend.common.product_tags')
            <!-- ============================================== PRODUCT TAGS END ============================================== -->


          <!-- ============================================== Testimonials ============================================== -->
          @include('frontend.common.testimonials')
          <!-- ============================================== Testimonials: END ============================================== -->

            <div class="home-banner"> <img src="/frontend/assets/images/banners/banner-pd.jpg" alt="Image"> </div>
          </div><br><br>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="category" class="category-carousel">
          <div class="item">
            <div class="image"> <img src="/frontend/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Find Your Thing </div>
                <div class="excerpt hidden-sm hidden-md" style="color: #5a197a;"> </div>
                <div class="excerpt-normal hidden-sm hidden-md" style="color: black;"></div>
              </div>
              <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>
        <h4><b>Total Search with "{{$item}}" : </b><span class="badge badge-danger" style="background: #4ecac5;">{{ count($products) }}</span> product(s)</h4>

        <!-- ========================================== FILTER OPTIONS ========================================= -->
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- ========================================== FILTER OPTIONS END========================================= -->

        <!--    //////////////////// START Product Grid View  ////////////// -->

        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  @foreach($products as $product)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ $product->image_link }}"  alt="{{ $product->product_name_en}}"  height="250"></a> </div>
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
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                            @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                            @else {{ $product->product_name_en }}
                            @endif</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                            @if ($product->discount_price == NULL)
                            <div class="product-price"> <span class="price"> ${{ $product->price }} </span>   </div>
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
                              <li>
                                <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                              </li>
                              {{-- <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
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
                <!-- /.row -->
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane -->
            <!--            //////////////////// END Product Grid View  ////////////// -->

            <!--            //////////////////// Product List View Start ////////////// -->
            <div class="tab-pane "  id="list-container">
              <div class="category-product">
                @foreach($products as $product)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ $product->image_link }}" alt="{{ $product->product_name_en}}" height="250"> </div>
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
                                @else {{ $product->product_name_en }}
                                @endif
                              </a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            @if ($product->discount_price == NULL)
                              <div class="product-price"> <span class="price"> ${{ $product->price }} </span>  </div>
                            @else
                              <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->price }}</span> </div>
                            @endif
                            <!-- /.product-price -->
                            <div class="description m-t-10">
                              @if(session()->get('language') == 'swedish') {{ $product->short_descp_sv }}
                              @else {{ $product->short_descp_en }}
                              @endif</div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                  </li>
                                  {{-- <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
                                </ul>
                              </div>
                              <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                          </div>
                          <!-- /.product-info -->
                        </div>
                        <!-- /.col -->
                      </div>
                       {{-- @php
                        $amount = $product->price - $product->discount_price;
                        $discount = ($amount/$product->price) * 100;
                       @endphp     --}}

                      <!-- /.product-list-row -->
                      <div>
                        @if ($product->discount_price)
                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                      </div>
                    </div>
                    <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
                </div>
                <!-- /.category-product-inner -->
                @endforeach

                <!--            //////////////////// Product List View END ////////////// -->
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  {{-- {{ $products->links()  }} --}}
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right -->
          </div>
          <!-- /.filters-container -->
        </div>
        <!-- /.search-result-container -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
   </div>
  <!-- /.container -->
</div>
<!-- /.body-content -->

@endsection