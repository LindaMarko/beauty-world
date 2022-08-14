@php
$categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp


 <!-- ================================== TOP NAVIGATION ================================== -->
 <div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
  <nav class="yamm megamenu-horizontal">
    <ul class="nav">
      @foreach($categories as $category)
      <li > <a href="{{url('category/products/'.$category->category_name_en )}}"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
        @if(session()->get('language') == 'swedish') {{ $category->category_name_sv }}
        @else {{ str_replace('_', ' ', $category->category_name_en) }}
        @endif
        </a>

        {{-- <ul class="dropdown-menu mega-menu">
          <li class="yamm-content">
            <div class="row">
            <!--   // Get SubCategory Table Data -->
            @php
            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
            @endphp

            @foreach($subcategories as $subcategory)
              <div class="col-sm-12 col-md-3">
              <h2 class="title">
                @if(session()->get('language') == 'swedish') {{ $subcategory->subcategory_name_sv }}
                @else {{ $subcategory->subcategory_name_en }}
                @endif
              </h2>

              <!--   // Get SubSubCategory Table Data -->
                @php
                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                @endphp

                @foreach($subsubcategories as $subsubcategory)
                  <ul class="links list-unstyled">
                    <li>
                      <a href="#">
                      @if(session()->get('language') == 'swedish') {{ $subsubcategory->subsubcategory_name_sv }}
                      @else {{ $subsubcategory->subsubcategory_name_en }}
                      @endif
                      </a>
                    </li>
                  </ul>
                @endforeach <!-- // End SubSubCategory Foreach -->
                </div>
                <!-- /.col -->
            @endforeach  <!-- End SubCategory Foreach -->
            </div>
            <!-- /.row -->
          </li>
          <!-- /.yamm-content -->
        </ul>
        <!-- /.dropdown-menu --> --}}
      </li>
      <!-- /.menu-item -->
      @endforeach  <!-- End Category Foreach -->
    </ul>
    <!-- /.nav -->
  </nav>
  <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->