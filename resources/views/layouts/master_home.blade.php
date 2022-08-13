<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets
 ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/assets/css/bootstrap.css') }}" type="text/css" />
    @if (session()->get('lang') == 'ar')
    <link rel="stylesheet" href="{{ asset('home/assets/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('home/assets/style-rtl.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('home/assets/demos/shop/shop.css') }}" type="text/css" />

    <style>
         .header-icons {
            margin-right: auto;
        }
        .copy-right, .forget-password, .login-form .form-group{
            text-align: right;
        }
    </style>
    @else
    <link rel="stylesheet" href="{{ asset('home/assets/style.css') }}" type="text/css" />
    <style>
        .header-icons {
            margin-left: auto;
        }
        .top-cart-number{
            right: 15px;
            left: 0;
        }
        .copy-right, .forget-password, .login-form .form-group{
            text-align: left;
        }
   </style>
    @endif
    <link rel="stylesheet" href="{{ asset('home/assets/css/all.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('home/assets/css/magnific-popup.css') }}" type="text/css" />
    <!-- Agency Demo Specific Stylesheet -->

    <link rel="stylesheet" href="{{ asset('home/assets/demos/agency/agency.css') }}" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="{{ asset('home/assets/css/animate.css') }}" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{ asset('home/assets/css/components/ion.rangeslider.css') }}" type="text/css" />

    @php
        $settings = DB::table('settings')->first();
        $route = Route::current()->getName();
    @endphp
    <link rel="icon" href="{{ asset($settings->favicon) }}" type="image/gif" sizes="16x16">

    <!-- Document Title
 ============================================= -->
    <title> @yield('title')</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .owl-prev {
            position: absolute;
            background-color: #1abc9c;
            color: #fff;
            padding: 5px 10px !important;
            font-size: 30px;
            top: 50%;
            right: 0;
        }

        .owl-next {
            position: absolute;
            background-color: #1abc9c;
            color: #fff;
            padding: 5px 10px !important;
            font-size: 30px;
            top: 50%;
            left: 0;
        }

        #oc-portfolio .owl-next,
        #oc-portfolio .owl-prev {
            top: 30% !important;
        }
        .checked {
            color: orange;
        }
        /* services */

        .services i {
            font-size: 50px;
            color:#1FBADF;
        }

        /* footer */

        .socials i {
            font-size: 30px;
        }


        .lang .sub-menu-container {
            width: 100px;
            margin-left: 10px;
        }
        body{
            overflow-x: hidden;
        }

        /* css rtl */
		#top-account {
			font-size: 14px;
			font-weight: 500;
			border-left: 1px solid #DDD;
			border-right: 0;
			padding: 3px 0 3px 15px;
		}

		.fslider {
			direction: ltr;
		}

		.shop-footer-features i {
			margin-left: 10px;
			margin-right: 0;
		}

		/* custom */

		.show-all {
			color: #fff;
			padding: 5px;
			border-radius: 5px;
			position: absolute;
			left: 5px;
		}

		.product-slider h4 {
			background-color: #dc3545;
			color: #fff;
			padding: 5px;
			width: 100%;
		}

		.product-slider::before, .product-slider::after {
			content: none;
		}
    </style>

<script src="https://js.stripe.com/v3/"></script>

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">

        @include('layouts.body.header')


        <main id="main">

            @yield('home_content')

        </main><!-- End #main -->

        @include('layouts.body.footer')


    </div><!-- #wrapper end -->

    <!-- Go To Top
