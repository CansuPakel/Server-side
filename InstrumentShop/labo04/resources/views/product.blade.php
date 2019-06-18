@extends('master')
@section('main')
    <!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Shop Grid</h2>
                    <nav class="bradcaump-content">
                        <a class="breadcrumb_item" href="index.html">Home</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb_item active">Shop Grid</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Product Categories</h3>
                        <ul>
                            <li><a href="#">Biography <span>(3)</span></a></li>
                            <li><a href="#">Business <span>(4)</span></a></li>
                            <li><a href="#">Cookbooks <span>(6)</span></a></li>
                            <li><a href="#">Health & Fitness <span>(7)</span></a></li>
                            <li><a href="#">History <span>(8)</span></a></li>
                            <li><a href="#">Mystery <span>(9)</span></a></li>
                            <li><a href="#">Inspiration <span>(13)</span></a></li>
                            <li><a href="#">Romance <span>(20)</span></a></li>
                            <li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
                            <li><a href="#">Self-Improvement <span>(13)</span></a></li>
                            <li><a href="#">Humor Books <span>(17)</span></a></li>
                            <li><a href="#">Harry Potter <span>(20)</span></a></li>
                            <li><a href="#">Land of Stories <span>(34)</span></a></li>
                            <li><a href="#">Kids' Music <span>(60)</span></a></li>
                            <li><a href="#">Toys & Games <span>(3)</span></a></li>
                            <li><a href="#">hoodies <span>(3)</span></a></li>
                        </ul>
                    </aside>
                    <aside class="wedget__categories pro--range">
                        <h3 class="wedget__title">Filter by price</h3>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Price :</span><input type="text" id="amount" readonly="">
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                    <aside class="wedget__categories poroduct--tag">
                        <h3 class="wedget__title">Product Tags</h3>
                        <ul>
                            <li><a href="#">Biography</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Cookbooks</a></li>
                            <li><a href="#">Health & Fitness</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Mystery</a></li>
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">Religion</a></li>
                            <li><a href="#">Fiction</a></li>
                            <li><a href="#">Fantasy</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Toys</a></li>
                            <li><a href="#">Hoodies</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                            <div class="shop__list nav justify-content-center" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
                            </div>
                            <p>{{count($products[0]->products)}} results</p>
                            <div class="orderby__wrapper">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab__container">
                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                        @if(Session::has('succes'))
                            <div  class="alert alert-success" role="succes">
                                {{ Session::get('succes') }}
                                @php
                                    Session::forget('succes');
                                @endphp
                            </div>
                        @endif
                        <div class="row">
                        @if(count($products[0]->products) != 0)
                        @foreach($products as $p )
                            @foreach($p->products as $product)

                            <!-- Start Single Product -->
                            <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="product__thumb">

                                    <a class="first__img" href="{{url('/products/'.$p->name.'/'.$product->id)}}"> @if(count($product->image) != 0)<img src="{{asset('storage/images/'.$product->image[0]->path)}}" alt="product image"> @endif</a>
                                    <a class="second__img animation1" href="{{url('/products/'.$p->name.'/'.$product->id)}}">@if(isset($product->image[1]))<img src="{{asset('storage/images/'.$product->image[1]->path)}}" alt="product image">@endif</a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center content--center">
                                    <h4><a href="single-product.html">{{$product->name}}</a></h4>
                                    <ul class="prize d-flex">
                                        <li>{{$product->price}}</li>
                                    </ul>

                                    <div class="action">
                                        <div class="actions_inner">
                                            @if(Auth::user())
                                                @if(Auth::user()->role=='admin')
                                                    <ul>
                                                        <li><a href="{{url('/products/'.$p->name.'/'.$product->id.'/edit')}}"><i>edit</i></a></li>
                                                        <li><a  onclick="return confirm('Are you sure to delete this instrument?')"  href={{url('/delete/'.$product->id) }} ><i>remove</i></a></li>
                                                    </ul>
                                                @else
                                                    <ul class="add_to_links">
                                                        <li><a class="wishlist" href={{url('/addToCart/'.$product->id) }}><i class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                    </ul>
                                                @endif
                                            @endif

                                                @if(!Auth::user())
                                                    <ul class="add_to_links">
                                                        <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
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
                            <!-- End Single Product -->
                            @endforeach
                            @endforeach
                            @else
                            <p > Geen {{$products[0]->name}} beschikbaar</p>
                            @endif


                        </div>
                    </div>
                    <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                        <div class="list__view__wrapper">
                            <!-- Start Single Product -->
                            @if(count($products[0]->products) != 0)

                            @foreach($products as $p )
                                @foreach($p->products as $product)
                            <div class="list__view">
                                <div class="thumb">
                                    <a class="first__img" href="{{url('/products/'.$p->name.'/'.$product->id)}}"> @if(count($product->image) != 0)<img src="{{asset('images/books/'.$product->image[0]->path)}}" alt="product image"> @endif</a>
                                    <a class="second__img animation1" href="{{url('/products/'.$p->name.'/'.$product->id)}}">@if(isset($product->image[1]))<img src="{{asset('images/books/'.$product->image[1]->path)}}" alt="product image">@endif</a>
                                </div>
                                <div class="content">
                                    <h2><a href="single-product.html">{{$product->name}}</a></h2>
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <ul class="prize__box">
                                        <li>{{$product->price}}</li>
                                    </ul>
                                    <p>{{$product->description}}</p>
                                    <ul class="cart__action d-flex">
                                        <li class="cart"><a href={{url('/addToCart/'.$product->id) }}>Add to cart</a></li>
                                        <li class="wishlist"><a href="cart.html"></a></li>
                                        <li class="compare"><a href="cart.html"></a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- End Single Product -->
                            @endforeach
                            @endforeach
                            @else
                                <p > Geen {{$products[0]->name}} beschikbaar</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection