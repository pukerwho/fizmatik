if ($('.animate-puk').length > 0) {
  $(window).scroll(function() {
    $('.animate-puk').each(function(){
      var windowpos = $(window).scrollTop();
      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();
      var animateTop = $(this).offset().top;
      var animateBottom = animateTop + $(this).outerHeight();
      var animateHeight = $(window).outerHeight();
      var animateEffect = $(this).attr('data-effect');
      var animateDelay = $(this).attr('data-delay');
      if (animateBottom > viewportTop && animateTop < viewportBottom) {
        $(this).addClass('effect-'+animateEffect);
        $(this).css({'transition-delay': animateDelay})
      }
    })
  })
}

function onEntry(entry) {
  entry.forEach(change => {
    if (change.isIntersecting) {
      change.target.classList.add('treba-show');
    }
  });
}

let options = {
  threshold: [0.5] };
let observer = new IntersectionObserver(onEntry, options);
let elements = document.querySelectorAll('.treba-animate');

for (let elm of elements) {
  observer.observe(elm);
}