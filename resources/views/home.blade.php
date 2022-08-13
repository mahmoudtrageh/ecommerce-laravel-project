@extends('layouts.master_home')
@php
$settings = DB::table('settings')->first();
@endphp
@section('title')
    {{ $settings->site_name }} | {{ trans('site/layout.home') }}
@endsection
@section('home_content')
    <!-- Content
      ============================================= -->

  <!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<!-- Shop Categories
					============================================= -->
					
					<div class="row shop-categories clearfix">
                        @foreach ($categories as $category)
                            <div class="col-lg-4">
                                <a href="{{route('shop.view',$category->id)}}" style="background: url('demos/shop/images/categories/2-1.jpg') no-repeat right center; background-size: cover;">
                                    <div class="vertical-middle dark center">
                                        <div class="heading-block m-0 border-0">
                                            <h3 class="nott font-weight-semibold ls0">{{ $category->category_name }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
					</div>

                    @foreach ($categories as $category)
                    
					<!-- shoes
					============================================= -->
					<div class="fancy-title title-border mt-4 title-center product-slider">
						<h4>{{$category->category_name}}</h4>
						<a class="show-all" href="{{route('shop.view',$category->id)}}">أظهر الكل <i class="icon-line-chevrons-left"></i></a>
					</div>

					<div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true" data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
                        @php
                        $products = App\Models\Product::where('category_id', $category->id)->latest()->get();
                        @endphp
                        @foreach($products as $product)
                            <!-- Shop Item 1
                            ============================================= -->
                            <div class="oc-item">
                                <div class="product">
                                    <div class="product-image">
                                        <a href="#"><img src="{{ asset($product->product_thambnail) }}" alt="Round Neck T-shirts"></a>
                                        <a href="#"><img src="{{ asset($product->product_thambnail) }}" alt="Round Neck T-shirts"></a>
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount / $product->selling_price) * 100;
                                        @endphp

                                        @if ($discount >= 0)
                                            <div class="sale-flash badge badge-danger p-2">{{ trans('site/body.discount') }} {{ round($discount) }} %</div>
                                        @endif

                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between"
                                            data-hover-animate="fadeIn" data-hover-speed="400">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                id="{{ $product->id }}" onclick="productView(this.id)"
                                                class="btn btn-dark mr-2"><i
                                                    class="fa-solid fa-cart-shopping"></i></a>
                                            <a href="#" id="{{ $product->id }}" onclick="addToWishList(this.id)"
                                                class="btn btn-dark"><i class="fa-solid fa-heart"></i></a>
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title mb-1"><h3><a href="{{ route('product.details', [$product->id, $product->product_slug]) }}">{{ $product->product_name }}</a></h3></div>
                                        <div class="product-price font-primary"><del class="mr-1"> EGP {{ $product->selling_price }}</del> <ins>EGP {{ $product->discount_price }}</ins></div>
                                        @php
                                                $reviewcount = App\Models\Review::where('product_id', $product->id)
                                                    ->where('status', 1)
                                                    ->latest()
                                                    ->get();
                                                
                                                $avarage = App\Models\Review::where('product_id', $product->id)
                                                    ->where('status', 1)
                                                    ->avg('rating');
                                                
                                            @endphp
                                            <div class="rating-reviews">

                                                @if ($avarage == 0)
                                                @elseif($avarage == 1 || $avarage < 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 3 || $avarage < 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 4 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 5 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                @endif

                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{ count($reviewcount) }}
                                                        {{ trans('site/body.reviews') }})</a>
                                                </div>
                                            </div><!-- /.rating-reviews -->
                                    </div>
                                </div>
                            </div>
                        @endforeach		

					</div>

                    @endforeach

				</div>

				<div class="clear"></div>				
			</div>
		</section><!-- #content end -->
@endsection
