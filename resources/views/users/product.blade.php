@extends('users.blank')

@section('reference')
<style type="text/css">
	input[type="radio"] {
	    opacity: 0;
	}
	input[type="radio"] + label {
	    cursor: pointer !important;
	    padding: 4px 10px;
	    border: 1px solid #ccc;
	    background: #efefef;
	    color: #aaa;
	    border-radius: 3px;
	    text-shadow: 1px 1px 0 rgba(0,0,0,0);
	    margin-bottom:0 !important;
	    min-height:15px !important;
	}

	input[type="radio"]:checked + label{
	    /* style for the checked/selected state */
	    border: 2px solid #444 !important;;
	    text-shadow: 1px 1px 0 rgba(0,0,0,0.4);
	}
</style>
@stop

@section('content')

	<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($catalogs as $catalog)
                            @if($catalog->parent_id==null)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="{{'#'.$catalog->slug}}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span></a>
                                            <a class="catalog-option" href="{{url('/shop?c='.$catalog->id)}}">
                                            {{$catalog->name}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$catalog->slug}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                        @foreach($catalogs as $child)
                                            @if($child->parent_id==$catalog->id)
                                                <li><a class="catalog-option" href="{{url('/shop?c='.$catalog->id)}}">{{$child->name}} </a></li>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        </div><!--/category-productsr-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                @foreach($brands as $brand)
                                    <li><a class="brand-option" href="{{url('/shop?b='.$catalog->id)}}"> <span class="pull-right"></span>{{$brand->name}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="assets/users/images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                        
                    </div>
                </div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{$results->image_link}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="assets/users/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="assets/users/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="assets/users/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="assets/users/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="assets/users/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="assets/users/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="assets/users/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="assets/users/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="assets/users/images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="assets/users/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2 id="product_name">{{$results->name}}</h2>
								<p>Web ID: {{$results->slug}}</p>
								<input type="hidden" id="product_id" value="{{$results->id}}">
								<img src="assets/users/images/product-details/rating.png" alt="" />
								<span>
									<span id="product_price">{{$results->regular_price}}</span>
									<label>Quantity:</label>
									<input id="quantity-box" type="text" value="1" />
									<button type="button" class="btn btn-fefault cart" onclick="product_add()">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Color:</b>
								<input name="color" type="radio" value="0" checked>
								@foreach($colors as $color)
									<input id="{{'color-optiion-'.$color->color_id}}" name="color" type="radio" value="{{$color->color_id}}" >
									<label for="{{'color-optiion-'.$color->color_id}}" style="background:{{$color->code}}"></label>									
								@endforeach
								</p>
								<p><b>Color:</b>
								<input name="size" type="radio" value="0" checked>
								@foreach($sizes as $size)
									<input id="{{'size-optiion-'.$size->size_id}}" name="size" type="radio" value="{{$size->size_id}}" >
									<label for="{{'size-optiion-'.$size->size_id}}">{{$size->size}}</label>									
								@endforeach
								</p>
								<p><b>Availability:</b> <span id="stock-status">Loading ...</span></p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$results->brand_id}}</p>
								<a href=""><img src="assets/users/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="assets/users/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="assets/users/images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/users/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/users/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/users/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/users/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/users/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/users/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  	$('input[type=radio][name=color], input[type=radio][name=size]').change(function() {
  		var id = $('#product_id').val();
  		var color = $('input[type=radio][name=color]:checked').val();
  		var size = $('input[type=radio][name=size]:checked').val();
  		$.ajax({
            url: '{{url("/product_check")}}',
            type: "POST",
            dataType: "json",
            data: {
                color: function(){
                    return color;
                },
                size: function(){
                    return size;
                },
                id: function(){
                    return id;
                }
            },
            success: function(result) {
               	if(parseInt(result)>0){
               		$("#stock-status").html("In Stock");
               	}
               	else{
               		$("#stock-status").html("Out of Stock");
               	}
            }
        });
    });

    function product_add() {
    	var color = $('input[type=radio][name=color]:checked').val();
  		var size = $('input[type=radio][name=size]:checked').val();
  		if(color==0 || size==0){
  			$("#error-message").html("You must choose Color and Size");
  			$("#errorModal").modal('show');
  		}
  		else if($('#stock-status').text()=="Loading ..." || $('#stock-status').text()=="Out of Stock"){
  			$("#error-message").html("This Product is Out of Stock");
  			$("#errorModal").modal('show');
  		}
  		else{
		    if (localStorage['myCart'] == null) {
		        var myCart = [];
		        myCart.push({
		            product_id: $('#product_id').val(),
		            quantity: $('#quantity-box').val(),
		            color: color,
		            size: size
		        });
		        localStorage['myCart'] = JSON.stringify(myCart);
		        console.log(localStorage['myCart']);
		    }
		    else {
		        myCart = JSON.parse(localStorage['myCart']);
		        var index = checkExist(myCart, $('#product_id').val(), color, size);
		        if (index > -1) {
		            var qty = parseInt(myCart[index].quantity);
		            qty += parseInt($('#quantity-box').val());
		            myCart[index].quantity = qty;
		        }
		        else {
		            myCart.push({
		                product_id: $('#product_id').val(),
		                quantity: $('#quantity-box').val(),
		            	color: color,
		            	size: size
		            });
		        }
		        localStorage['myCart'] = JSON.stringify(myCart);
		        console.log(localStorage['myCart']);
		    }
		    $.notify($('#quantity-box').val() + "product(s) is added to your cart", "success");
  		}
	}
	function checkExist(vendors, value, color, size) {
	    var found = -1;
	    for (var i = 0; i < vendors.length; i++) {
	        if (vendors[i].product_id == value && vendors[i].color == color && vendors[i].size == size) {
	            found = i;
	            break;
	        }
	    }
	    return found;
	}
</script>
@stop