@extends("layouts.app")
@section("content")
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<a class="btn btn-primary" href="{{ route('blogs.create') }}">Create Blog</a>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-stripped" id="blogs-table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Summary</th>
					<th>Comments</th>
					<th>Updated</th>
					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
				@foreach($blogs as $blog)
				<tr>
					<td>{{ $blog->title }}</td>
					<td>{!!str_limit($blog->body, $limit = 50, $end = '...') !!}</td>
					{{-- call comments function from the blog model --}}
					<td>{{ $blog->comments->count() }}</td>
					<td>{{ $blog->updated_at->diffForHumans() }}</td>
					<td>
						<a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Show</a>
						{{-- disable access to anonymous user --}}
						@if(Auth::check())
							<a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success">Edit</a>
							<form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('delete')}}
								<button class="btn btn-danger">Delete</button>
							</form>
						@endif

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>	

@endsection

