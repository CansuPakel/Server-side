@extends('master')
@section('main')
    <!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
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
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Shopping Cart</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Shopping Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">


                    <div class="table-content wnro__table table-responsive">
                            <table>
                                @if(session('cart'))
                                    <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(session('cart') as $id => $prod)
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="{{asset('storage/images/'.$prod['image'][0]->path)}}" alt="product img"></a></td>
                                        <td class="product-name" name="name" ><a href="#">{{$prod['name']}}</a></td>
                                        <td class="product-price" name="price" id="price" ><span class="amount"> {{$prod['price']}}  </span></td>
                                        <td class="product-price" name="quantity" id="quantity" ><span class="amount"> {{$prod['quantity']}}  </span></td>
                                        <td class="product-remove"><a href={{url("/deleteFromCart/".$prod['id'])}}>X</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <script>window.location = "/";</script>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                            <li><a href="#">Coupon Code</a></li>
                            <li><a href="#">Apply Code</a></li>
                            <li><a href="#" >Update Cart</a></li>
                            <li><a href="{{url('/checkout')}}"  >Check Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">

                        <div class="cart__total__amount">
                            <span>Grand Total</span>
                            <span>{{(session('total'))}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@endsection