============================================= -->
    <div id="gotoTop" class="fa-solid fa-caret-up"></div>
    <!-- JavaScripts

      // Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width:50%;">
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

                              <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;"
                                  id="pimage">

                          </div>

                      </div><!-- // end col md -->


                      <div class="col-md-4">

                          <ul class="list-group">
                              <li class="list-group-item">{{ trans('site/body.price') }}: <strong
                                      class="text-danger">$<span id="pprice"></span></strong>
                                  <del id="oldprice">$</del>
                              </li>
                              <li class="list-group-item">{{ trans('site/body.product-code') }}: <strong id="pcode"></strong>
                              </li>
                              <li class="list-group-item">{{ trans('site/body.category') }}: <strong
                                      id="pcategory"></strong></li>
                              </li>
                              <li class="list-group-item">{{ trans('site/body.stock') }}: <span
                                      class="badge badge-pill badge-success" id="aviable"
                                      style="background: green; color: white;"></span>
                                  <span class="badge badge-pill badge-danger" id="stockout"
                                      style="background: red; color: white;"></span>

                              </li>
                          </ul>

                      </div><!-- // end col md -->

                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="qty">{{ trans('site/body.qty') }}</label>
                              <input type="number" class="form-control" id="qty" value="1" min="1">
                          </div> <!-- // end form group -->

                          <input type="hidden" id="product_id">
                          <button type="submit" class="btn btn-primary mb-2"
                              onclick="addToCart()">{{ trans('site/body.add-to-cart') }}</button>

                      </div><!-- // end col md -->

                  </div> <!-- // end row -->

              </div> <!-- // end modal Body -->

          </div>
      </div>
  </div>
  <!-- End Add to Cart Product Modal -->

    <script src="{{ asset('home/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('home/assets/js/plugins.min.js') }}"></script>

    <!-- Range Slider Plugin -->
    <script src="{{ asset('home/assets/js/components/rangeslider.min.js') }}"></script>


    <!-- Footer Scripts
