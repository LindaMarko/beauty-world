@php
  $hot_deals = App\Models\Product::where('hot_deals',1)
  ->orderBy('price','ASC')
  ->where([
      ['price', '!=', '0.0'],
      ['brand', '!=', 'benefit'],
      ['brand', '!=', 'glossier'],
      ['brand', '!=', 'deciem'],
  ])
  ->limit(6)->get();
@endphp


<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
  <h3 class="section-title">hot deals</h3>
  <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
    @foreach($hot_deals as $product)
    <div class="item">
      <div class="products">
        <div class="hot-deal-wrapper">
          <div class="tag hot"><span>Hot</span></div>
          <div class="image">
            <img src="{{ asset($product->image_link) }}" alt="{{ $product->product_name_en }}" style="width: 180px;">
          </div>

          {{-- @php
          $amount = $product->price - $product->discount_price;
          $discount = ($amount/$product->price) * 100;
          @endphp --}}

          </div>
          <!-- /.hot-deal-wrapper -->
          <div class="product-info text-left m-t-20">
            <h3 class="name">
              <a href="detail.html">
              @if(session()->get('language') == 'swedish') {{ $product->product_name_sv }}
              @else {{ $product->product_name_en }}
              @endif
              </a>
            </h3>

            <div class="rating rateit-small"></div>
             @if ($product->discount_price == NULL)
              <div class="product-price"> <span class="price"> ${{ $product->price }} </span>  </div>
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
            </ul>
          </div>
          <!-- /.action -->
        </div>
        <!-- /.cart -->
      </div>
    </div>
    @endforeach <!-- // end hot deals foreach -->
  </div>
  <!-- /.sidebar-widget -->
</div>