
@php
$featured = App\Models\Product::where('featured',1)
->where('product_type','eyebrow')
->where([
  ['price', '!=', '0.0'],
  ['brand', '!=', 'benefit'],
  ['brand', '!=', 'glossier'],
  ['brand', '!=', 'deciem'],
])
->limit(9)->get();
@endphp

<section class="section featured-product wow fadeInUp">
  <h3 class="section-title">Featured products</h3>
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
    @foreach($featured as $product)
    <div class="item item-carousel">
      <div class="products">
        <div class="product">
          <div class="product-image">
            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->image_link)}}" alt="{{ $product->product_name_en}}" width="200" height="200"></a> </div>
            <!-- /.image -->
            {{-- @php
            $amount = $product->price - $product->discount_price;
            $discount = ($amount/$product->price) * 100;
            @endphp --}}
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
