<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	{{-- Cross Site Reference Forgery --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- Custom Css --}}
	<link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

	<div class="container">
	<h2>
		<a href="/blogs">SPH.. Blogs</a>
	</h2> 	
		{{-- All the flashed messages will appears here --}}
		<div class="row">
			@if (Session::has('success'))			
				<div class="alert alert-success" role="alert">
					<strong>Success:</strong> {{ Session::get('success') }}
				</div>
			@endif

			@if (count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					<strong>Errors:</strong>
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach  
					</ul>
				</div>

			@endif
		</div>
		{{-- End flash messages --}}
		{{-- Main content placeholder--}}
		@yield("content")
		{{-- End main content --}}
	</div>
	{{-- Javascripts --}}
	<script src="{{asset('js/custom.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
	{{-- Footer placeholder --}}
	@yield ('footer')
	{{-- End footer --}}
</body>
</html>