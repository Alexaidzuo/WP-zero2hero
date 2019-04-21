(function ($) { // (Function ($){ }); + function.php - array('jquery');
/* Button collapse div with more images on Gallery Section */
  $(document).ready(function() {
    $("#btn-collapse").click(function() {
        $("#collapse").toggleClass('hidden show');
        if ($("#btn-collapse").text() == "Pogledaj više") {
            $("#btn-collapse").html("Zatvori");
            $('html, body').animate({
                scrollTop: $("#collapse").offset().top
            }, 500);
        }
        else {
            $("#btn-collapse").text("Pogledaj više");
            $('html, body').animate({
                scrollTop: $(".gallery h2").offset().top
            }, 500);
        }
    });
    /* HAMBURGER MENU */
    $('.menu-toggle').on("click", function() {
      $(this).toggleClass('open');
      $('nav ul').toggleClass('opening');
      $('.nav').toggleClass('navigation-menu');
      if ($("nav").hasClass("navigation-menu")) {
        $('body').addClass('disable-scroll')
      } else {
        $('body').removeClass('disable-scroll')
      }
    });

    $('ul li a').on("click", function() {
      $('.nav').removeClass('navigation-menu')
      $('.menu-toggle').removeClass('open');
      $('nav ul').removeClass('opening');
      $('body').removeClass('disable-scroll')
    });
  });

  // /* LIGHTBOX FOR GALLERY */
  $(function(){
    var $gallery = $('#gallery a').simpleLightbox();

    $gallery.on('show.simplelightbox', function(){
      console.log('Requested for showing');
    })
    .on('shown.simplelightbox', function(){
      console.log('Shown');
    })
    .on('close.simplelightbox', function(){
      console.log('Requested for closing');
    })
    .on('closed.simplelightbox', function(){
      console.log('Closed');
    })
    .on('change.simplelightbox', function(){
      console.log('Requested for change');
    })
    .on('next.simplelightbox', function(){
      console.log('Requested for next');
    })
    .on('prev.simplelightbox', function(){
      console.log('Requested for prev');
    })
    .on('nextImageLoaded.simplelightbox', function(){
      console.log('Next image loaded');
    })
    .on('prevImageLoaded.simplelightbox', function(){
      console.log('Prev image loaded');
    })
    .on('changed.simplelightbox', function(){
      console.log('Image changed');
    })
    .on('nextDone.simplelightbox', function(){
      console.log('Image changed to next');
    })
    .on('prevDone.simplelightbox', function(){
      console.log('Image changed to prev');
    })
    .on('error.simplelightbox', function(e){
      console.log('No image found, go to the next/prev');
      console.log(e);
    });
  });

  /* TESTOMONIALS SLIDER */
  $('.testimonial-slider').slick({
    autoplay: true,
    speed: 300,
    arrows: false,
    dots: true,
    pauseOnFocus: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
        }
      }
    ]
  });

  /* Modal MailChimp */
  $('.cta').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    $('.modal').addClass('opened');
  });
  $('.modal button.closed').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    $('.modal').removeClass('opened');
  });
})(jQuery);