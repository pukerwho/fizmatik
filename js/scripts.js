$('.mobile-menu').on('click', function(e) {
  e.preventDefault;
  $(this).toggleClass('mobile-menu__active');
  $('.mobile-cover').toggleClass('mobile-cover__open');
  $('body').toggleClass('modal-open');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 56) {
    $('header').addClass('header__fixed')
  } else {
    $('header').removeClass('header__fixed')
  }
});

$('.menu-item-has-children > a').on('click', function(e){
  e.preventDefault();
});

if ($(document).width() > 640) {
  $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9,
  })
};

if ($(document).width() < 640) {
  $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 4,
  })
};

if ($('#teachers_subject_response').length > 0){
  var teachersHeight = $('#teachers_subject_response').height();
  $('.balls__teachers-red').css({'top':'calc('+ teachersHeight +'px - 620px)'});
  $('.balls__teachers-bigblue').css({'top':'calc('+ teachersHeight +'px - 350px)'});
  $('.balls__teachers-smallblue').css({'top':'calc('+ teachersHeight +'px - 640px)'});
  $('.balls__teachers-greencircle').css({'top':'calc('+ teachersHeight +'px - 670px)'});
}

if ($('.events__page-grid').length > 0){
  var eventsHeight = $('.events__page-grid').height();
  var bodyHeight = $('body').height();
  $('.balls__events-greentwo').css({'top':'calc('+ eventsHeight +'px + 175px)'});
  $('.balls__events-bigbluetwo').css({'top': 'calc('+ bodyHeight +'px - 250px)'});
}

if ($('.subjects').length > 0){
  var teachersHeight = $('.subjects').height();
  $('.balls__subjects-bluetwo').css({'top':'calc('+ teachersHeight +'px / 1.13)'});
  $('.balls__subjects-red').css({'top':'calc('+ teachersHeight +'px / 1.07)'});
  $('.balls__subjects-yellow').css({'top':'calc('+ teachersHeight +'px / 1.3)'});
}

if ($('.page-template-tpl_main').length > 0){
  var homeHeight = $('.page-template-tpl_main').height();
  $('.balls__home-yellowone').css({'top':'calc('+ homeHeight +'px / 6)'});
  $('#balls__home-greenone').css({'top':'calc('+ homeHeight +'px / 4.5)'});
  $('#balls__home-blue').css({'top':'calc('+ homeHeight +'px / 4)'});
  $('#balls__home-red').css({'top':'calc('+ homeHeight +'px / 3.25)'});
}

//Parallax
var balls_home_yellowone = document.querySelector('#balls__home-yellowone');
var parallaxHomeYellowOne = new Parallax(balls_home_yellowone);
var balls_home_greenone = document.querySelector('#balls__home-greenone');
var parallaxHomeGreenOne = new Parallax(balls_home_greenone);
var balls_home_blue = document.querySelector('#balls__home-blue');
var parallaxHomeBlue = new Parallax(balls_home_blue);
var balls_home_red = document.querySelector('#balls__home-red');
var parallaxHomeRed = new Parallax(balls_home_red);
var balls_home_greentwo = document.querySelector('#balls__home-greentwo');
var parallaxHomeGreenTwo = new Parallax(balls_home_greentwo);
var balls_home_yellowtwo = document.querySelector('#balls__home-yellowtwo');
var parallaxHomeYellowTwo = new Parallax(balls_home_yellowtwo);