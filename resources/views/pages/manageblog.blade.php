@extends('layouts.template')


@section('content')

	<div class="container">
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Title</th>
						<th class="text-center">Description</th>
						<th class="text-center">Image</th>
						<th class="text-center">Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>{{$post->posttitle}}</td>
						<td>{{$post->postdescription}}</td>
						<td>{{$post->postimg_path}}</td>
						<td>{{$post->created_at->diffForHumans()}}</td>
						<td class="text-center">
							<a href="/editpost/{{$post->id}}/edit"><button class="btn btn-secondary">EDIT</button></a> 
							<form method="POST" action="/deletepost/{{$post->id}}/delete">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<button type="submit" class="btn btn-danger">DELETE</button>
							</form>	
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
