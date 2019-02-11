@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error) <!-- will print the error -->
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
@endif
 @foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form id="replytocomment" method="post" action="{{ route('reply.add') }}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="comment_body" class="upload form-control" />
                <input type="hidden" name="post_id" class="upload form-control" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" class="upload form-control" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Reply" />
            </div>
        </form>
        @include('pages.comment_replies', ['comments' => $comment->replies])
    </div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $('#replytocomment').validate({
    rules: {
      comment_body: {
        required: true,
        max-lenght: 500
      }
    },
      errorPlacement: function(error, element){
        element.attr("placeholder",error.text());
      },
      submitHandler: function (form) { // for demo
            // alert('valid form submitted'); // for demo
            return false; // for demo
        }
  });
});
</script>
@endforeach
