@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Products
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Dashboard</li>
                <li class="active">Products</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif


                @if (session()->has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
                        <em>
                            {{ session()->get('success') }}
                        </em>
                    </div>
                @endif
            </div>
            <div class="row">
                {{--<div class="col-md-5">--}}
                    {{--<div class="row">--}}
                        {{--<form method="GET" action="" accept-charset="UTF-8" id="products-form">--}}
                            {{--<div class="col-md-2 col-xs-3">--}}
                                {{--{!! Form::select('category_id', $categories, Input::get('category'), ['id' => 'category', 'class' => 'form-control', 'onchange' => 'this.form.submit()']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3 col-xs-4">--}}
                                {{--<div class="input-group custom-search-form">--}}
                                    {{--<input type="text" class="form-control" name="search" value="{{ Input::get('search') }}" placeholder="">--}}
                                    {{--<span class="input-group-btn">--}}
                                        {{--<button class="btn btn-default" type="submit" id="search-users-btn">--}}
                                        {{--<span class="glyphicon glyphicon-search"></span>--}}
                                        {{--</button>--}}
                                        {{--@if (Input::has('search') && Input::get('search') != '')--}}
                                            {{--<a href="{{ url('/admin/product.html') }}" class="btn btn-danger" type="button" >--}}
                                                {{--<span class="glyphicon glyphicon-remove"></span>--}}
                                            {{--</a>--}}
                                        {{--@endif--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}

                {{--</div>--}}
            </div>
            <div class="row tab-search">
                <div class="col-md-6 col-xs-5">
                    {{--{{ $products->links() }}--}}
                    {{ $products->appends(Input::all()) }}
                </div>
                <form method="GET" action="" accept-charset="UTF-8" id="products-form">
                    <div class="col-md-3 col-xs-3">
                        {!! Form::select('category_id', $categories, Input::get('category_id'), ['id' => 'category', 'class' => 'form-control', 'onchange' => 'this.form.submit()']) !!}
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="search" value="{{ Input::get('search') }}" placeholder="Search by product name or SKU">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" id="search-users-btn">
                                        <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                @if (Input::has('search') && Input::get('search') != '')
                                    <a href="{{ url('/admin/dashboard/product.html') }}" class="btn btn-danger" type="button" >
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                @endif
                                    </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        {{--<div class="box-header">--}}
                            {{--<h3 class="box-title">Products</h3>--}}
                        {{--</div>--}}
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a href="{{ url('admin/product/create') }}" class="btn btn-info" role="button">Add new product</a>
                        </div>

                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>SKU</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Made in</th>
                                    <th>Regular price</th>
                                    <th>Sale price</th>
                                    <th>Discount</th>
                                    <th>Material</th>
                                    <th>Qty</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr id="product-{{$product->id}}">
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->catalog->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td><img src="{{url($product->image_link)}}" alt="{{ $product->name }}" style="width: 80px; height: 80px;"></td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>{{ $product->made_in }}</td>
                                        <td>{{ $product->regular_price }} VNĐ</td>
                                        <td>{{ $product->sale_price }} VNĐ</td>
                                        <td>{{ $product->discount }}%</td>
                                        <td>{{ $product->material }}</td>
                                        <td>{{ $product->qty() }}</td>
                                        <td>
                                            {{--<button class="edit-btn btn btn-warning" data-toggle="modal" data-target="#edit_modal" data-id="{{$subcategory->id}}" data-name="{{$subcategory->name}}">Edit</button>--}}
                                            <a href="{{ url('admin/product/edit/' . $product->id) }}" class="btn btn-warning" role="button">Edit</a>
                                            <a href="{{ url('admin/product/delete/' . $product->id) }}" class="btn btn-danger" role="button">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Deleted products</h3>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>SKU</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Made in</th>
                                    <th>Regular price</th>
                                    <th>Sale price</th>
                                    <th>Discount</th>
                                    <th>Material</th>
                                    <th>Qty</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deleted_products as $product)
                                    <tr id="product-{{$product->id}}">
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->catalog->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td><img src="{{url($product->image_link)}}" alt="{{ $product->name }}" style="width: 80px; height: 80px;"></td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>{{ $product->made_in }}</td>
                                        <td>{{ $product->regular_price }} VNĐ</td>
                                        <td>{{ $product->sale_price }} VNĐ</td>
                                        <td>{{ $product->discount }}%</td>
                                        <td>{{ $product->material }}</td>
                                        <td>{{ $product->qty() }}</td>
                                        <td>
                                            {{--<button class="edit-btn btn btn-warning" data-toggle="modal" data-target="#edit_modal" data-id="{{$subcategory->id}}" data-name="{{$subcategory->name}}">Edit</button>--}}
                                            <a href="{{ url('admin/product/restore/' . $product->id) }}" class="btn btn-warning" role="button">Restore</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection