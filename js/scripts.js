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


//Filter Open List
function openFilterItemList(num){
  let itemList = document.querySelector('.fizmat__item-list[data-listId=' + num);
  itemList.classList.toggle('fizmat__item-list__open');
}

let filterItemTitle = document.querySelectorAll('.fizmat__item-title');
for (let item of filterItemTitle) {
  item.addEventListener('click', function(){
    let num = this.getAttribute('data-itemId');
    openFilterItemList(num);
  }) 
}

//скрыть все фильтры
$(document).click(function(e) {  
  itemData = e.target.dataset.itemid;
  eValue = e.target.classList.value;
  eTarget = $(e.target.tagName);
  checkboxClick = eValue.indexOf('fizmat-checkbox');
  if ('fizmat__item-title' === e.target.classList.value) {
    eValue = e.target.classList.value;
    e.stopPropagation();
  } else if (checkboxClick != -1 || eTarget.is('label')) {
    e.stopPropagation();
  } else {
    find_lists = $(this).find('.fizmat__item-list');
    find_lists.removeClass('fizmat__item-list__open'); 
  }
})
//Filter Close List
// window.addEventListener('click', function(e){
//   let itemList = document.querySelectorAll('.fizmat__item-list');
//   let singleItemTitle = document.querySelector('.fizmat__item-title');
//   for (let inner of itemList) {
//     console.log(inner);
//     console.log(e.target);
//     console.log(singleItemTitle);
//     if (inner.contains(e.target) || e.target === singleItemTitle ) {
//       console.log('in')
//     } else {
//       console.log('out');
//     }
//   }
// });

//Filter Checkbox Clean
function uncheckAll() {
  var inputs = document.querySelectorAll('.fizmat-checkbox');
  for(var i = 0; i < inputs.length; i++) {
    inputs[i].checked = false;
  }
}
let cleanButton = document.querySelector('.fizmat__clean');
if (cleanButton) {
  cleanButton.addEventListener('click', uncheckAll);  
}

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

window.eventsPageGrid = function() {
  var eventsFourItemHeight = $('.events__page-item:nth-of-type(4n)').height();
  $('.events__page-item:nth-of-type(5n) .events__blocks-img').css({'height': 'calc('+ eventsFourItemHeight +'px + 242px)'}); 
}

if ($('.events__page-grid').length > 0){
  var eventsHeight = $('.events__page-grid').height();
  var bodyHeight = $('body').height();
  $('#balls__events-greentwo').css({'top':'calc('+ eventsHeight +'px + 175px)'});
  $('#balls__events-bigbluetwo').css({'top': 'calc('+ bodyHeight +'px / 1.3)'});
}

if ($('.subjects').length > 0){
  var subjectsHeight = $('.subjects').height();
  $('#balls__subjects-bluetwo').css({'top':'calc('+ subjectsHeight +'px / 1.13)'});
  $('#balls__subjects-red').css({'top':'calc('+ subjectsHeight +'px / 1.07)'});
  $('#balls__subjects-yellow').css({'top':'calc('+ subjectsHeight +'px / 1.3)'});
}

if ($('.page-template-tpl_main').length > 0){
  var homeHeight = $('.page-template-tpl_main').height();
  $('.balls__home-yellowone').css({'top':'calc('+ homeHeight +'px / 6)'});
  $('#balls__home-greenone').css({'top':'calc('+ homeHeight +'px / 4.5)'});
  $('#balls__home-blue').css({'top':'calc('+ homeHeight +'px / 4)'});
  $('#balls__home-red').css({'top':'calc('+ homeHeight +'px / 3.25)'});
}

if ($(document).width() > 992) {
  if ($('.post-type-archive-events .events__page-grid').length > 0) {
    eventsPageGrid();
  }
}

//Parallax
var balls_home_yellowone = document.querySelector('#balls__home-yellowone');
if (balls_home_yellowone){
  var parallaxHomeYellowOne = new Parallax(balls_home_yellowone);  
}

var balls_home_greenone = document.querySelector('#balls__home-greenone');
if (balls_home_greenone) {
  var parallaxHomeGreenOne = new Parallax(balls_home_greenone);  
}

var balls_home_blue = document.querySelector('#balls__home-blue');
if (balls_home_blue) {
  var parallaxHomeBlue = new Parallax(balls_home_blue);  
}

var balls_home_red = document.querySelector('#balls__home-red');
if (balls_home_red) {
  var parallaxHomeRed = new Parallax(balls_home_red);
}
var balls_home_greentwo = document.querySelector('#balls__home-greentwo');
if (balls_home_greentwo) {
  var parallaxHomeGreenTwo = new Parallax(balls_home_greentwo);  
}

