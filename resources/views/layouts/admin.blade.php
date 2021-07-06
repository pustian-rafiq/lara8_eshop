<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
		
		<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

		@livewireStyles
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{ asset('assets/admin/images/logo.jpg') }});"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
				   <a class="text-white" style="font-size: 20px;" href="{{ route('admin.dashboard') }}"><span > <i  class="fa fa-bars"></i> </span>DashBoard</a> 
	            {{-- <a href="{{ route('admin.categories') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span> <i class="fa fa-home"></i> </span>Category</a> --}}
	            {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul> --}}
	          </li>
	          <li>
				<a href="{{ route('admin.categories') }}" ><span> <i class="fa fa-home"></i> </span>Category</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span> <i class="fa fa-globe"></i> </span>Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="#">Portfolio</a>
	          </li>
	          <li>
              <a href="#">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">TeslaCoder.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
		{{-- Main Content Here --}}
             {{ $slot }}
      
		</div>

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
	@livewireScripts
	<script>
		$(document).ready( function () {
			$('#table_id').DataTable();
		} );
	</script>
  </body>
</html>