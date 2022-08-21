@extends('frontend.main_master')
@section('content')
@section('title')
Category Wise Products
@endsection

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="/">Home</a></li>
        @foreach($breadcrumbcat as $item)
        <li class='active'>{{ str_replace('_', ' ', strtoupper($item->category_name_en)) }}</li>
        @endforeach
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>

      <!-- ===== == SIDEBAR ======= ==== -->
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
            <div class="image"> <img src="/frontend/assets/images/banners/cat-banner-2.jpg" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                @foreach($breadcrumbcat as $item)
                <div class="big-text"> {{ str_replace('_', ' ', strtoupper($item->category_name_en)) }} </div>
                @endforeach
                {{-- <div class="excerpt hidden-sm hidden-md" style="color: #5a197a;"> Save up to 49% off </div> --}}
                {{-- <div class="excerpt-normal hidden-sm hidden-md" style="color: black;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div> --}}
              </div>
              <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>

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
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"><span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->

            </div>
            <!-- /.col -->
            {{ $products->links('vendor.pagination.custom') }}
            <!-- /.pagination-container -->

          </div>
          <!-- /.row -->
        </div>
        <!-- ========================================== FILTER OPTIONS END========================================= -->

        <!-- ===================== START Product Grid View ====================== -->
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row" id="grid_view_product">
                  @include('frontend.product.grid_view_product')
                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane -->
        <!--  ======================== END Product Grid View ===================== -->

        <!-- =========================== Product List View Start ========================== -->
            <div class="tab-pane "  id="list-container">
              <div class="category-product" id="list_view_product">
               @include('frontend.product.list_view_product')
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
        <!-- ======================= Product List View END ====================== -->
          </div>
          <!-- /.tab-content -->

        <!-- ======================= PAGINATION ====================== -->
        {{ $products->links('vendor.pagination.custom')  }}


          {{-- AJAX LOAD --}}
        {{-- <div class="ajax-loadmore-product text-center" style="display: none;">
          <img src="/frontend/assets/images/loader.svg" style="width: 56px; height: 56px;">
        </div> --}}
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
    </div>
  <!-- /.container -->
</div>
<!-- /.body-content -->

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function loadmoreProduct(page){
    $.ajax({
      type: "get",
      datatype: "json",
      url: "?page="+page,
      beforeSend: function(response){
        $('.ajax-loadmore-product').show();
      }
    })

    .done(function(data){
        if (data.grid_view == " " || data.list_view == " ") {
          return;
        }
         $('.ajax-loadmore-product').hide();
         $('#grid_view_product').append(data.grid_view);
         $('#list_view_product').append(data.list_view);
      })
      .fail(function(){
        alert('Something Went Wrong');
      })
  }
  var page = 1;
  $(window).scroll(function (){
    if ($(window).scrollTop() +$(window).height() >= $(document).height()){
      page ++;
      loadmoreProduct(page);

    }
  });
</script> --}}


@endsection