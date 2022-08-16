<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="" class="card-img-top" alt="" style="height: 200px; width: 200px;" id="pimage">
          </div>
        </div><!-- // end col md -->
        <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item">Product Price: <strong id="price"></strong></li>
            <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
            <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
          </ul>
        </div><!-- // end col md -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="color">Choose Color</label>
            <select class="form-control" id="color">
            </select>
          </div>  <!-- // end form group -->
          {{-- <div class="form-group">
            <label for="size">Choose Size</label>
            <select class="form-control" id="size">
              <option>1</option>
            </select>
          </div>  <!-- // end form group --> --}}
          <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control" id="qty" value="1" min="1" >
          </div> <!-- // end form group -->
          <input type="hidden" id="product_id">
          <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
        </div><!-- // end col md -->
      </div> <!-- // end modal Body -->
    </div>
  </div>
</div>
<!-- End Add to Cart Product Modal -->

<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

  // Start Product View with Modal
  function productView(id){
      // alert(id)
      $.ajax({
          type: 'GET',
          url: '/product/view/modal/'+id,
          dataType:'json',
          success:function(data){
            console.log(data)
            $('#pname').text(data.product.product_name_en);
            $('#price').text(data.product.price);
            $('#pcategory').text(data.product.product_type);
            $('#pbrand').text(data.product.brand);
            $('#pimage').attr('src','/'+data.product.image_link);
            $('#product_id').val(id);
            $('#qty').val(1);
          }
      })
  }
  // End Product View with Modal

 // Start Add To Cart Product
 function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var price = $('#price').text();
        // var color = $('#color option:selected').text();
        // var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                quantity:quantity, product_name:product_name, price: price
            },
            url: "/cart/data/store/"+id,
            success:function(data){

              miniCart()
              $('#closeModel').click();
                console.log(data)

                // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })
    }
  // End Add To Cart Product

</script>

<script type="text/javascript">
  function miniCart(){
     $.ajax({
         type: 'GET',
         url: '/product/mini/cart',
         dataType:'json',
         success:function(response){
             console.log(response)

              $('span[id="cartSubTotal"]').text(response.cartTotal);
              $('#cartQty').text(response.cartQty);
              var miniCart = ""
                $.each(response.cartItems, function(key,value){
                    miniCart += `<div class="cart-item product-summary">
                      <div class="row">
                        <div class="col-xs-4">
                          <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                        </div>
                        <div class="col-xs-7">
                          <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                          <div class="price"> ${value.price} * ${value.qty} </div>
                        </div>
                        <div class="col-xs-1 action">
                          <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                        </div>
                      </div>
                    </div>
                    <!-- /.cart-item -->
                    <div class="clearfix"></div>
                    <hr>`
                    });

                $('#miniCart').html(miniCart);
        }
     })
  }
  miniCart();

  /// mini cart remove Start
  function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
    }
 //  mini cart remove END
</script>

</body>
</html>