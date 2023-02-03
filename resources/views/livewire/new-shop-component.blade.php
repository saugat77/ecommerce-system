    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Electronics</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{ asset ('assets/images/fashion-accesories-banner.jpg') }}" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Clothes and Shoes</h1>



                    </div><!--end wrap shop control-->
                    <style>
                        .product-wish{
                            position: absolute;
                            top: 10%;
                            left:0;
                            z-index: 99;
                            right: 30px;
                            text-align: right;
                            padding-top: 0;
                        }
                        .product-wish .fa{
                            color: #cbcbcb;
                            font-size: 32px;
                        }
                        .product-wish .fa:hover{
                            color:#ff7007;
                        }
                        .fill-heart{
                            color:#ff7007 !important;
                        }
                    </style>

                    <div class="row">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        <ul class="product-list grid-products equal-container">
                            @foreach ($products as $product )


                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                            <figure><img src="{{ asset ('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>
                                        <a href="#"  class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}' ,{{$product->regular_price}} )" >Add To Cart</a>
                                <div class="product-wish">
                                    @if ($witems->contains($product->id))
                                    <a href="#"  wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    @else
                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}' ,{{$product->regular_price}} )"><i class="fa fa-heart"></i></a>
                                    @endif

                                </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="wrap-pagination-info">
                        {{$products->links()}}
                    {{-- <ul class="page-numbers">
                            <li><span class="page-number-item current" >1</span></li>
                            <li><a class="page-number-item" href="#" >2</a></li>
                            <li><a class="page-number-item" href="#" >3</a></li>
                            <li><a class="page-number-item next-link" href="#" >Next</a></li>
                        </ul>
                        <p class="result-count">Showing 1-8 of 12 result</p> --}}
                    </div>
                </div><!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @foreach ($categories as $category )
                                <li class="category-item">
                                    <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget filter-widget price-filter">
                        <h2 class="widget-title">Price <span class="text-info">${{$min_price}} - ${{$max_price}}</span></h2>
                        <div class="widget-content" style="padding:10px 5px 40px 5px">
                        <div  id="slider" wire:ignore></div>
                        </div>
                    </div><!-- Price-->





                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset ('assets/images/products/digital_01.jpg') }}" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset ('assets/images/products/digital_17.jpg') }}" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset ('assets/images/products/digital_18.jpg') }}" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset ('assets/images/products/digital_20.jpg') }}" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div><!-- brand widget-->

                </div><!--end sitebar-->

            </div><!--end row-->

        </div><!--end container-->


    </main>
    @push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider,{
            start : [1,1000],
            connect:true,
            range :{
            'min':1,
            'max':1000
            },
            pips:{
                mode:'steps',
                stepped:true,
                density:4
            }
        });
        slider.noUiSlider.on('update',function(value){
            @this.set('min_price',value[0]);
            @this.set('max_price',value[1]);
        });
    </script>

    @endpush
