jQuery(function($) {
  $('.menu-opener').on('click', function(e) {
    e.preventDefault();
    $('body').toggleClass('menu-active');
  })
});
