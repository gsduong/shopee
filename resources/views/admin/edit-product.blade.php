@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2>
                Edit product
            </h2>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Dashboard</li>
                <li class="active">Products</li>
                <li class="active">Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('error') && !isset($errors))
                    <div class="alert alert-danger">
                        <p>{{session()->get('error')}}</p>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{session()->get('success')}}</p>
                    </div>
                @endif
            </div>
            {{--<form action="{{url('admin/product/create')}}">--}}
            {!! Form::open(array('url' => 'admin/product/update', 'method' => 'POST', 'files'=>'true')) !!}
            {{--{{ csrf_field() }}--}}
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product details</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Product name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required name="name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" id="sku" placeholder="SKU" name="sku" value="{{$product->sku}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Cover image</label>
                                <input type="file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" required name="catalog_id">
                                    {{--<option disabled selected> -- select a category -- </option>--}}
                                    @foreach($categories as $category)
                                        @if($category->id == $product->catalog_id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select class="form-control" id="brand" name="brand_id">
                                    {{--<option disabled selected value> -- select a brand -- </option>--}}
                                    @foreach($brands as $brand)
                                        @if($brand->id == $product->product_id)
                                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                        @else
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="material">Material</label>
                                <input type="text" class="form-control" id="material" placeholder="Enter material" name="material" value="{{$product->material}}">
                            </div>
                            <div class="form-group">
                                <label for="made_in">Origin</label>
                                <input type="text" class="form-control" id="made_in" placeholder="Made in ..." name="made_in" value="{{$product->made_in}}">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Description</label>
                                <textarea id="product_description" name="product_description" rows="10" cols="80">{{$product->product_description}}
                                    </textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">More</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Regular price</label>
                                <input type="number" class="form-control" id="regular_price" placeholder="Regular price" name="regular_price" required min="1" value="{{$product->regular_price}}">
                                <input type="hidden" name="id" value="{{$product->id}}">
                            </div>
                            <div class="form-group">
                                <label for="sku">Sale price</label>
                                <input type="number" class="form-control" id="sale_price" placeholder="Sale price" name="sale_price" required min="1" value="{{$product->sale_price}}">
                            </div>
                            <fieldset>
                                <label>Quantity</label>
                                @if(isset($sizeArray) && count($sizeArray) > 0)
                                    @for($i = 0; $i < count($sizeArray); $i++)
                                        <div class="input-group control-group {{$i == 0 ? 'after-add-more' : ''}}">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="sizes">Size</label>
                                                    <select name="sizes[]" id="sizes" class="form-control">
                                                        @foreach($sizes as $size)
                                                            @if($size->id == $sizeArray[$i])
                                                                <option value="{{$size->id}}" selected>{{$size->size}}</option>
                                                            @else
                                                                <option value="{{$size->id}}">{{$size->size}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="colors">Color</label>
                                                    <select name="colors[]" id="colors" class="form-control">
                                                        @foreach($colors as $color)
                                                            @if($color->id == $colorArray[$i])
                                                                <option value="{{$color->id}}" selected>{{$color->color_name}}</option>
                                                            @else
                                                                <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="qty">Quantity</label>
                                                    <input type="number" min="1" name="qty[]" id="qty" class="form-control" required value="{{$stockArray[$i]}}">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Option</label>
                                                    <div class="input-group-btn">
                                                        @if($i == 0)
                                                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                                        @else
                                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @else
                                    <div class="input-group control-group after-add-more">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="sizes">Size</label>
                                                <select name="sizes[]" id="sizes" class="form-control" required>
                                                    @foreach($sizes as $size)
                                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="colors">Color</label>
                                                <select name="colors[]" id="colors" class="form-control" required>
                                                    @foreach($colors as $color)
                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="qty">Quantity</label>
                                                <input type="number" min="1" name="qty[]" id="qty" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Option</label>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="copy hide">
                                    <div class="input-group control-group">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="sizes">Size</label>
                                                <select name="sizes[]" id="sizes" class="form-control">
                                                    @foreach($sizes as $size)
                                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="colors">Color</label>
                                                <select name="colors[]" id="colors" class="form-control">
                                                    @foreach($colors as $color)
                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="qty">Quantity</label>
                                                <input type="number" min="1" name="qty[]" id="qty" class="form-control">
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Option</label>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                        <!-- /.box-body -->


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </section>
        <!-- /.content -->
    </div>
    {{--End content wrapper--}}
@endsection