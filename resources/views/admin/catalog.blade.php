@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$catalog->name}}
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Admin</li>
                <li class="active">Dashboard</li>
                <li class="active">Catalogs</li>
                <li class="active">{{$catalog->name}}</li>
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
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <button id="btn-add" name="btn-add" data-toggle="modal" data-target="#add_modal" class="btn btn-primary btn-xs">Add</button>
                        </div>

                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($catalog->children()->orderBy('name', 'asc')->get() as $subcategory)
                                    <tr id="category-{{$subcategory->id}}">
                                        <td>{{ $catalog->name }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>
                                            <button class="edit-btn btn btn-warning" data-toggle="modal" data-target="#edit_modal" data-id="{{$subcategory->id}}" data-name="{{$subcategory->name}}">Edit</button>
                                            <button class="delete-subcategory btn btn-danger" data-id="{{ $subcategory->id }}" data-token="{{ csrf_token() }}">Delete</button>
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
            <!-- Edit Modal start -->
            <div class="modal fade" id="edit_modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/catalog/update') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <input type="hidden" class="form-control" id="id" name="id" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-default">Update</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Edit code ends -->
            <!-- Add Modal start -->
            <div class="modal fade" id="add_modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/catalog/create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="name_to_add">Name:</label>
                                        <input type="text" class="form-control" id="name_to_add" name="name_to_add" required>
                                        <input type="hidden" class="form-control" id="parent_id" name="parent_id" required value="{{$catalog->id}}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-default">Add</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Add code ends -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection