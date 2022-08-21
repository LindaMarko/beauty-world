<header class="header-style-1">

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            {{-- <li><a href="#"><i class="icon fa fa-user"></i>
              @if(session()->get('language') == 'swedish') Mitt konto
              @else My Account
              @endif</a>
            </li> --}}
            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="{{route('mycart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
            <li>
              @auth
              <a href="{{route('dashboard')}}"><i class="icon fa fa-user"></i>User Profile</a>
              @else
              <a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a>
              @endauth
            </li>
          </ul>
        </div>
        <!-- /.cnt-account -->

        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">SEK</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small">
              <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                @if(session()->get('language') == 'swedish') Språk
                @else Language
                @endif </span><b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                @if(session()->get('language') == 'swedish')
                <li><a href="{{ route('english.language') }}">English</a></li>
                @else
                <li><a href="{{ route('swedish.language') }}">Swedish</a></li>
                @endif
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled -->
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{url('/')}}"> <img src="/frontend/assets/images/logo2.png" alt="logo"> </a> </div>
          <!-- /.logo -->
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
          <!-- /.contact-row -->
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form method="POST" action="{{ route('product.search') }}">
              @csrf

              <input class="search-field" name="search" id="search" placeholder="Search here..." />
              <button  type="submit" class="search-button"></button>
            </form>
            <div id="searchProducts"></div>
          </div>
          <!-- /.search-area -->
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
              <div class="total-price-basket">
                <span class="lbl">cart - </span>
                <span class="total-price">
                  <span class="sign">$</span>
                  <span class="value" id="cartSubTotal"></span>
                </span>
              </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!--   // Mini Cart Start with Ajax -->
                <div id="miniCart"></div>
                <!--   // End Mini Cart Start with Ajax -->

                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Total: $</span>
                    <span class='price'  id="cartSubTotal"></span></div>
                  <div class="clearfix"></div>
                  <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total-->

              </li>
            </ul>
            <!-- /.dropdown-menu-->
          </div>
          <!-- /.dropdown-cart -->

          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.main-header -->

  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw">
                  <a href="/" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if(session()->get('language') == 'swedish') Hem
                    @else Home
                    @endif
                  </a>
                </li>

              <!--   // Get Category Table Data -->
                @php
                $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                @endphp

                @foreach($categories as $category)
                  <li class="dropdown yamm mega-menu">
                    <a href="{{url('category/products/'.$category->category_name_en )}}" >
                      @if(session()->get('language') == 'swedish') {{ $category->category_name_sv }}
                      @else {{ str_replace('_', ' ', $category->category_name_en) }}
                      @endif
                    </a>
              {{-- <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row"> --}}

                          <!--   // Get SubCategory Table Data -->
                            {{-- @php
                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                            @endphp

                            @foreach($subcategories as $subcategory)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">{{ $subcategory->subcategory_name_en }}</h2>

                              <!--   // Get SubSubCategory Table Data -->
                              @php
                              $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                              @endphp

                              @foreach($subsubcategories as $subsubcategory)
                              <ul class="links">
                                <li><a href="#">{{ $subsubcategory->subsubcategory_name_en }}</a></li>
                              </ul>
                              @endforeach <!-- // End SubSubCategory Foreach -->
                            </div>
                            <!-- /.col -->
                            @endforeach <!-- // End SubCategory Foreach --> --}}

                            {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                              <img class="img-responsive" src="/frontend/assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                              <!-- /.yamm-content -->
                            </div> --}}
                          {{-- </div>
                        </li>
                      </ul> --}}
                    </li>
                  @endforeach <!-- // End Category Foreach -->

                {{-- <li class="dropdown  navbar-right special-menu">
                  <a href="#">Todays offer</a>
                </li> --}}
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default -->
    </div>
    <!-- /.container-class -->
  </div>
  <!-- /.header-nav -->
  <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<style>

  .search-area{
    position: relative;
  }
  #searchProducts {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #ffffff;
    z-index: 999;
    border-radius: 8px;
    margin-top: 5px;
  }
</style>


<script>
  function search_result_hide(){
    $("#searchProducts").slideUp();
  }
    function search_result_show(){
      $("#searchProducts").slideDown();
  }

</script>