@extends('master')
@section('main')

<!-- Start Search Popup -->
<div class="brown--color box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="Search entire store here...">
            <div class="action">
                <a href="#"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>
<!-- End Search Popup -->
<!-- Start Slider area -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>Buy <span>your </span></h2>
                            <h2><span>instrument </span></h2>
                            <h2>from <span>Here </span></h2>
                            <a class="shopbtn" href="{{url('/products/guitars')}}">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>favourite <span>Book </span></h2>
                            <h2>from <span>Here </span></h2>
                            <a class="shopbtn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
</div>
<!-- End Slider area -->


<!-- Start BEst Seller Area -->
<section class="wn__product__area brown--color pt--80  pb--30">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="section__title text-center">
                    @if(Session::has('succes'))
                        <div  class="alert alert-success" role="succes">
                            {{ Session::get('succes') }}
                            @php
                                Session::forget('succes');
                            @endphp
                        </div>
                    @endif
                    <h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
            <!-- Start Single Product -->

            @isset($categories)
                @foreach($categories as $category )
                    @foreach($category->products as $prod)

            <div class="product product__style--3">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product__thumb">
                        <a class="first__img" href="{{url('/products/'.$category->name.'/'.$prod->id)}}"> @if(count($prod->image) != 0)<img src="{{asset('storage/images/'.$prod->image[0]->path)}}" alt="product image"> @endif</a>
                        <a class="second__img animation1" href="{{url('/products/'.$category->name.'/'.$prod->id)}}">@if(isset($prod->image[1]))<img src="{{asset('storage/images/'.$prod->image[1]->path)}}" alt="product image">@endif</a>

                        <div class="hot__box">
                            <span class="hot-label">BEST SALLER</span>
                        </div>
                    </div>
                    <div class="product__content content--center">
                        <h4><a href="single-product.html">{{$prod->name}}</a></h4>
                        <ul class="prize d-flex">

                            <li>{{$prod->price}}</li>
                        </ul>

                        <div class="action">
                            <div class="actions_inner">
                                @if(Auth::user())
                                    @if(Auth::user()->role=='admin')
                                        <ul>
                                            <li><a href="{{url('/products/'.$category->name.'/'.$prod->id.'/edit')}}"><i>edit</i></a></li>
                                            <li><a  onclick="return confirm('Are you sure to delete this instrument?')"  href={{url('/delete/'.$prod->id) }} ><i>remove</i></a></li>
                                        </ul>
                                    @else
                                        <ul class="add_to_links">
                                            <li><a class="wishlist" href={{url('/addToCart/'.$prod->id) }}><i class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                        </ul>
                                    @endif
                                @endif

                                @if(!Auth::user())
                                        <ul class="add_to_links">
                                            <li><a class="wishlist" href={{url('/addToCart/'.$prod->id) }}><i class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                        </ul>
                                @endif



                            </div>
                        </div>
                        <div class="product__hover--content">
                            <ul class="rating d-flex">
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
                @endforeach
            @endisset
        </div>
        <!-- End Single Tab Content -->
    </div>
</section>
<!-- Start BEst Seller Area -->
</div>

@endsection
