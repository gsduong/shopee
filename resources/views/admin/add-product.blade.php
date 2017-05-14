@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2>
                Add new product
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
                @if (isset($error) && !isset($errors))
                    <div class="alert alert-danger">
                        <p>{{$error}}</p>
                    </div>
                @endif
            </div>
            {{--<form action="{{url('admin/product/create')}}">--}}
            {!! Form::open(array('url' => 'admin/product/create', 'method' => 'POST', 'files'=>'true')) !!}
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
                                    <input type="text" class="form-control" id="name" placeholder="Enter name" required name="name">
                                </div>
                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" id="sku" placeholder="SKU" name="sku">
                                </div>
                                <div class="form-group">
                                    <label for="image">Cover image</label>
                                    <input type="file" id="image" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" required name="catalog_id">
                                        <option disabled selected> -- select a category -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" id="brand" name="brand_id">
                                        <option disabled selected value> -- select a brand -- </option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="material">Material</label>
                                    <input type="text" class="form-control" id="material" placeholder="Enter material" name="material">
                                </div>
                                <div class="form-group">
                                    <label for="made_in">Origin</label>
                                    <input type="text" class="form-control" id="made_in" placeholder="Made in ..." name="made_in">
                                </div>
                                <div class="form-group">
                                    <label for="product_description">Description</label>
                                    <textarea id="product_description" name="product_description" rows="10" cols="80">
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
                                    <input type="number" class="form-control" id="regular_price" placeholder="Regular price" name="regular_price" required min="1">
                                </div>
                                <div class="form-group">
                                    <label for="sku">Sale price</label>
                                    <input type="number" class="form-control" id="sale_price" placeholder="Sale price" name="sale_price" required min="1">
                                </div>
                                <fieldset>
                                    <label>Quantity</label>
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

    <!-- /.content-wrapper -->
@endsection