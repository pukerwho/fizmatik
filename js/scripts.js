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

var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("select-wrapper");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

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

if ($(document).width() > 992) {
  if ($('.post-type-archive-events .events__page-grid').length > 0) {
    var eventsFourItemHeight = $('.events__page-item:nth-of-type(4n)').height();
    console.log(eventsFourItemHeight);
    $('.events__page-item:nth-of-type(5n) .events__blocks-img').css({'height': 'calc('+ eventsFourItemHeight +'px + 242px)'}); 
  }
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