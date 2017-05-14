@extends('users.blank')

@section('reference')

@stop

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="assets/users/images/shop/advertisement.jpg" alt="" />
        </div>
    </section>
    
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
                                            <a class="catalog-option" data-id="{{$catalog->id}}" href="javascript:void(0);">
                                            {{$catalog->name}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$catalog->slug}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                        @foreach($catalogs as $child)
                                            @if($child->parent_id==$catalog->id)
                                                <li><a class="catalog-option" data-id="{{$catalog->id}}" href="javascript:void(0);">{{$child->name}} </a></li>
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
                                    <li><a data-id="{{$brand->id}}" class="brand-option" href="javascript:void(0);"> <span class="pull-right"></span>{{$brand->name}}</a></li>
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
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($results as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $product->image_link }}" alt="" />
                                            <h2>{{ $product->regular_price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <input type="hidden" value="{{$product->id}}">
                                            <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                    <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->regular_price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <input type="hidden" value="{{$product->id}}">
                                                <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <ul class="pagination">
                        {!! $results->appends(Request::query())->render() !!} 
                        </ul>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
<script>
    $(".brand-option").click(function(e){
        var brand = $(this).attr('data-id');
        var url = window.location.href;
        url = updateQueryStringParameter(url, "b", brand);
        window.location.href = url;
    });
    $(".catalog-option").click(function(e){
        var catalog = $(this).attr('data-id');
        var url = window.location.href;
        url = updateQueryStringParameter(url, "c", catalog);
        window.location.href = url;
    });

    function shop_add(e) {
        if (localStorage['myCart'] == null) {
            var myCart = [];
            myCart.push({
                product_id: $(e).prev().val(),
                quantity: 1,
            });
            localStorage['myCart'] = JSON.stringify(myCart);
            console.log(localStorage['myCart']);
        }
        else {
            myCart = JSON.parse(localStorage['myCart']);
            var index = checkExist(myCart, $(e).prev().val());
            if (index > -1) {
                var qty = parseInt(myCart[index].quantity);
                qty += 1;
                myCart[index].quantity = qty;
            }
            else {
                myCart.push({
                    product_id: $(e).prev().val(),
                    quantity: 1,
                });
            }
            localStorage['myCart'] = JSON.stringify(myCart);
            console.log(localStorage['myCart']);
        }
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
</script>
@stop