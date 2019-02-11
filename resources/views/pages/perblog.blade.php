@extends('layouts.template')


@section('content')

@if ($errors->any())
          <div class="alert alert-danger">
              <ul class="list-unstyled">
                  @foreach ($errors->all() as $error) <!-- will print the error -->
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>  
      @endif

<div class="social_media position-fixed d-none d-lg-block d-md-none d-lg-block">
    <ul>
      <li><a href=""><i class="fab fa-facebook"></i></a></li>
      <li><a href=""><i class="fab fa-linkedin"></i></a></li>
      <li><a href=""><i class="fab fa-instagram"></i></a></li>
      <li><a href=""><i class="fab fa-google-plus-square"></i></a></li>  
    </ul>
  </div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
			<div class="card">
				<div class="card-body">
				<h5 class="text-center font-italic text-muted">{{$perblogs->created_at->diffForHumans()}}</h5>
  				<h3 class="text-center animated jackInTheBox wow">{{$perblogs->posttitle}}</h3>
  				<div class="text-center">
  				<img class="img-fluid" src="/{{$perblogs->postimg_path}}" alt="Image is not available">
  				</div>
  				<p class="text-center lead text-justify perblogtext">{{$perblogs->postdescription}}</p>
  				{{-- <a href="#" class="like btn btn-primary">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>
  				<a href="#" class="like btn btn-primary">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a> --}}
          {{-- <div class="col-lg-6"> --}}
                    <hr />
          <h5>Add comment</h5>
            <form method="post" action="{{ route('comment.add') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="comment_body" class="upload form-control" />
                    <input type="hidden" name="post_id" value="{{$perblogs->id}}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Comment" />
                </div>
            </form>
          <h4>Comments</h4>
          @include('pages.comment_replies', ['comments' => $perblogs->comments, 'post_id' => $perblogs->id])
            {{-- </div> --}}
				</div>
			</div>
		</div>
	</div>
	</div>
<a class="back_to_top" href=""><img class="backtotop wow animated jackInTheBox d-none d-lg-block d-md-none d-lg-block" src="/images/arrow.png" alt="no image"></a>
{{-- <script>
	var token = '{{Session::token()}}';
	var urlLike = '{{route('/like')}}';
</script> --}}
@endsection