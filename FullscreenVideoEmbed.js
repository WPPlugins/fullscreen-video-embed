jQuery('.vidfullscreen-video-embedlaceholder, .fullscreen-video-embed__button').on('click', function() {
  var height = jQuery(".fullscreen-video-embed__placeholder").height();
  if ( !jQuery('#fullscreen-video-embed-player').length ) {
    var video = '<iframe id="fullscreen-video-embed-player" style="opacity: 1; visibility: visible; height: ' + height + 'px;" src="' + jQuery('.fullscreen-video-embed__placeholder').attr('data-video') + '" frameborder="0" allowfullscreen wmode="opaque"></iframe>';
    jQuery('.fve-titles').hide();
    jQuery(video).insertAfter( jQuery('.fullscreen-video-embed__placeholder') );
    jQuery('.fullscreen-video-embed__button').addClass('is-playing');
  } else {
    jQuery('.fullscreen-video-embed__button').removeClass('is-playing');
    jQuery('#fullscreen-video-embed-player').remove();
    jQuery('.fve-titles').show();
  }
});
