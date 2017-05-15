@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Orders
                <small>Shopee - Thiên đường mua sắm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Dashboard</li>
                <li class="active">Orders</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

            </div>
            <!-- 1st row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- TABLE: PENDING ORDERS -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pending Orders</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Buyer name</th>
                                        <th>Buyer phone</th>
                                        <th>Buyer email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pending_orders as $order)
                                        <tr>
                                            <td><a href="{{ url("admin/order/edit/" . $order->id) }}">{{$order->id}}</a></td>
                                            <td>{{$order->buyer_name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->buyer_email}}</td>
                                            <td><span class="label label-danger">Pending</span></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer clearfix">--}}
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All--}}
                                {{--Orders</a>--}}
                        {{--</div>--}}
                        {{--<!-- /.box-footer -->--}}
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-6">
                    <!-- TABLE: SHIPPING ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipping Orders</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Buyer name</th>
                                        <th>Buyer phone</th>
                                        <th>Buyer email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipping_orders as $order)
                                        <tr>
                                            <td><a href="{{ url("admin/order/edit/" . $order->id) }}">{{$order->id}}</a></td>
                                            <td>{{$order->buyer_name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->buyer_email}}</td>
                                            <td><span class="label label-info">Shipping</span></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer clearfix">--}}
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All--}}
                                {{--Orders</a>--}}
                        {{--</div>--}}
                        {{--<!-- /.box-footer -->--}}
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->

            <!-- 2nd row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- TABLE: SHIPPED ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipped Orders</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Buyer name</th>
                                        <th>Buyer phone</th>
                                        <th>Buyer email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipped_orders as $order)
                                        <tr>
                                            <td><a href="{{ url("admin/order/edit/" . $order->id) }}">{{$order->id}}</a></td>
                                            <td>{{$order->buyer_name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->buyer_email}}</td>
                                            <td><span class="label label-info">Shipped</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer clearfix">--}}
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All--}}
                                {{--Orders</a>--}}
                        {{--</div>--}}
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-6">
                    <!-- TABLE: SHIPPING ORDERS -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cancelled Orders</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Buyer name</th>
                                        <th>Buyer phone</th>
                                        <th>Buyer email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cancelled_orders as $order)
                                        <tr>
                                            <td><a href="{{ url("admin/order/edit/" . $order->id) }}">{{$order->id}}</a></td>
                                            <td>{{$order->buyer_name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->buyer_email}}</td>
                                            <td><span class="label label-warning">Cancelled</span></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer clearfix">--}}
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All--}}
                                {{--Orders</a>--}}
                        {{--</div>--}}
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection