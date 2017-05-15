@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Processing
                <small>Shopee - Thiên đường mua sắm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Dashboard</li>
                <li class="active">Orders</li>
                <li class="active">Order Processing</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- 1st row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Buyer details</h3>

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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$order->buyer_name}}</td>
                                        <td>{{$order->buyer_phone}}</td>
                                        <td>{{$order->buyer_email}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Delivery details</h3>

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
                                        <th>Message</th>
                                        <th>Address</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$order->buyer_message}}</td>
                                        <td>{{$order->buyer_address}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- TABLE: ORDER DETAILS -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Order details</h3>

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
                                        <th>Product name</th>
                                        <th>SKU</th>
                                        <th>Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->order_product as $item)
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td><span class="label label-info">{{$item->product->sku}}</span></td>
                                            <td><img src="{{url($item->product->image_link)}}" alt="{{$item->product->name}}" height="50" width="50"></td>
                                            <td><span class="label label-warning">{{$item->size->size}}</span></td>
                                            <td style="color: {{$item->color->hexa_code}};">{{$item->color->color_name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td><span class="label label-success">{{$item->total}}</span></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="{{url('admin/order/update')}}" method="POST">
                                        {{csrf_field()}}
                                        <label for="status">
                                            <select name="status" id="status">
                                                @for($i = 0; $i < 3; $i++)
                                                    @if($i == $order->status)
                                                        <option value="{{$i}}" selected>{{\App\Order::statusTranslate($i)}}</option>
                                                    @else
                                                        <option value="{{$i}}">{{\App\Order::statusTranslate($i)}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </label>
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <br>
                                        <input type="submit" name="submit" value="Apply" class="btn btn-info">
                                    </form>
                                </div>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection