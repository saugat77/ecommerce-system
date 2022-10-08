<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
  <div class="container" style="padding: 30px 0;">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All users
            </div>
            <div class="panel-body">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                             <th>Email</th>
                              <th>utype</th>
                              <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->utype}}</td>
                          
                                <td>  <a href="#" onclick="confirm('Are u sure, You want to delete this user?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$order->id}})" title="Delete" style="margin-left:20px;"> <i class="fa fa-times fa-2x text-danger"></i> </a></td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>
  </div>
</div>
