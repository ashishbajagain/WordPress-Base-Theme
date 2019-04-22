/*------------------------------------------------------*/
// find highest box and set height on all
/*------------------------------------------------------*/
jQuery(function($) {
  if ($(window).width() < 768) {
    $('.heightFixer').height('auto');
  } else {
    fixHeight('.heightFixer');
  }
});

function fixHeight(elem) {
  var maxHeight = 0;
  jQuery(elem).css('height', 'auto');
  jQuery(elem).each(function() {
    if (jQuery(this).height() > maxHeight) {
      maxHeight = jQuery(this).height();
    }
  });
  jQuery(elem).height(maxHeight);
}

jQuery(window).resize(function() {
  if (jQuery(window).width() < 768) {
    jQuery('.heightFixer').height('auto');
  } else {
    fixHeight('.heightFixer');
  }
});