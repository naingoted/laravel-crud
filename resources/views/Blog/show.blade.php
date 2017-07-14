@extends("layouts.master")
@section("content")
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $blog->title }}</h1>
			<p>{!! $blog->body !!}</p>
		</div>
	</div>
	<?php //dd($blog->comments());?>
	<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@foreach($blog->comments as $comment)
					<div class="comment">
						<p><strong>Name:</strong> {{ $comment->name }}</p>
						<p><strong>Comment:</strong><br/>{{ $comment->comment }}</p><br>
					</div>
				@endforeach
			</div>
		</div>

		<div class="row">
			<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
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