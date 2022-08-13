@extends('layouts.master_home')
@section('home_content')

@section('title')
    {{ trans('site/layout.wishlist') }}
@endsection

<!-- Page Title
============================================= -->
<section id="page-title" style="background-color: #752651;">

    <div class="container clearfix">
        <h1 class="text-white">{{ trans('site/layout.wishlist') }}</h1>
        <ol class="breadcrumb">

        </ol>
    </div>

</section><!-- #page-title end -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">{{ trans('site/layout.wishlist') }}</th>
                                </tr>
                            </thead>
                            <tbody id="wishlist">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

        <br>
    </div>

@endsection
