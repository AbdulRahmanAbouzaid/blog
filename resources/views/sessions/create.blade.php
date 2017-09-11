@extends('layouts.master')

@section('content')


	<div class="col-sm-8 blog-main">

		<h2 class="blog-post-title"> Login </h2>

		<hr/>

		<form method="POST" action="/login">

			{{ csrf_field() }}

			<div class="form-group">

			    <label for="email">Email</label>

			    <input type="text" class="form-control" name="email" id="email" required>

			</div>

			<div class="form-group">

			    <label for="password">Password</label>

			    <input type="password" class="form-control" name="password" id="password" required>

			</div>
			  
			<div class="form-group">

				<button type="submit" class="btn btn-primary">Login</button>

			</div>

			@include('layouts.errors')

		</form>

	</div>

@endsection