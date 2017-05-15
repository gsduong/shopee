@extends('users.blank')

@section('reference')

@stop

@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="assets/users/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="assets/users/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="assets/users/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="assets/users/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="assets/users/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="assets/users/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
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
                        <!--
                        <div class="price-range">
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div>e-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="assets/users/images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{url('/product?p='.$product->slug)}}">
                                            <img src="{{ $product->image_link }}" alt="" /></a>
                                            <h2>{{ $product->sale_price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <input type="hidden" value="{{$product->id}}">
                                            <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->sale_price }}</h2>
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
                        
                    </div><!--features_items-->
                    
                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                                <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                                <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                                <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                                @foreach($cate1s as $product)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->sale_price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <input type="hidden" value="{{$product->id}}">
                                                <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="tab-pane fade" id="blazers" >
                                @foreach($cate2s as $product)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->sale_price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <input type="hidden" value="{{$product->id}}">
                                                <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="tab-pane fade" id="sunglass" >
                                @foreach($cate3s as $product)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->sale_price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <input type="hidden" value="{{$product->id}}">
                                                <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="tab-pane fade" id="kids" >
                                @foreach($cate4s as $product)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->sale_price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <input type="hidden" value="{{$product->id}}">
                                                <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="tab-pane fade" id="poloshirt" >
                                @foreach($cate5s as $product)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product?p='.$product->slug)}}">
                                                <img src="{{ $product->image_link }}" alt="" /></a>
                                                <h2>{{ $product->sale_price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <input type="hidden" value="{{$product->id}}">
                                                <a href="{{url('/product?p='.$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!--/category-tab-->
                    <!--
                    <div class="recommended_items">
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
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                    </div>-->
                    
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
<script>
</script>
@stop