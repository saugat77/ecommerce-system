<div>
   <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                             Ordered item
                         </div>
                    <div class="col-md-6">
                        <a href="{{route('admin.orders')}} " class="btn btn-success pull-right">All Order</a>
                    </div>
                </div>
             </div>
                <div class="panel-body">
                    <div class="wrap-iten-in-cart">                
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach ($order->orderItems as $item )
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">{{$item->price}}</p></div>
                                <div class="quantity">
                                <h5>{{$item->quantity}} </h5>
                                </div>
                                <div class="price-field sub-total"><p class="price">${{$item->price * $item->quantity }}</p></div>

                            </li>   			                        
                            @endforeach								
                        </ul>
                     
                    </div>
                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Summary</h4>
                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                            <p class="summary-info"><span class="title">Tax</span><b class="index">${{$order->tax}}</b></p>
                            <p class="summary-info"><span class="title">Total</span><b class="index">${{$order->total}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                     
                        User Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                            <th>Firstname</th>
                            <td>{{$order->firstname}} </td>
                            <th>lastname</th>
                            <td>{{$order->lastname}} </td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->mobile}} </td>
                                <th>Email</th>
                                <td>{{$order->email}} </td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{$order->line1}} </td>
                                    <th>location</th>
                                    <td>{{$order->line2}} </td>
                                  </tr>
                                    <tr>
                                        <th>city</th>
                                        <td>{{$order->city}} </td>
                                        <th>Province</th>
                                        <td>{{$order->province}} </td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{$order->country}} </td>
                                            <th>Zipcode</th>
                                            <td>{{$order->zipcode}} </td>
                                          </tr>
                                        
                        </table>
                    </div>
                </div>
            </div>
    </div>
   </div>
</div>
