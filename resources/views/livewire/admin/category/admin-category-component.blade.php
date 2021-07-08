 
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="row bg-secondary mt-3 mb-1 p-2">
            <div class="col-md-6 ">
                <h2 style="color:white">All Categories</h2>
            </div>
            <div class="col-md-6 pt-2" >
                <a class="btn btn-success pull-right " href="{{ route('admin.addCategory') }}">Add New Category</a>
            </div>
        </div>
        <div class="row" style=" box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
            <div class="col-md-12">
                {{-- <h2 class="mb-4">Category List</h2> --}}
                <table id="table_id"  class="display cell-border compact stripe text-center">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                            {{-- <th>Edit</th>
                            <th>Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                        
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->cat_name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a   class="pr-3" href="{{ route('admin.editCategory',['category_slug' => $category->slug])}}" title="Edit Category"><span> <i class="fa fa-edit"></i> </span></a>
                                <a href="{{ $category->id }}" wire:click.prevent="deleteId({{ $category->id }})"  data-toggle="modal" data-target="#exampleModal" title="Delete Category"><span> <i class=" fa fa-trash text-danger"></i> </span></a>
                            
                            </td>
                            {{-- <td><a href="{{ $category->id }}" title="Delete Category"><span> <i class="fa fa-trash"></i> </span></a></td> --}}
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
 
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
 


</div>
 