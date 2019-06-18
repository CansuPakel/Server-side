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
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Checkout Area -->
    <section class="wn__checkout__area section-padding--lg bg__white">
        <div class="container">
            <!--    {{--  <div class="col-lg-12">
              <div class="wn_checkout_wrap">
                  <div class="checkout_info">
                      <span>Returning customer ?</span>
                      <a class="showlogin" href="#">Click here to login</a>
                  </div>
                  <div class="checkout_login">

               @if ($errors->any())
                          <div class="alert alert-danger">
                              <strong>Whoops! Something went wrong!</strong>

                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <form  method="POST" action="{{ route('login') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                      <label class="form-check-label" for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Login') }}
                                  </button>

                                  @if (Route::has('password.request'))
                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                          {{ __('Forgot Your Password?') }}
                                      </a>
                                  @endif
                              </div>
                          </div>

                      </form>
                  </div>

              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-6 col-12">
              <div class="customer_details">
                  <h3>Billing details</h3>
                  <div class="customar__field">
                      <form method="POST" action="{{ route('register') }}">
                          @csrf
                          <div class="margin_between">
                              <div class="input_box space_between">
                                  <label  for="firstname"> First name <span>*</span></label>
                                  <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                  @error('firstname')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              </div>
                              <div class="input_box space_between">
                                  <label for="lastname"> Last name <span>*</span></label>
                                  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                  @error('lastname')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="radio" >
                              <label for="gender">Gender <span style="color:red">*</span></label>
                              <input  class="@error('gender') is-invalid @enderror" required id="female" type="radio" name="gender" value="female" {{ (old('gender') == 'female') ? 'checked' : '' }} >Female
                              <input class="@error('gender') is-invalid @enderror" required id="male" type="radio" name="gender" value="male" {{ (old('gender') == 'male') ? 'checked' : '' }} >Male
                              @error('gender')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="input_box">
                              <label for="address">Address <span>*</span></label>
                              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                              @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="input_box">
                              <label for="zipcode">Postcode / ZIP <span>*</span></label>
                              <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required autocomplete="zipcode" autofocus>
                              @error('zipcode')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="margin_between">
                              <div class="input_box space_between">
                                  <label  for="phonenumber">Phone <span>*</span></label>
                                  <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>

                                  @error('phonenumber')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                                  @enderror
                              </div>

                              <div class="input_box space_between">
                                  <label for="email" >Email address <span>*</span></label>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                               </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="margin_between">

                              <div class="input_box space_between">
                                  <label for="password" >Password <span>*</span></label>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                                  @enderror
                              </div>
                              <div class="input_box space_between">
                                  <label for="password-confirm" >Confirm password <span>*</span></label>

                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                               </div>
                          </div>

                          <button type="submit" class="btn btn-primary">
                              {{ __('Register') }}
                          </button>
                      </form>
              </div>
              </div>
          </div>

             --}}
                    -->
                <form action="{{url('/placeOrder')}}" method="POST">
                    @csrf
                  <div class="col-lg-12 col-12 md-mt-40 sm-mt-40">
                      <div class="wn__order__box">
                          <h3 class="onder__title">Your order</h3>
                          @if(session('cart'))

                          <ul class="order__total">
                              <li>Product</li>
                              <li>Total</li>
                          </ul>
                          <ul class="order_product">
                              @foreach(session('cart') as $id => $prod)
                              <li>{{$prod['name']}} × {{$prod['quantity']}}<span>{{$prod['price']*$prod['quantity']}}</span></li>
                              @endforeach

                          </ul>
                          @endif
                          <ul class="total__amount">
                              <li>Order Total <span>{{session('total')}}</span></li>
                          </ul>
                          <ul class="total__amount">
                              <li>Choose pay <span>
                                    <select name="kind">
                                        <option value="direct bank transfer">direct bank transfer</option>
                                        <option value="paypal">paypal</option>
                                        <option value="credit cart">credit cart</option>
                                    </select>
                                  </span>
                              </li>
                          </ul>
                      </div>
                  </div>
                    <button type="submit" style="float: right;margin:1rem;" class="btn btn-primary">
                        Check out
                    </button>
                </form>
  </div>
</section>
<!-- End Checkout Area -->

@endsection