@extends('frontend.main_master')
@section('content')

@section('title')
My Checkout
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8" style="margin-bottom: 10px;">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
            <div class="panel panel-default checkout-step-01">
              <!-- panel-heading -->
              <div id="collapseOne" class="panel-collapse collapse in">
                <!-- panel-body  -->
                  <div class="panel-body">
                  <div class="row">

                    <div class="col-md-6 col-sm-6">
                      <h1 class="checkout-subtitle"><b>Shipping Address</b></h1><br>
                      <form class="register-form" action="" method="">
                        @csrf
                        <div class="form-group">
                          <label class="info-title" for="name"><b>Name</b> <span>*</span></label>
                          <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" placeholder="full name" value="{{ (Auth::user()) ? Auth::user()->name : "" }}" required="">
                        </div>  <!-- // end form group  -->
                        <div class="form-group">
                          <label class="info-title" for="email"><b>Email</b> <span>*</span></label>
                          <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" placeholder="email" value="{{ (Auth::user()) ? Auth::user()->email : "" }}" required="">
                        </div>  <!-- // end form group  -->
                        <div class="form-group">
                          <label class="info-title" for="phone"><b>Phone</b> <span>*</span></label>
                          <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" placeholder="phone" value="{{ (Auth::user()) ? Auth::user()->phone : "" }}" required="">
                        </div>  <!-- // end form group  -->
                        <div class="form-group">
                          <label class="info-title" for="postcode"><b>Postcode</b> <span>*</span></label>
                          <input type="text" name="postcode" class="form-control unicase-form-control text-input" id="postcode" placeholder="postcode" required="">
                        </div>  <!-- // end form group  -->
                    </div>

                    <div class="col-md-6 col-sm-6" style="margin-top: 48px;">
                        <div class="form-group">
                          <label class="info-title" for="adress"><b>Adress</b> <span>*</span></label>
                          <input type="text" name="adress" class="form-control unicase-form-control text-input" id="adress" placeholder="adress" required="">
                        </div>  <!-- // end form group  -->
                        <div class="form-group">
                          <label class="info-title" for="city"><b>City</b> <span>*</span></label>
                          <input type="text" name="city" class="form-control unicase-form-control text-input" id="city" placeholder="city" required="">
                        </div>  <!-- // end form group  -->
                        <div class="form-group">
                          <label class="info-title" for="country"><b>Country</b> <span>*</span></label>
                          <input type="text" name="country" class="form-control unicase-form-control text-input" id="country" placeholder="country" required="">
                        </div>  <!-- // end form group  -->
                        <div class="form-group">
                          <label class="info-title" for="notes"><b>Notes</b></label>
                          <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                        </div>  <!-- // end form group  -->
                    </div>
                  </div>
                </div>
                <!-- panel-body  -->
              </div><!-- row -->
            </div>
            <!-- End checkout-step-01  -->

					</div><!-- /.checkout-steps -->
				</div>

				<div class="col-md-4">
          <div class="checkout-progress-sidebar">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Your Cart</h4>
                  </div>
                  <div class="">
                  <ul class="nav nav-checkout-progress list-unstyled">
                    @foreach($cartItems as $item)
                    <li>
                      <strong>Image: </strong>
                      <img src="{{$item->options->image }}" style="height: 50px; width: 50px;">
                    </li>
                    <li>
                      <strong>Qty: </strong>
                      ( {{ $item->qty }} )
                      <strong>Color: </strong>
                      {{ $item->options->color }}<br><br>
                    @endforeach
                    <hr>
                    <li style="font-size: 16px;">
                      {{-- <strong>SubTotal: </strong> ${{ $cartTotal }}<br> --}}
                      <strong>Total : </strong> ${{ $cartTotal }} <hr>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /.col-md-4 -->

        <div class="col-md-8" style="margin-bottom: 120px;">
          <div class="checkout-progress-sidebar ">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                </div>
                <div class="row" style="padding: 15px;">
                  <div class="col-md-4">
                    <label for="">PayPal</label>
                    <input type="radio" name="payment_method" value="paypal">
                    <img src="/frontend/assets/images/payments/1.png">
                  </div> <!-- end col md 4 -->

                  <div class="col-md-4">
                    <label for="">Card</label>
                    <input type="radio" name="payment_method" value="card">
                    <img src="/frontend/assets/images/payments/4.png">
                  </div> <!-- end col md 4 -->

                  <div class="col-md-4">
                     <label for="">Cash</label>
                      <input type="radio" name="payment_method" value="cash">
                      <img src="/frontend/assets/images/payments/2.png">
                  </div> <!-- end col md 4 -->

                  <button type="button" class="btn-upper btn btn-primary checkout-page-button pull-right" style="margin-top: 50px;">Proceed to Payment</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.row -->
    </div><!-- /.checkout-box -->

    <!-- ============================================== INFO BOXES ============================================== -->
    @include('frontend.common.info_boxes')
    <!-- ============================================== INFO BOXES : END ============================================== -->
		<!-- ============================================== FEATURED PRODUCTS ============================================== -->
    @include('frontend.common.featured_products')
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection