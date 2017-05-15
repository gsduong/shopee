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
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="javascript:void(0);" onclick="doCheckOut()">Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input id="buyer_name" type="text" placeholder="Fullname*" required>
									<input id="buyer_mail" type="text" placeholder="Email*" required>
									<input type="text" placeholder="Title">
									<input id="buyer_address" type="text" placeholder="Address 1 *" required>
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input id="buyer_phone" type="text" placeholder="Phone *" required>
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea id="buyer_message" name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td class="final-price">0</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>0</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td id="buyer_amount" class="final-price"><span>0</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@stop

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
						ItemHtml += "								<p>Size: " + items[i]["size"]["size"] + ", Color: " + items[i]["color"]["color_name"] + "</p>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_price\">";
						ItemHtml += "								<p>" + items[i]["product_id"]["regular_price"] + "</p>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_quantity\">";
						ItemHtml += "								<div class=\"cart_quantity_button\">";
						ItemHtml += "									<p class=\"cart_quantity_input\">" + items[i]["quantity"] + "</p>";
						ItemHtml += "								</div>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_total\">";
						ItemHtml += "								<p class=\"cart_total_price\">" + items[i]["product_id"]["regular_price"]*items[i]["quantity"] + "</p>";
						ItemHtml += "							</td>";
						ItemHtml += "							<td class=\"cart_delete\">";
						ItemHtml += "							</td>";
						ItemHtml += "						</tr>";

			    	}
			    	$("#cart_item").prepend(ItemHtml);
			    	sumPrice();
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

    function doCheckOut(){
    		var products = localStorage['myCart'];
    		$.ajax({
            url: '{{url("/do_checkout")}}',
	            type: "GET",
	            dataType: "json",
	            data: {
	            	products:function (){
	            		return products;
	            	},
	            	user_id:function(){
	            		return $("#user_id").val()
	            	},
	            	name:function(){
	            		return $("#buyer_name").val()
	            	},
	            	mail:function(){
	            		return $("#buyer_mail").val()
	            	},
	            	phone:function(){
	            		return $("#buyer_phone").val()
	            	},
	            	address:function(){
	            		return $("#buyer_address").val()
	            	},
	            	message:function(){
	            		return $("#buyer_message").val()
	            	},
	            	amount:function(){
	            		return $("#buyer_amount").html()
	            	},
	            },
	            success: function(items) {
	            	console.log(items);
	            }
	        });
    }
</script>
@stop