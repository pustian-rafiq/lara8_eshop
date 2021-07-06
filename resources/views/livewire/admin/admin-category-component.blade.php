 
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

    <h2 class="mb-4">Category List</h2>
    <table id="table_id"  class="display cell-border compact stripe text-center">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $category->cat_name }}</td>
                <td>{{ $category->slug }}</td>
                <td><a href="{{ $category->id }}" title="Edit Category"><span> <i class="fa fa-edit"></i> </span></a></td>
                <td><a href="{{ $category->id }}" title="Delete Category"><span> <i class="fa fa-trash"></i> </span></a></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
