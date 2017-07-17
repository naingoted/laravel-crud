@extends("layouts.app")
@section("content")
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $blog->title }}</h1>
			<p>{!! $blog->body !!}</p>
		</div>
	</div>
	<div class="row">
			<div class="col-md-8 col-md-offset-2 comment">
				{{-- hide Comment Title If there's none --}}
				@if($blog->comments->count() > 0)
					<h2> Comments </h2>
				@endif
				@foreach($blog->comments as $comment)
					<div class="panel panel-default">
						<div class="comment-top panel-heading">
							<strong class="comment-name">
								{{ $comment->name }}
							</strong>
							{{-- Making Date Format More Readable --}}
							<span class="comment-date"> 
							commented {{ $comment->created_at->diffForHumans()}}
							</span>		

						</div>
						<div class="comment-bottom panel-body">
							{{ $comment->comment }}
						</div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="row">
		    <div class="col-md-8 col-md-offset-2">
				<h2> Post Comments </h2>
			</div>
			<div id="comment-form" class="col-md-8 col-md-offset-2">
			{{-- Used Laravel Collective Package --}}
				{{ Form::open(['route' => ['comments.store', $blog->id], 'method' => 'POST']) }}
					
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('name', "Name:") }}
							{{ Form::text('name', null, ['class' => 'form-control']) }}
						</div>

						<div class="col-md-6">
							{{ Form::label('email', 'Email:') }}
							{{ Form::text('email', null, ['class' => 'form-control']) }}
						</div>

						<div class="col-md-12">
							{{ Form::label('comment', "Comment:") }}
							{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

							{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
						</div>
					</div>

				{{ Form::close() }}
			</div>
		</div>

@endsection