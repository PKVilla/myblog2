@extends('layouts.template')

@section('content')

@if(Session::has('successmessage'))
		<div class="alert alert-success">
				{{ Session::get('successmessage')}}		
		</div>
	@endif
	<!-- validation error -->
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul class="list-unstyled">
			            @foreach ($errors->all() as $error) <!-- will print the error -->
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>	
			@endif

		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="text-center p-2">Add New Post</h1>
					<form action="/addpost" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="title">Title</label>
							<input class="upload form-control" type="text" name="posttitle" id="posttitle"></input>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="upload form-control" type="text" name="postdescription" id="postdescription" rows="5"></textarea>
						</div>
						 <div class="form-group">
							<label>Upload Image:</label>
						    <input type="file" name="postimg_path" class="upload form-control-file btn btn-secondary" id="postimage">
						  </div>
						  <button class="btn btn-success mb-3">Add Post</button>
					</form>
				</div>
			</div>
		</div>
	

@endsection