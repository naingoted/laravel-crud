<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

	<div class="container">
	<h2>
		<a href="/blogs">SPH Blogs</a>
	</h2> 	
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
		@yield("content")
	</div>

	<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
	@yield ('footer')
</body>
</html>