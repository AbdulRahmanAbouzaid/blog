@extends('layouts.master')

@section('button')

	@if(auth()->check())

		<a class="btn btn-outline-primary" href="/posts/create"> + Create Post </a>

	@endif
	
@endsection

@section('content')

	<div class="col-sm-8 blog-main">

		@foreach($posts as $post)

			@include('posts.post')

		@endforeach

		<nav class="blog-pagination">

		  	<a class="btn btn-outline-primary" href="#">Older</a>

		    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>

		</nav>

	</div>

@endsection