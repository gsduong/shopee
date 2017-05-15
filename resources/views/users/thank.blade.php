<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | E-Shopper</title>
    <link href="{{asset('assets/users/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/users/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/users/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('assets/users/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('assets/users/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/users/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('assets/users/assets/users/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/users/assets/users/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/users/assets/users/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/users/assets/users/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/users/assets/users/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<div class="container text-center">
		<div class="logo-404">
            <a href="index.html"><img src="assets/users/images/home/logo.png" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="assets/users/images/Thanks.png" class="img-responsive" style='height:200px; margin-left:40%;' alt="" />
			<h1><b>THANK YOU!</b> For Your Purchase</h1>
			<p>We hope you are satisfied with your products.</p>
            <div id="info" style="text-align: left"></div>
            <br>
            <br>
            <div id="bill"></div>
			<h2><a href="{{url('/')}}">Bring me back Home</a></h2>
		</div>
	</div>

  
    <script type="text/javascript" src="{{asset('assets/users/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/users/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/users/js/jquery.scrollUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/users/js/price-range.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/users/js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/users/js/main.js')}}"></script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $( document ).ready(function() {
            var info = JSON.parse(localStorage['userInfo']);
            var InfoHtml="";
            InfoHtml += "<p>Customer's name:" + info[0]["name"] + "</p>";
            InfoHtml += "<p>Customer's email:" + info[0]["mail"] + "</p>";
            InfoHtml += "<p>Customer's phone:" + info[0]["phone"] + "</p>";
            InfoHtml += "<p>Customer's address:" + info[0]["address"] + "</p>";
            $("#info").html(InfoHtml);

            var data = localStorage['myCart'];
            console.log(data);
            $.ajax({
            url: '{{url("/get_cart")}}',
                type: "POST",
                dataType: "json",
                data: {
                    data:function (){
                        return data;
                    }
                },
                success: function(items) {
                    var ItemHtml="";
                    ItemHtml += "               <table class=\"table table-condensed\">";
                    ItemHtml += "                   <thead>";
                    ItemHtml += "                       <tr class=\"cart_menu\">";
                    ItemHtml += "                           <td class=\"name\">Item<\/td>";
                    ItemHtml += "                           <td class=\"size\">Size<\/td>";
                    ItemHtml += "                           <td class=\"color\">Color<\/td>";
                    ItemHtml += "                           <td class=\"price\">Price<\/td>";
                    ItemHtml += "                           <td class=\"quantity\">Quantity<\/td>";
                    ItemHtml += "                           <td class=\"total\">Total<\/td>";
                    ItemHtml += "                           <td><\/td>";
                    ItemHtml += "                       <\/tr>";
                    ItemHtml += "                   <\/thead>";
                    ItemHtml += "                   <tbody id=\"cart_item\">";
                    ItemHtml += "                       <tr>";
                    ItemHtml += "                           <td colspan=\"4\">&nbsp;<\/td>";
                    ItemHtml += "                           <td colspan=\"2\">";
                    ItemHtml += "                               <table class=\"table table-condensed total-result\">";
                    ItemHtml += "                                   <tr>";
                    ItemHtml += "                                       <td>Cart Sub Total<\/td>";
                    ItemHtml += "                                       <td class=\"final-price\">0<\/td>";
                    ItemHtml += "                                   <\/tr>";
                    ItemHtml += "                                   <tr>";
                    ItemHtml += "                                       <td>Exo Tax<\/td>";
                    ItemHtml += "                                       <td>0<\/td>";
                    ItemHtml += "                                   <\/tr>";
                    ItemHtml += "                                   <tr class=\"shipping-cost\">";
                    ItemHtml += "                                       <td>Shipping Cost<\/td>";
                    ItemHtml += "                                       <td>Free<\/td>                                      ";
                    ItemHtml += "                                   <\/tr>";
                    ItemHtml += "                                   <tr>";
                    ItemHtml += "                                       <td>Total<\/td>";
                    ItemHtml += "                                       <td id=\"buyer_amount\" class=\"final-price\"><span>0<\/span><\/td>";
                    ItemHtml += "                                   <\/tr>";
                    ItemHtml += "                               <\/table>";
                    ItemHtml += "                           <\/td>";
                    ItemHtml += "                       <\/tr>";
                    ItemHtml += "                   <\/tbody>";
                    ItemHtml += "               <\/table>";
                    $("#bill").html(ItemHtml);

                    var ItemHtml2="";

                    for(var i=0; i< items.length; i++){
                        ItemHtml2 += "                       <tr>";
                        ItemHtml2 += "                           <td class=\"cart_product\">";
                        ItemHtml2 += "                               <h4>" + items[i]["product_id"]["name"]+ "</h4>";
                        ItemHtml2 += "                           </td>";
                        ItemHtml2 += "                           <td class=\"cart_description\">";
                        ItemHtml2 += "                               <h4>" + items[i]["size"]["size"] + "</h4>";
                        ItemHtml2 += "                           </td>";
                        ItemHtml2 += "                           <td class=\"cart_description\">";
                        ItemHtml2 += "                               <h4>" + items[i]["color"]["color_name"] + "</h4>";
                        ItemHtml2 += "                           </td>";
                        ItemHtml2 += "                           <td class=\"cart_price\">";
                        ItemHtml2 += "                               <h4>" + items[i]["product_id"]["regular_price"] + "</h4>";
                        ItemHtml2 += "                           </td>";
                        ItemHtml2 += "                           <td class=\"cart_quantity\">";
                        ItemHtml2 += "                               <div class=\"cart_quantity_button\">";
                        ItemHtml2 += "                                   <h4 class=\"cart_quantity_input\">" + items[i]["quantity"] + "</h4>";
                        ItemHtml2 += "                               </div>";
                        ItemHtml2 += "                           </td>";
                        ItemHtml2 += "                           <td class=\"cart_total\">";
                        ItemHtml2 += "                               <h4 class=\"cart_total_price\">" + items[i]["product_id"]["sale_price"]*items[i]["quantity"] + "</h4>";
                        ItemHtml2 += "                           </td>";
                        ItemHtml2 += "                       </tr>";

                    }
                    $("#cart_item").prepend(ItemHtml2);
                    sumPrice();
                }
            });
        localStorage.clear();
    });

    function sumPrice(){
        var sum = 0;
        $('.cart_total_price').each(function(){
            sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        });
        $(".final-price").text(sum);
    }
    </script>
</body>
</html>