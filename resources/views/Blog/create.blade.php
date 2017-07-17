@extends("layouts.app")
@section("content")
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form action="{{ route('blogs.store') }}" method="POST">
			{{-- to prevent csrf attack --}}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title:</label>
				{{-- uses the old value if the page submit failed --}}
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
{{-- inject ckeditor script to body --}}
@section ('footer')
<script>
	CKEDITOR.replace('body');
</script>
@endsection