<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
   <div class="container" style="padding:30px 0;">
   <div class="row">
       <div class="col-md-12">
           <div class="panel panel-default">
              <div class="row">
                  <div class="col-md-6">
                      All Products
                  </div>
                  <div class="col-md-6">
                   <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Add New</a> 
                </div>
              </div>
           </div>
           <div class="panel-heading">
               @if (Session::has('message'))
                   <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
               @endif
               <table class="table table-striped">
                   <thead>
                       <tr>
                       <th>Id</th>
                       <th>Image</th>
                       <th>Name</th>
                       <th>Stock</th>
                       <th>Price</th>
                       <th>Sale Price</th>
                       <th>Category</th>
                       <th>Date</th>
                       <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                       @foreach ($products as $pro)
                           <tr>
                               <td>{{$pro->id}}</td>
                               <td><img src="{{asset('assets/images/products')}}/{{$pro->image}}" width="60"></td>
                               <td>{{$pro->name}}</td>
                               <td>{{$pro->stock_status}}</td>
                               <td>{{$pro->regular_price}}</td>
                               <td>{{$pro->sale_price}}</td>
                               <td>{{$pro->category->name}}</td>
                               <td>{{$pro->created_at}}</td>
                               <td>
                                   <a href="{{route('admin.editproduct',['product_slug'=>$pro->slug])}}" title="Edit"> <i class="fa fa-edit fa-2x text-info"></i> </a>
                                     <a href="#" title="delete" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$pro->id}})" ><i class="fa fa-times fa-2x text-danger"></i> </a>  
                                </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
               {{$products->links()}}
           </div>
       </div>
    </div>
</div>
</div>
