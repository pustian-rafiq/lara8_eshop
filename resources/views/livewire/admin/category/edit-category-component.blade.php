 
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

 <div class="container-fluid" style=" box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
   <div class="row" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
     <div class="col-md-8">
      <h3>Update Category</h3>
     </div>
     <div class="col-md-4">
        <a class="btn btn-success pull-right mt-2" href="{{ route('admin.categories') }}" style="color:#fff">All Categories</a>
    </div>
   </div>
   <div class="row p-5">
     <div class="col-md-2"></div>
     <div class="col-md-8">
       @if(Session::has('message'))
       <div class="alert alert-danger">
         {{ Session::get('message') }}

       </div>
       @endif
        <form wire:submit.prevent="updateCategory">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" wire:model="category_name" wire:keyup="generateSlug">
              @error('category_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Category SLug</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" wire:model="category_slug">
            </div>
          </div>
         
        
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
     </div>
     <div class="col-md-2"></div>
   </div>
     

 </div>
   
  </div>


  