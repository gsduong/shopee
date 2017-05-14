@extends('users.blank')

@section('reference')
	<link href="{{asset('assets/users/css/jquery-ui.min.css')}}" rel="stylesheet">
@stop

@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody id="cart_item">

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span class="final-price">0</span></li>
							<li>Eco Tax <span>0</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span class="final-price">0</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@stop
}
@section('scripts')
<script type="text/javascript" src="{{asset('assets/users/js/jquery-ui.min.js')}}"></script>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    $( document ).ready(function() {
	    if (localStorage['myCart'] == null) {
	    	$("#cart_item").html("<p class=\"text-center\">Your cart is empty</p>")
	    }
	    else{
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
			    	for(var i=0; i< items.length; i++){
						ItemHtml += "						<tr>";
						ItemHtml += "							<td class=\"cart_product\">";
						ItemHtml += "								<a href=\"\"><img src=\"" + items[i]["product_id"]["image_link"] + "\" alt=\"\"></a>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_description\">";
						ItemHtml += "								<h4><a href=\"\">" + items[i]["product_id"]["name"] + "</a></h4>";
						ItemHtml += "								<p>Web ID: " + items[i]["product_id"]["slug"] + "</p>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_price\">";
						ItemHtml += "								<p>" + items[i]["product_id"]["regular_price"] + "</p>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_quantity\">";
						ItemHtml += "								<div class=\"cart_quantity_button\">";
						ItemHtml += "									<input class=\"cart_quantity_input\" type=\"text\" data-id=\"" + items[i]["product_id"]["id"] + "\" name=\"quantity\" value=\"" + items[i]["quantity"] + "\" size=\"2\">";
						ItemHtml += "								</div>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_total\">";
						ItemHtml += "								<p class=\"cart_total_price\">" + items[i]["product_id"]["regular_price"]*items[i]["quantity"] + "</p>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_delete\">";
						ItemHtml += "								<a class=\"cart_quantity_delete\" href=\"javascript:void(0);\" data-id=\"" + items[i]["product_id"]["id"] + "\" onclick=\"deleteProduct(this)\"><i class=\"fa fa-times\"></i></a>";
						ItemHtml += "							</td>";
						ItemHtml += "						</tr>";

			    	}
			    	$("#cart_item").html(ItemHtml);
			    	sumPrice();
			    	$('.cart_quantity_input').spinner({ min: 1 });
			    	$('.ui-spinner-button').click(function() {
					   var qty = $(this).siblings('input').val();
					   var price = $(this).parent().parent().parent().prev().text();
					   var id = $(this).siblings('input').attr("data-id");
						myCart = JSON.parse(localStorage['myCart']);
						var index = checkExist(myCart, id);
		                var qty = parseInt(myCart[index].quantity);
		                qty += 1;
		                myCart[index].quantity = qty;
		                localStorage['myCart'] = JSON.stringify(myCart);
					   $(this).parent().parent().parent().next().first().html('<p class="cart_total_price">' + qty*price + '</p>');
					   sumPrice();
					});
	            }
	        });

	    }
	});

	function sumPrice(){
		var sum = 0;
		$('.cart_total_price').each(function(){
		    sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
		});
		$(".final-price").text(sum);
	}

	function checkExist(vendors, value) {
        var found = -1;
        for (var i = 0; i < vendors.length; i++) {
            if (vendors[i].product_id == value) {
                found = i;
                break;
            }
        }
        return found;
    }

    function deleteProduct(e){
    	var id = $(e).attr("data-id");
    	myCart = JSON.parse(localStorage['myCart']);
		var index = checkExist(myCart, id);
		myCart.splice(index, 1);
		localStorage['myCart'] = JSON.stringify(myCart);
		$(e).parent().parent().remove();
		sumPrice();
    }
</script>
@stop