<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url("bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ url("plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url("dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url("dist/css/skins/_all-skins.min.css") }}">
    <link href="{{url('dropzone/dropzone.min.css')}}" rel="stylesheet">
    <script src="{{url('dropzone/dropzone.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('custom.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{ url("/admin/dashboard") }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>D</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Shopee</b> Dashboard</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-opencart"></i>
                            @if(isset($pending) && $pending > 0)
                            <span class="label label-danger">{{$pending}}</span>
                            @else

                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have {{$pending}} new order(s)</li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart"></i>
                            @if(isset($shipping) && $shipping > 0)
                                <span class="label label-info">{{$shipping}}</span>
                            @else

                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have {{$shipping}} shipping order(s)</li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-check-circle"></i>
                            @if(isset($shipped) && $shipped > 0)
                                <span class="label label-success">{{$shipped}}</span>
                            @else

                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have {{$shipped}} shipped order(s)</li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <span class="hidden-xs">admin</span>
                        </a>
                        <ul class="dropdown-menu">

                        <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/admin/password') }}" class="btn btn-default btn-flat">Change
                                        password</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="{{ url("admin/dashboard") }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                    </a>

                </li>

                <li>
                    <a href="{{ url("/admin/dashboard/product.html") }}">
                        <i class="fa fa-th"></i> <span>Products</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-fw fa-book"></i>
                        <span>Catalog</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach($root_catalogs as $catalog)
                        <li>
                            <a href="{{ url("/admin/dashboard/catalog/" . $catalog->id) . ".html"}}"><i class="fa fa-circle-o"></i> {{$catalog->name}}

                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="{{ url("/admin/dashboard/brand.html") }}">

                        <span class="glyphicon glyphicon-tags"></span> <span>Brands</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url("/admin/dashboard/order.html") }}">

                        <span class="glyphicon glyphicon-shopping-cart"></span> <span>Orders</span>
                    </a>
                </li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.12
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ url("plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url("bootstrap/js/bootstrap.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ url("plugins/fastclick/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ url("dist/js/app.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{ url("plugins/sparkline/jquery.sparkline.min.js") }}"></script>
<!-- jvectormap -->
<script src="{{ url("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
<script src="{{ url("plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ url("plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- ChartJS 1.0.1 -->
{{--<script src="{{ url("plugins/chartjs/Chart.min.js") }}"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="{{ url("dist/js/pages/dashboard2.js") }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ url("dist/js/demo.js") }}"></script>
<script src="{{ url("js/ajax.js") }}"></script>
<!-- CK Editor -->

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('product_description');
        //bootstrap WYSIHTML5 - text editor
//        $(".textarea").wysihtml5();
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>
</body>
</html>
