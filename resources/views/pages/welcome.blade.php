@extends('layouts.template')


@section('content')
	

	<hr class="container line animated slideInLeft">
{{-- <div class="container caro"> --}}
  <div class="owl-carousel">
  @foreach($posts as $post)
    <div><img class="img-fluid" src="{{$post->postimg_path}}" alt=""></div>
  @endforeach
  </div>

{{-- social media icons --}}
  <div class="social_media position-fixed d-none d-lg-block d-md-none d-lg-block">
    <ul>
      <li><a href=""><i class="fab fa-facebook"></i></a></li>
      <li><a href=""><i class="fab fa-linkedin"></i></a></li>
      <li><a href=""><i class="fab fa-instagram"></i></a></li>
      <li><a href=""><i class="fab fa-google-plus-square"></i></a></li>  
    </ul>
  </div>

	<hr class="container line animated slideInright">

  {{-- body --}}
  <div class="container posts mt-5">
      <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-4">
        @foreach($posts as $post)
  			<div class="card mb-5">
          <div class="card-body">
  				<h5 class="text-center font-italic text-muted">{{$post->created_at->diffForHumans()}}</h5>
  				<h3 class="text-center animated jackInTheBox wow">{{$post->posttitle}}</h3>
  				<div class="text-center">
  					<img class="img-fluid" src="{{$post->postimg_path}}" alt="Image is not available">
  				</div>
  				<p class="text-center lead text-justify imagepar">{{$post->postdescription}}</p>
           <h6><a class="readmore text-muted" href="/perblog/{{$post->id}}">Read more...</a></h6>
           <div class="interaction">
              <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
              <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
           </div>
  			</div>
      </div>
    @endforeach		
    </div>
  </div>
  </div>
<a class="back_to_top" href=""><img class="backtotop wow animated jackInTheBox d-none d-lg-block d-md-none d-lg-block" src="/images/arrow.png" alt="no image"></a>

<script>
  var token = '{{ Session::token() }}';
  var urlLike = '{{ route('like') }}';
</script>
@endsection