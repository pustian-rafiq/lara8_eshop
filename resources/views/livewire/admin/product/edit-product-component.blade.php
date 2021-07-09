 
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
      <h3>Product Edit Page</h3>
     </div>
     <div class="col-md-4">
        <a class="btn btn-success pull-right mt-2" href="{{ route('admin.products') }}" style="color:#fff">Back</a>
    </div>
   </div>
   <div class="row p-5">
     
     <div class="col-md-12">
       @if(Session::has('message'))
       <div class="alert alert-danger">
         {{ Session::get('message') }}

       </div>
       @endif
        <form wire:submit.prevent="updateProduct" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mb-3">
                        <label for="inputEmail3">Product Name</label>
                          <input type="text" placeholder="Product Name" class="form-control" id="inputEmail3" wire:model="product_name" wire:keyup="generateSlug">
                          @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>

                    <div class=" mb-3">
                        <label for="inputEmail3">Product slug</label>
                          <input type="text" placeholder="Product slug" class="form-control" id="inputEmail3" wire:model="product_slug">
                          @error('product_slug') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>

                    <div class=" mb-3">
                        <label for="inputEmail3">Product Category</label>
                         <select class="form-control" name="product_category" wire:model="product_category_id" id="inputEmail3">
                             <option   value="">Select Category</option>
                             @foreach ($categories as $category)
                             <option   value="{{ $category->id }}">{{ $category->cat_name }}</option>
                             @endforeach
                         </select>
                          @error('product_category_id') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>

                    <div class=" mb-3">
                        <label for="inputEmail3">Short Description</label>
                          <input type="text" placeholder="Product short description" class="form-control" id="inputEmail3" wire:model="short_description">
                          @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
                    <div class=" mb-3">
                        <label for="inputEmail3">Regular Price</label>
                          <input type="text" placeholder="Product regular price" class="form-control" id="inputEmail3" wire:model="regular_price">
                          @error('regular_price') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
                    <div class=" mb-3">
                        <label for="inputEmail3">Sale Price</label>
                          <input type="text" placeholder="Product sale price" class="form-control" id="inputEmail3" wire:model="sale_price">
                          @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
                      
                </div>
                <div class="col-md-6">
                    <div class=" mb-3">
                        <label for="inputEmail3">Product SKU</label>
                          <input type="text" placeholder="Product SKU"class="form-control" id="inputEmail3" wire:model="product_sku"  >
                          @error('product_sku') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>

                    <div class=" mb-3">
                        <label for="inputEmail3">Stock Status</label>
                        <select class="form-control" name="stock_status" id="inputEmail3" wire:model="stock_status">
                            <option   value="instock">Instock</option>
                            <option  value="outofinstock">Out Of Stock</option>
                        </select>
                          @error('stock_status') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>

                    <div class=" mb-3">
                        <label for="inputEmail3">Featured</label>
                        <select class="form-control" name="featured_product" id="inputEmail3" wire:model="featured_product">
                            <option value="0">No</option>
                            <option  value="1">Yes</option>
                        </select>
                          @error('featured_product') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
                    <div class=" mb-3">
                        <label for="inputEmail3">Quantity</label>
                          <input type="text" placeholder="Product quantity" class="form-control" id="inputEmail3" wire:model="product_quantity">
                          @error('product_quantity') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
                    <div class=" mb-3">
                        <label for="inputEmail3">Image</label>
                          <input type="file" class="form-control" id="inputEmail3" wire:model="newImage">
                          @if($newImage)
                          <img src="{{ $newImage->temporaryUrl() }}" alt="" width="120">
                          @else
                          <img src="{{ asset('assets/images/products') }}/{{ $product_image }}" alt="" width="120">
                          @endif
                        
                          @error('product_image') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
              </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>

                    <div class=" mb-3">
                        <p for="inputEmail3">Product Description</p>
                            <textarea name="" id="" cols="30" rows="10" wire:model="product_description">

                            </textarea>
                          @error('product_description') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div> 
                </div>
            </div>
        
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
     </div>
    
   </div>
     

 </div>
   
  </div>


  {{-- <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
 