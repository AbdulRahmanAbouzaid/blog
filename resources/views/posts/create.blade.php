@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">

	<h2 class="blog-post-title"> create Post </h2>

	<hr/>

	<form method="POST" action="/posts">

		{{ csrf_field() }}


		<div class="form-group">

		    <label for="title">Post title</label>

		    <input type="text" class="form-control" name="title" id="title">

		</div>

		<div class="form-group">

		    <label for="body">Post Body</label>

		    <textarea  class="form-control" name="body" id="body"></textarea>

		</div>
		  

		<div class="form-group">

		    <label for="title">tags</label>

		    <input type="text" class="form-control" name="tags" id="tags">

		</div>


		<div class="form-group">

			<button type="submit" class="btn btn-primary">Publish</button>

		</div>

		@include('layouts.errors')

	</form>


</div>

@endsection



<script type="text/javascript">
	
	$(document).ready(function()
	
	{
	
		 $( "#tags" ).autocomplete({
		  source: "search/tags",
		  minLength: 3,
		  select: function(event, ui) {
		  	$('#tags').val(ui.item.value);
	
		  }
	
		});
	
	});

</script>