@extends('layouts.template')


@section('content')

@if ($errors->any())
    <div  class="alert alert-danger">
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
				<div class="card edit">
					<div class="card-body">
						<h4 class="text-center">Edit Post</h4>
						<form action="/editpost/{{$postedit->id}}/edit" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							<div class="form-group">
								<label for="post_title">Title</label>
								<input class="upload form-control" type="text" name="post_title" value="{{$postedit->title}}">
							</div>
							<div class="form-group">
								<label for="post_description">Description</label>
								<textarea class="upload form-control" type="text" name="post_description" value="{{$postedit->postdescription}}" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label for="post_title">Image</label>
								<input class="upload form-control" type="file" name="post_img_path"> 
							</div>
							<button class="btn btn-info" type="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection