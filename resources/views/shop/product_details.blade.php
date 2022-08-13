@extends('layouts.master_home')
@section('title')
    {{ $product->product_name }}
@endsection
<style>
    .flex-control-nav.flex-control-thumbs {
        opacity: 100% !important;
        right: 0 !important;
        top: unset !important;
        bottom: 0 !important;
    }
    .header-misc-icon, .header-icon{
        top: 14px;
    }
</style>
@section('home_content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title" style="background-color: #752651;">

        <div class="container clearfix">
            <h1 class="text-white">{{ $product->product_name }}</h1>
            <ol class="breadcrumb">

            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="single-product">
                    <div class="product">
                        <div class="row gutter-40">

                            <div class="col-md-6">

                                <!-- Product Single - Gallery
                                 ============================================= -->
                                <div class="product-image" dir="ltr">
                                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                        <div class="flexslider">
                                            <div class="slider-wrap" data-lightbox="gallery">
                                                @foreach ($multiImag as $img)
                                                    <div class="slide"
                                                        data-thumb="{{ asset($img->photo_name) }}"><a
                                                            href="{{ asset($img->photo_name) }}"
                                                            title="Pink Printed Dress - Front View"
                                                            data-lightbox="gallery-item"><img
                                                                src="{{ asset($img->photo_name) }}"
                                                                alt="Pink Printed Dress"></a></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp
                                    <div class="sale-flash badge badge-danger p-2">
                                        @if ($discount >= 0)
                                            % {{ trans('site/body.discount') }} {{ round($discount) }}
                                        @endif
                                    </div>
                                </div><!-- Product Single - Gallery End -->

                            </div>

                            <div class="col-md-6">

                                <div class="">

                                    <h1 class="name" id="pname">
                                        {{ $product->product_name }}
                                    </h1>

                                    @php
                                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->latest()
                                            ->get();
                                        
                                        $avarage = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->avg('rating');
                                        
                                    @endphp

                                    <div class="rating-reviews my-4">
                                        <div class="row">
                                            <div class="col-sm-3">

                                                @if ($avarage == 0)
                                                    {{ trans('site/body.no-reviews') }}
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


                                            </div>

                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{ count($reviewcount) }}
                                                        {{ trans('site/body.reviews') }})</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <!-- Product Single - Price
                                  ============================================= -->
                                    <div class="product-price">
                                        @if ($product->discount_price == null)
                                            <ins>${{ $product->selling_price }}
                                            @else
                                                <span
                                                    class="price">${{ $product->discount_price }}</span></ins><del>${{ $product->selling_price }}</del>
                                        @endif
                                    </div><!-- Product Single - Price End -->

                                    <!-- Product Single - Rating
                                  ============================================= -->
                                    <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                        <i class="icon-star-empty"></i>
                                    </div><!-- Product Single - Rating End -->

                                </div>

                                <div class="line"></div>

                                <!-- Product Single - Quantity & Cart Button
                                 ============================================= -->
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input name="qty" type="number" step="1" min="1" id="qty" value="1"
                                        class="qty" />
                                    <input type="button" value="+" class="plus">
                                </div>
                                <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

                                <button type="submit" data-toggle="tooltip" data-placement="right" title="{{ trans('site/layout.cart') }}"
                                    onclick="addToCart()" class="btn btn-primary"><i
                                        class="fa fa-shopping-cart inner-right-vs"></i>{{ trans('site/body.add-to-cart') }}</button>

                                <a class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="{{ trans('site/layout.wishlist') }}"
                                    href="#" id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <div class="line"></div>

                                <!-- Product Single - Short Description
                                 ============================================= -->
                                <p>{{ $product->short_desc }}</p>

                                <!-- Product Single - Meta
                                 ============================================= -->
                                <div class="card product-meta">
                                    <div class="card-body">
                                        <span class="posted_in">{{ trans('site/body.category') }} : <a href="#"
                                                rel="tag">{{ $product->category->category_name }}</a>.</span>
                                    </div>
                                </div><!-- Product Single - Meta End -->

                                <!-- Product Single - Share
                                 ============================================= -->
                                <div class="si-share border-0 d-flex justify-content-between align-items-center mt-4">
                                    <span>{{ trans('site/body.share-product') }} :</span>
                                    <div class="addthis_inline_share_toolbox_8tvu"></div>
                                </div><!-- Product Single - Share End -->

                            </div>

                            <div class="w-100"></div>

                            <div class="col-12 mt-5">

                                <div class="tabs clearfix mb-0" id="tab-1">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span
                                                    class="d-none d-md-inline-block"> {{ trans('site/body.description') }}</span></a></li>
                                        <li><a href="#tabs-3"><i class="icon-star3"></i><span
                                                    class="d-none d-md-inline-block"> {{ trans('site/body.reviews') }}</span></a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tabs-1">
                                            <p>{!! $product->long_desc !!}</p>
                                        </div>

                                        <div class="tab-content clearfix" id="tabs-3">

                                            <div id="reviews" class="clearfix">

                                                <div class="product-reviews">
                                                    <h4 class="title">{{ trans('site/body.customer-reviews') }}</h4>

                                                    @php
                                                        $reviews = App\Models\Review::where('product_id', $product->id)
                                                            ->latest()
                                                            ->limit(5)
                                                            ->get();
                                                    @endphp

                                                    <div class="reviews">

                                                        @foreach ($reviews as $item)
                                                            @if ($item->status == 0)
                                                            @else
                                                                <div class="review">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <img style="border-radius: 50%"
                                                                                src="{{ !empty($item->user->profile_photo_path)? url('upload/user_images/' . $item->user->profile_photo_path): url('upload/no_image.jpg') }}"
                                                                                width="40px;" height="40px;"><b>
                                                                                {{ $item->user->name }}</b>


                                                                            @if ($item->rating == null)
                                                                            @elseif($item->rating == 1)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            @elseif($item->rating == 2)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            @elseif($item->rating == 3)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            @elseif($item->rating == 4)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            @elseif($item->rating == 5)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                            @endif

                                                                        </div>

                                                                        <div class="col-md-6">

                                                                        </div>
                                                                    </div> <!-- // end row -->

                                                                    <div class="review-title"><span
                                                                            class="summary">{{ $item->summary }}</span><span
                                                                            class="date"><i
                                                                                class="fa fa-calendar"></i><span>
                                                                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                                            </span></span></div>
                                                                    <div class="text">"{{ $item->comment }}"
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div><!-- /.reviews -->


                                                </div><!-- /.product-reviews -->
                                                <div class="product-add-review">
                                                    <h4 class="title">{{ trans('site/body.write-your-review') }}
                                                    </h4>
                                                    <div class="review-table">

                                                    </div><!-- /.review-table -->

                                                    <div class="review-form">
                                                        @guest
                                                            <p> <b> {{ trans('site/body.login-to-review') }} <a
                                                                        href="#">{{ trans('site/layout.login') }}</a>
                                                                </b> </p>
                                                        @else
                                                            <div class="form-container">

                                                                <form role="form" class="cnt-form" method="post"
                                                                    action="{{ route('review.store') }}">
                                                                    @csrf

                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">

                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="cell-label">&nbsp;</th>
                                                                                <th>1 {{ trans('site/body.star') }}</th>
                                                                                <th>2 {{ trans('site/body.star') }}</th>
                                                                                <th>3 {{ trans('site/body.star') }}</th>
                                                                                <th>4 {{ trans('site/body.star') }}</th>
                                                                                <th>5 {{ trans('site/body.star') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="cell-label">
                                                                                    {{ trans('site.quality') }}</td>
                                                                                <td><input type="radio" name="quality"
                                                                                        class="radio" value="1"></td>
                                                                                <td><input type="radio" name="quality"
                                                                                        class="radio" value="2"></td>
                                                                                <td><input type="radio" name="quality"
                                                                                        class="radio" value="3"></td>
                                                                                <td><input type="radio" name="quality"
                                                                                        class="radio" value="4"></td>
                                                                                <td><input type="radio" name="quality"
                                                                                        class="radio" value="5"></td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputSummary">{{ trans('site/body.summary') }}
                                                                                    <span
                                                                                        class="astk">*</span></label>
                                                                                <input type="text" name="summary"
                                                                                    class="form-control txt"
                                                                                    id="exampleInputSummary" placeholder="">
                                                                            </div><!-- /.form-group -->
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputReview">{{ trans('site/body.review') }}
                                                                                    <span
                                                                                        class="astk">*</span></label>
                                                                                <textarea class="form-control txt txt-review"
                                                                                    name="comment" id="exampleInputReview"
                                                                                    rows="4" placeholder=""></textarea>
                                                                            </div><!-- /.form-group -->
                                                                        </div>
                                                                    </div><!-- /.row -->

                                                                    <div class="action text-right">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-upper">{{ trans('site/body.send-review') }}</button>
                                                                    </div><!-- /.action -->

                                                                </form><!-- /.cnt-form -->
                                                            </div><!-- /.form-container -->

                                                        @endguest

                                                    </div><!-- /.review-form -->

                                                </div><!-- /.product-add-review -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="line"></div>

                <div class="w-100">

                    <h4>{{ trans('site/body.related-products') }}</h4>

                    <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
                        data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                        @foreach ($relatedProduct as $related_product)
                            @php
                                $amount = $related_product->selling_price - $related_product->discount_price;
                                $discount = ($amount / $related_product->selling_price) * 100;
                            @endphp
                            <div class="oc-item">
                                <div class="product">
                                    <div class="product-image">
                                        <a href="#"><img src="{{ asset($related_product->product_thambnail) }}"
                                                alt="Checked Short Dress"></a>
                                                @if ($discount >= 0)
                                        <div class="badge badge-success p-2">
                                        
                                            {{ trans('site/body.discount') }} {{ round($discount) }} %

                                        </div>
                                        @endif
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between"
                                                data-hover-animate="fadeIn" data-hover-speed="400">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                    id="{{ $related_product->id }}" onclick="productView(this.id)"
                                                    class="btn btn-dark mr-2"><i
                                                        class="fa-solid fa-cart-shopping"></i></a>
                                                <a href="#" id="{{ $related_product->id }}"
                                                    onclick="addToWishList(this.id)" class="btn btn-dark"><i
                                                        class="fa-solid fa-heart"></i></a>
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div class="product-title">
                                            <h3><a href="#">{{ $related_product->product_name }}</a></h3>
                                        </div>
                                        <div class="product-price">
                                            @if ($related_product->discount_price == null)
                                                <ins>${{ $related_product->selling_price }}
                                                @else
                                                    <span
                                                        class="price">${{ $related_product->discount_price }}</span></ins><del>${{ $related_product->selling_price }}</del>
                                            @endif
                                        </div>
                                        @php
                                            $reviewcount = App\Models\Review::where('product_id', $related_product->id)
                                                ->where('status', 1)
                                                ->latest()
                                                ->get();
                                            
                                            $avarage = App\Models\Review::where('product_id', $related_product->id)
                                                ->where('status', 1)
                                                ->avg('rating');
                                            
                                        @endphp
                                        <div class="product-rating">
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
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </section><!-- #content end -->
@endsection
