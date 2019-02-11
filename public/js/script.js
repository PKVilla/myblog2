new WOW().init();

$(document).ready(function() {
    var offset = 250;
    var duration = 500;
   $(window).scroll(function() {
      if($(this).scrollTop() > offset) {
        $('.back_to_top').fadeIn(duration);
      } else {
       $('.back_to_top').fadeOut(duration);
      }
    });

   $('.back_to_top').click(function(event) {
      // event.preventDefault();
    $('html').animate({scrollTop: 0}, duration);
      // return false;
    });
  });



var $owl = $('.owl-carousel');

$owl.children().each( function( index ) {
  $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
});

$owl.owlCarousel({ 
  center: true,
  loop: true,
  autoplay: true,
  items: 5,
});

$(document).on('click', '.owl-item>div', function() {
  $owl.trigger('to.owl.carousel', $(this).data( 'position' ) );
});


var postId = 0;
$('.like').on('click', function(event) {

    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like it' : 'Like' : event.target.innerText == 'Dislike' ? 'why?' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});


$(".imagepar").text(function(index, currentText) {
    return currentText.substr(0, 200) + ".........";
});

$(document).ready(function(){
  $('#replytocomment').validate({
    rules: {
      comment_body: {
        required: true,
        minlength: 5
      }
    },
      error: function(error, element){
        element.attr("placeholder", error.text());
      }
  });
});