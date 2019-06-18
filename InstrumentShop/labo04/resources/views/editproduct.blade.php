@extends('master')
@section('main')
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

            <div class="row">
                <div class="col-12">
                    <div class="customer_details">
                        <h3>Edit instrument</h3>
                        <div class="customar__field">
                            @if($message = Session::get('error'))
                                <div class="alert alert-block alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            @if ($errors->any())
                            <!-- Form Error List -->
                                <div class="alert alert-danger">
                                    <strong>Whoops! Something went wrong!</strong>

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                {!! Form::open(['url' => '/products/'.$category->name.'/'.$id.'/edit', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                                @csrf
                                <div class="margin_between">
                                <div class="input_box space_between">
                                    <label for="title">Title <span>*</span></label>
                                    <input name="title" value="{{$name}}" type="text">
                                </div>

                                <div class="input_box space_between">
                                    <label>Price <span>*</span></label>
                                    <input name="price"  value="{{$price}}" type="text">
                                </div>
                            </div>
                            <div class="input_box ">
                                <label for="description">Description <span>*</span></label>
                                <input name="description"  value="{{$description}}" type="text">
                            </div>
                            <div class="margin_between">
                                <div class="input_box space_between">
                                    <label>Categorie<span>*</span></label>
                                    <select name="category_id" class="select__option">
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" {{ ($category->id == $cat->id) ? 'selected="selected"' : '' }}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" space_between">
                                    <label>Upload image <span>*</span></label>
                                    <input   name="file" type="file" value="{{ $image }}">
                                </div>
                            </div>

                                {!! Form::submit('submit') !!}
                                {!! Form::close() !!}

                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>
    <!-- End Checkout Area -->
@endsection