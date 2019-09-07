$('.toogle-menu').on('click', function(e) {
  e.preventDefault;
  $(this).toggleClass('toogle-menu_active');
  $('.slide-menu').toggleClass('slide-menu_active');
  $('.menu li').toggleClass('animate-left');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 56) {
    $('header').addClass('header__fixed')
  } else {
    $('header').removeClass('header__fixed')
  }
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