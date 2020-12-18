
$(document).ready(function(){

    $(".image-popup").magnificPopup({
        type: "image",
        removalDelay: 300,
        mainClass: "mfp-with-zoom",
        gallery: {
            enabled: true,
        },
        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it

            duration: 300, // duration of the effect, in milliseconds
            easing: "ease-in-out", // CSS transition easing function

            opener: function (openerElement) {
                return openerElement.is("img")
                    ? openerElement
                    : openerElement.find("img");
            },
        },
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });


    var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  
  $(".next").click(function(){
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //Add Class Active
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
  step: function(now) {
  // for making fielset appear animation
  opacity = 1 - now;
  
  current_fs.css({
  'display': 'none',
  'position': 'relative'
  });
  next_fs.css({'opacity': opacity});
  },
  duration: 600
  });
  });
  
  $(".previous").click(function(){
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //Remove class active
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show();
  
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
  step: function(now) {
  // for making fielset appear animation
  opacity = 1 - now;
  
  current_fs.css({
  'display': 'none',
  'position': 'relative'
  });
  previous_fs.css({'opacity': opacity});
  },
  duration: 600
  });
  });
  
  $('.radio-group .radio').click(function(){
  $(this).parent().find('.radio').removeClass('selected');
  $(this).addClass('selected');
  });
  
  $(".submit").click(function(){
  return false;
  })
  
  });

  $("#show-btn").click(function(){
    $(".demo-ans").addClass('wow animated slideInUp');
    $(".demo-ans").toggle();
  });

  $(".testimonial").owlCarousel({
    loop: true,
    margin: 20,
    smartSpeed: 1400,
    autoplay: true,
    nav: false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        1000:{
            items:2
        }
    }
});

$(".team").owlCarousel({
  loop: true,
  margin: 20,
  smartSpeed: 1400,
  autoplay: true,
  nav: false,
  dots: true,
  responsive:{
      0:{
          items:1
      },
      1000:{
          items:4
      }
  }
});