============================================= -->
    <script src="{{ asset('home/assets/js/functions.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>
    
    <script>
        $('#oc-portfolio.owl-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        $('#oc-slider.owl-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('#oc-clients.owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    </script>

@php
$prices = DB::table('products')->select('discount_price')->pluck('discount_price')->toArray();

if(isset($prices) && $prices != Null) {

foreach ($prices as $g => $f)
{
  // use the key $g in the $priceprod array
  $prices[$g];
}

// get the highest price
$maxprice = max($prices);
$minprice = min($prices);

} else {
    $maxprice = 0;
    $minprice = 0;
}
@endphp

<div class="d-none" id="minprice">{{$minprice}}</div>
<div class="d-none" id="maxprice">{{$maxprice}}</div>


<script>
  var priceRangefrom = 0,
      priceRangeto = 0,
      $container = null;

  jQuery(window).on('load', function() {

      $container = $('#shop');

      $container.isotope({
          transitionDuration: '0.65s'
      });

      $('.grid-filter a').click(function() {
          $('.grid-filter li').removeClass('activeFilter');
          $(this).parent('li').addClass('activeFilter');
          var selector = $(this).attr('data-filter');
          $container.isotope({
              filter: selector
          });
          return false;
      });

      $(window).resize(function() {
          $container.isotope('layout');
      });

  });

  
  jQuery(document).ready(function($) {
        var minprice = $('#minprice').html();
        var maxprice = $('#maxprice').html();
      $(".range_23").ionRangeSlider({
          type: "double",
          min: minprice,
          max: maxprice,
          from: minprice,
          to: maxprice,
          prefix: 'EGP',
          hide_min_max: true,
          hide_from_to: false,
          grid: false,
          onStart: function(data) {
              priceRangefrom = data.from;
              priceRangeto = data.to;
          },
          onFinish: function(data) {
              priceRangefrom = data.from;
              priceRangeto = data.to;

              $container.isotope({
                  filter: function() {

                      if ($(this).find('.product-price').find('ins').length > 0) {
                          var price = $(this).find('.product-price ins').text();
                      } else {
                          var price = $(this).find('.product-price').text();
                      }

                      priceNum = price.split("EGP");

                      return (priceRangefrom <= priceNum[1] && priceRangeto >=
                          priceNum[1]);
                  }
              });

          }
      });

  });

  
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })

  // Start Product View with Modal 

  function productView(id) {
      // alert(id)
      $.ajax({
          type: 'GET',
          url: '/product/view/modal/' + id,
          dataType: 'json',
          success: function(data) {
              // console.log(data)
              $('#pname').text(data.product.product_name);
              $('#price').text(data.product.selling_price);
              $('#pcode').text(data.product.product_code);
              $('#pcategory').text(data.product.category.category_name);
              $('#pimage').attr('src', '/' + data.product.product_thambnail);

              $('#product_id').val(id);
              $('#qty').val(1);

              // Product Price 
              if (data.product.discount_price == null) {
                  $('#pprice').text('');
                  $('#oldprice').text('');
                  $('#pprice').text(data.product.selling_price);


              } else {
                  $('#pprice').text(data.product.discount_price);
                  $('#oldprice').text(data.product.selling_price);

              } // end prodcut price 

              // Start Stock opiton

              if (data.product.product_qty > 0) {
                  $('#aviable').text('');
                  $('#stockout').text('');
                  $('#aviable').text('aviable');

              } else {
                  $('#aviable').text('');
                  $('#stockout').text('');
                  $('#stockout').text('stockout');
              } // end Stock Option      


          }

      })


  }
  // Eend Product View with Modal 


  // Start Add To Cart Product 

  function addToCart() {
      var product_name = $('#pname').text();
      var id = $('#product_id').val();
      var quantity = $('#qty').val();

      $.ajax({
          type: "POST",
          dataType: 'json',
          data: {
              quantity: quantity,
              product_name: product_name
          },
          url: "/cart/data/store/" + id,
          success: function(data) {

              miniCart()
              $('#closeModel').click();
              // console.log(data)

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

              } else {
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

  function miniCart() {
      $.ajax({
          type: 'GET',
          url: '/product/mini/cart',
          dataType: 'json',
          success: function(response) {

              $('span[id="cartSubTotal"]').text(response.cartTotal);
              $('#cartQty').text(response.cartQty);
              var miniCart = ""

              $.each(response.carts, function(key, value) {
                  miniCart += `<div class="cart-item product-summary">
    <div class="row">
      <div class="col-xs-4">
        <div class="image"> <a href="detail.html"><img width="50" height="50" src="/${value.options.image}" alt=""></a> </div>
      </div>
      <div class="col-xs-7">
        <h3 class="name mr-3"><a href="index.php?page-detail">${value.name}</a></h3>
        <div class="price"> ${value.price} * ${value.qty} </div>
      </div>
      <div class="col-xs-1 action"> 
      <button class="btn btn-danger mr-3" type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
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
  function miniCartRemove(rowId) {
      $.ajax({
          type: 'GET',
          url: '/minicart/product-remove/' + rowId,
          dataType: 'json',
          success: function(data) {
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

              } else {
                  Toast.fire({
                      type: 'error',
                      title: data.error
                  })

              }

              // End Message 

          }
      });

  }

  //  end mini cart remove
  
  // Start Add Wishlist Page 

function addToWishList(product_id) {
  $.ajax({
      type: "POST",
      dataType: 'json',
      url: "/add-to-wishlist/" + product_id,

      success: function(data) {

          // Start Message 
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',

              showConfirmButton: false,
              timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
              Toast.fire({
                  type: 'success',
                  icon: 'success',
                  title: data.success
              })

          } else {
              Toast.fire({
                  type: 'error',
                  icon: 'error',
                  title: data.error
              })

          }

          // End Message 


      }

  })

}

/// End Add Wishlist Page  ////   -->

/// Load Wishlist Data  -->

  function wishlist() {
      $.ajax({
          type: 'GET',
          url: '/user/get-wishlist-product',
          dataType: 'json',
          success: function(response) {

              var rows = ""
              $.each(response, function(key, value) {
                  rows += `<tr>
          <td class="col-md-2"><img src="/${value.product.product_thambnail} " alt="imga"></td>
          <td class="col-md-7">
              <div class="product-name"><a href="#">${value.product.product_name}</a></div>
               
              <div class="price">
              ${value.product.discount_price == null
                  ? `${value.product.selling_price}`
                  :
                  `${value.product.discount_price} <span>${value.product.selling_price}</span>`
              }

                  
              </div>
          </td>
<td class="col-md-2">
  <button class="btn btn-primary icon" type="button" title="{{ trans('site/body.add-to-cart') }}" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> {{ trans('site/body.add-to-cart') }} </button>
</td>
<td class="col-md-1 close-btn">
  <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
</td>
      </tr>`
              });

              $('#wishlist').html(rows);
          }
      })

  }
  wishlist();



  ///  Wishlist remove Start 
  function wishlistRemove(id) {
      $.ajax({
          type: 'GET',
          url: '/user/wishlist-remove/' + id,
          dataType: 'json',
          success: function(data) {
              wishlist();

              // Start Message 
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
              })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                  })

              } else {
                  Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                  })

              }

              // End Message 

          }
      });

  }

  // End Wishlist remove   

/// End Load Wisch list Data  -->

  function cart() {
      $.ajax({
          type: 'GET',
          url: '/user/get-cart-product',
          dataType: 'json',
          success: function(response) {

              var rows = ""
              $.each(response.carts, function(key, value) {
                  rows += `<tr>
  <td class="col-md-2"><img src="/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
  
  <td class="col-md-2">
      <div class="product-name"><a href="#">${value.name}</a></div>
       
      <div class="price"> 
                      ${value.price}
                  </div>
              </td>

     <td class="col-md-2">

     ${value.qty > 1

      ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `

      : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
      }
  

  <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  

   <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>    
   
      </td>

       <td class="col-md-2">
      <strong>$${value.subtotal} </strong> 
      </td>

   
  <td class="col-md-1 close-btn">
      <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
  </td>
          </tr>`
              });

              $('#cartPage').html(rows);
          }
      })

  }
  cart();



  ///  Cart remove Start 
  function cartRemove(id) {
      $.ajax({
          type: 'GET',
          url: '/user/cart-remove/' + id,
          dataType: 'json',
          success: function(data) {
              couponCalculation();
              cart();
              miniCart();
              $('#couponField').show();
              $('#coupon_name').val('');

              // Start Message 
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
              })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                  })

              } else {
                  Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                  })

              }

              // End Message 

          }
      });

  }

  // End Cart remove   


  // -------- CART INCREMENT --------//

  function cartIncrement(rowId) {
      $.ajax({
          type: 'GET',
          url: "/cart-increment/" + rowId,
          dataType: 'json',
          success: function(data) {
              couponCalculation();
              cart();
              miniCart();
          }
      });
  }


  // ---------- END CART INCREMENT -----///



  // -------- CART Decrement  --------//

  function cartDecrement(rowId) {
      $.ajax({
          type: 'GET',
          url: "/cart-decrement/" + rowId,
          dataType: 'json',
          success: function(data) {
              couponCalculation();
              cart();
              miniCart();
          }
      });
  }


  // ---------- END CART Decrement -----///
