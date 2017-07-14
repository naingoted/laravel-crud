@extends("layouts.master")
@section("content")
<div class="row">
	<div class="col-md-12">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form action="{{ route('blogs.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
					@if($errors->has("title"))
						<p class="alert alert-danger">
						{{ $errors->first('title') }}
						</p>
					@endif
			</div>

			<div class="form-group">
				<label for="body">Body:</label>
				<textarea name="body" id="body" class="form-control" >{{ old('body') }}</textarea>
				@if($errors->has("body"))
					<p class="alert alert-danger">
						{{ $errors->first('body') }}
					</p>
				@endif
			</div>

			<div class="form-group"> 
				<button type="submit" class="btn btn-success">Create Blog</button>
			</div>
		</form>
	</div>

</div>
@endsection

@section ('footer')
<script>
	CKEDITOR.replace('body');
</script>
@stop