var balls_home_yellowtwo = document.querySelector('#balls__home-yellowtwo');
if (balls_home_yellowtwo) {
  var parallaxHomeYellowTwo = new Parallax(balls_home_yellowtwo);  
}

var balls_one_smallred = document.querySelector('#balls__one-smallred');
if (balls_one_smallred) {
  var parallaxBallsOneSmallRed = new Parallax(balls_one_smallred);  
}

var balls_one_bigyellow = document.querySelector('#balls__one-bigyellow');
if (balls_one_bigyellow) {
  var parallaxBallsOneBigYellow = new Parallax(balls_one_bigyellow);  
}

var balls_one_smallblue = document.querySelector('#balls__one-smallblue');
if (balls_one_smallblue) {
  var parallaxBallsOneSmallBlue = new Parallax(balls_one_smallblue);  
}

var balls_one_bigblue = document.querySelector('#balls__one-bigblue');
if (balls_one_bigblue) {
  var parallaxBallsOneBigBlue = new Parallax(balls_one_bigblue);  
}

var balls_teachers_yellow = document.querySelector('#balls__teachers-yellow');
if (balls_teachers_yellow) {
  var parallaxBallsTeachersYellow = new Parallax(balls_teachers_yellow);  
}

var balls_teachers_greencircle = document.querySelector('#balls__teachers-greencircle');
if (balls_teachers_greencircle) {
  var parallaxBallsTeachersGreenCircle = new Parallax(balls_teachers_greencircle);  
}

var balls_teachers_smallblue = document.querySelector('#balls__teachers-smallblue');
if (balls_teachers_smallblue) {
  var parallaxBallsTeachersSmallBlue = new Parallax(balls_teachers_smallblue);  
}

var balls_teachers_bigblue = document.querySelector('#balls__teachers-bigblue');
if (balls_teachers_bigblue) {
  var parallaxBallsTeachersBigBlue = new Parallax(balls_teachers_bigblue);  
}

var balls_teachers_redcircle = document.querySelector('#balls__teachers-redcircle');
if (balls_teachers_redcircle) {
  var parallaxBallsTeachersRedCirlce = new Parallax(balls_teachers_redcircle);  
}

var balls_events_yellow = document.querySelector('#balls__events-yellow');
if (balls_events_yellow) {
  var parallaxBallsEventsYellow = new Parallax(balls_events_yellow);  
}

var balls_events_red = document.querySelector('#balls__events-red');
if (balls_events_red) {
  var parallaxBallsEventsRed = new Parallax(balls_events_red);  
}

var balls_events_bigblueone = document.querySelector('#balls__events-bigblueone');
if (balls_events_bigblueone) {
  var parallaxBallsEventsBigBlueOne = new Parallax(balls_events_bigblueone);  
}

var balls_events_greenone = document.querySelector('#balls__events-greenone');
if (balls_events_greenone) {
  var parallaxBallsEventsGreenOne = new Parallax(balls_events_greenone);  
}

var balls_events_greentwo = document.querySelector('#balls__events-greentwo');
if (balls_events_greentwo) {
  var parallaxBallsEventsGreenTwo = new Parallax(balls_events_greentwo);  
}

var balls_events_bigbluetwo = document.querySelector('#balls__events-bigbluetwo');
if (balls_events_bigbluetwo) {
  var parallaxBallsEventsBigBlueTwo = new Parallax(balls_events_bigbluetwo);  
}

var balls_contact_yellow = document.querySelector('#balls__contact-yellow');
if (balls_contact_yellow) {
  var parallaxBallsEventsBigBlueTwo = new Parallax(balls_contact_yellow);  
}

var balls_subjects_blueone = document.querySelector('#balls__subjects-blueone');
if (balls_subjects_blueone) {
  var parallaxBallsSubjectsBlueOne = new Parallax(balls_subjects_blueone);  
}

var balls_subjects_bluetwo = document.querySelector('#balls__subjects-bluetwo');
if (balls_subjects_bluetwo) {
  var parallaxBallsSubjectsBlueTwo = new Parallax(balls_subjects_bluetwo);  
}

var balls_subjects_red = document.querySelector('#balls__subjects-red');
if (balls_subjects_red) {
  var parallaxBallsSubjectsRed = new Parallax(balls_subjects_red);  
}

var balls_subjects_yellow = document.querySelector('#balls__subjects-yellow');
if (balls_subjects_yellow) {
  var parallaxBallsSubjectsYellow = new Parallax(balls_subjects_yellow);  
}

var hero_subject_img_inner = document.querySelector('#hero__subject-img__inner');
if (hero_subject_img_inner) {
  var parallaxHeroSubjectImgInner = new Parallax(hero_subject_img_inner);  
}