</script>

<!-- //End Load My cart / -->

<!--  //////////////// =========== Coupon Apply Start ================= ////  -->
<script type="text/javascript">
  function applyCoupon() {
      var coupon_name = $('#coupon_name').val();
      $.ajax({
          type: 'POST',
          dataType: 'json',
          data: {
              coupon_name: coupon_name
          },
          url: "{{ url('/coupon-apply') }}",
          success: function(data) {
              couponCalculation();
              if (data.validity == true) {
                  $('#couponField').hide();
              }

              // Start Message 
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
              })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                  })

              } else {
                  Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                  })

              }

              // End Message 

          }

      })
  }


  function couponCalculation() {
      $.ajax({
          type: 'GET',
          url: "{{ url('/coupon-calculation') }}",
          dataType: 'json',
          success: function(data) {
              if (data.total) {
                  $('#couponCalField').html(
                      `<tr>
          <th>
              <div class="cart-sub-total">
                  Subtotal<span class="inner-left-md">$ ${data.total}</span>
              </div>
              <div class="cart-grand-total">
                  Grand Total<span class="inner-left-md">$ ${data.total}</span>
              </div>
          </th>
      </tr>`
                  )

              } else {

                  $('#couponCalField').html(
                      `<tr>
  <th>
      <div class="cart-sub-total">
          المجموع الفرعي<span class="inner-left-md">$ ${data.subtotal}</span>
      </div>
      <div class="cart-sub-total">
          الكوبون<span class="inner-left-md">$ ${data.coupon_name}</span>
          <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
      </div>

       <div class="cart-sub-total">
          قيمة الخصم<span class="inner-left-md">$ ${data.discount_amount}</span>
      </div>


      <div class="cart-grand-total">
          المجموع الكلي<span class="inner-left-md">$ ${data.total_amount}</span>
      </div>
  </th>
      </tr>`
                  )

              }
          }

      });
  }
  couponCalculation();
</script>

<!--  //////////////// =========== End Coupon Apply Start ================= ////  -->


<!--  //////////////// =========== Start Coupon Remove================= ////  -->

<script type="text/javascript">
  function couponRemove() {
      $.ajax({
          type: 'GET',
          url: "{{ url('/coupon-remove') }}",
          dataType: 'json',
          success: function(data) {
              couponCalculation();
              $('#couponField').show();
              $('#coupon_name').val('');


              // Start Message 
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
              })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                  })

              } else {
                  Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                  })

              }

              // End Message 

          }
      });

  }

  // end coupon

$('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});

</script>

    @yield('js')

</body>

</html>
