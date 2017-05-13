@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Brands
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Dashboard</li>
                <li class="active">Brands</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All fashion brands in shop</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ $brands->links() }}
                        </div>
                        <div class="box-body">
                            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add</button>
                        </div>

                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Slug</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--<tr>--}}
                                    {{--<td>Trident</td>--}}
                                    {{--<td>Internet--}}
                                        {{--Explorer 4.0--}}
                                    {{--</td>--}}
                                    {{--<td>Win 95+</td>--}}
                                {{--</tr>--}}
                                @foreach($brands as $brand)
                                    <tr id="brand-{{$brand->id}}">
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>
                                            {{--<button class="btn btn-info" value="{{$brand->id}}">Edit</button>--}}
                                            <button class="delete-brand btn btn-danger" data-id="{{ $brand->id }}" data-token="{{ csrf_token() }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Brand</th>
                                    <th>Slug</th>
                                    <th>Operations</th>
                                </tr>
                                </tfoot>
                            </table>

                        <div class="box-body">
                            {{ $brands->links() }}
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