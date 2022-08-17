@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="cart-description item">Image</th>
                  <th class="cart-product-name item">Product Name</th>
                  <th class="cart-qty item">Quantity</th>
                  <th class="cart-sub-total item">Subtotal</th>
                  <th class="cart-romove item">Remove</th>
                </tr>
              </thead>
              <tbody id="cartPage">
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 cart-shopping-total" style="width: 100%;">
          <div class="cart-checkout-btn pull-right">
            <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">PROCEED TO CHECKOUT</a>
          </div>
        </div><!-- /.cart-shopping-total -->
      </div><!-- /.row -->
		</div><!-- /.sigin-in-->

<br>
 {{-- @include('frontend.body.brands') --}}
</div>

@endsection