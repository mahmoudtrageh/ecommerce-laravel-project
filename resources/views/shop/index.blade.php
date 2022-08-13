@extends('layouts.master_home')
@section('title')
    {{ trans('site/body.store') }}
@endsection
@section('home_content')
    <!-- Page Title
                                      ============================================= -->
    <section id="page-title" style="background-color: #752651;">

        <div class="container clearfix">
            <h1 class="text-white">{{ trans('site/body.store') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white"
                        href="#">{{ trans('site/body.store') }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{$category->category_name}}</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
                                  ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row">

                    <div class="col-lg-3">

                        <div class="ml-auto mb-5 mb-md-5">
                            <input class="range_23" />
                        </div>

                    </div>

                    <div class="col-lg-9">
                        <!-- Shop
                                                ============================================= -->
                        <div id="shop" class="shop row grid-container gutter-30" data-layout="fitRows">

                            @foreach ($products as $product)
                                <div class="product col-lg-3 col-md-4 col-sm-6 col-12 {{ $product->category->category_slug }}">
                                    <div class="grid-inner">
                                        <div class="product-image">
                                            <a href="#"><img src="{{ asset($product->product_thambnail) }}"
                                                    alt="Checked Short Dress"></a>

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
                                            @if ($discount >= 0)
                                                <div class="sale-flash badge badge-secondary p-2">

                                                    {{ trans('site/body.discount') }} {{ round($discount) }} %

                                                </div>
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
                                            <div class="product-title">
                                                <h3><a
                                                        href="{{ route('product.details', [$product->id, $product->product_slug]) }}">{{ $product->product_name }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-price"><del> EGP {{ $product->selling_price }}</del>
                                                <ins> EGP {{ $product->discount_price }}</ins>
                                            </div>

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

                        </div><!-- #shop end -->
                    </div>

                </div>
            </div>
        </div>
    </section><!-- #content end -->

@endsection
