<div>
    <style>
        nav svg{
            height:20px;
        }
        nav .hidden{
            display: block !important;
        }

    </style>
    <div class="container" style="padding:30px 0;">
   <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <div class="row">
                       <div class="col-md-6">
                           All Category
                       </div>
                       <div class="col-md-6">
                           <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Add New</a> 
                       </div>
                   </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat )
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->slug}}</td>
                                <td>
                                    <a href="{{route('admin.editcategory',['category_slug'=>$cat->slug])}}" title="Edit" > <i class="fa fa-edit fa-2x"></i> </a>
                                    <a href="#" wire:click.prevent="deleteCategory({{$cat->id}})" title="Delete" style="margin-left:20px;"> <i class="fa fa-times fa-2x text-danger"></i> </a>


                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
   </div>
    </div>
</div>
