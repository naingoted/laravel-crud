@extends("layouts.master")
@section("content")
<div class="row">
	<div class="col-md-12">
		<form action="{{ route('blogs.update', $blog->id) }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}">
					
			</div>

			<div class="form-group">
				<label for="body">Body:</label>
				<textarea name="body" id="body" class="form-control" >{{ $blog->body }}</textarea>
				@if($errors->has("body"))
					<p class="alert alert-danger">
						{{ $errors->first('body') }}
					</p>
				@endif
			</div>

			<div class="form-group"> 
				<form action="{{ route('blogs.store', $blog->id) }}"
				>
					{{ csrf_field() }}
					{{ method_field("patch") }}
					<button type="submit" class="btn btn-primary">Update Blog</button>
				</form>

				
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