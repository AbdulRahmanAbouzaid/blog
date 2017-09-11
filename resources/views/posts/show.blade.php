@extends('layouts.master')

@section('button')

	@if(auth()->check())

		<a class="btn btn-outline-primary" href="/posts/create"> + Create Post </a>

	@endif
	
@endsection

@section('content')

	<div class="col-sm-8 blog-main">
		
		<div class="blog-post">


			<h2 class="blog-post-title"> {{$post->title}} </h2>

			<p>
				{{$post->created_at->toFormattedDateString()}}

			</p>

			{{$post->body}}


		</div>

		<div class="comments">

			<ul class="list-group">
				
				@foreach($post->comments as $comment)

					<li class="list-group-item">

						{{$comment->body}} . <b> &nbsp {{$comment->created_at->diffForHumans()}} </b>

					</li>

				@endforeach

			</ul>

		</div>

		<hr/>

		<!-- <div class="card"> -->
		
			<form method="POST" action="/posts/{{$post->id}}/comments">

				{{ csrf_field() }}
				
				<div class="form-group">

		    		<textarea class="form-control" name="body" id="body" placeholder="add your comment here"></textarea>

				</div>
		  
				<div class="form-group">

					<button type="submit" class="btn btn-primary">add comment</button>

				</div>

				@include('layouts.errors')

			</form>

		<!-- </div> -->


	</div>

@endsection

@section('postTags')

	@if($tags->isNotEmpty())

		<div class="sidebar-module">
	          
	        <h4>Tags</h4>
	          
	        <ol class="list-unstyled">

	          	@foreach($tags as $tag)

	                <li>
	                
	                    <a href="/posts/tags/{{$tag}}">
	                    
	                        <u> #{{$tag}} </u>

	                    </a>

	                </li>

	            @endforeach

	        </ol>
	          
	    </div>

	@endif

@endsection