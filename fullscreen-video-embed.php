<?php
/*
   Plugin Name: Fullscreen Video Embed
   Plugin URI: http://wordpress.org/extend/plugins/fullscreen-video-embed/
   Version: 0.10
   Author: <a href="https://designman.io">Designman</a>
   Description: Full width videos with placeholders
   Text Domain: fullscreen-video-embed
   License: GPLv3
  */

  function fsve_scripts() {
      wp_enqueue_style( 'fsveStyle', plugins_url('fullscreen-video-embed.css', __FILE__) );
      wp_enqueue_script( 'fsveJq', plugins_url('FullscreenVideoEmbed.js', __FILE__), array(), '1.0.0', true );
  }
  add_action( 'wp_enqueue_scripts', 'fsve_scripts' );

  //2000 x 600 is a good placeholder size
  // [fullscreen_video youtubeId="foo-value" placeholderImage="site.com/placeholder.jpg" title="My fancy video" subtitle="click to start" height="400"]
  function fsve_shortcode( $atts ) {
      $a = shortcode_atts( array(
          'youtube_id' => 'O7EcT5YzKhQ',
          'placeholder_image' => 'http://lorempixel.com/400/200',
          'title' => '',
          'subtitle' =>'',
          'height' => '350'
      ), $atts );

      return '<section class="fullscreen-video-embed" style="height: ' . esc_attr($a['height']) . 'px;">
      <div style="background-image: url(' . esc_attr($a['placeholder_image']) .
        '); height: ' . esc_attr($a['height']) . 'px;" data-video="https://youtube.com/embed/' . esc_attr($a['youtube_id']) .
      '?autoplay=1" title="Play Video" class="fullscreen-video-embed__placeholder"></div>
      <a class="fullscreen-video-embed__button"></a>
      <div class="fve-titles">
      <h2 class="fve-title">' . esc_attr($a['title']) . '</h2><h3 class="fve-subtitle">' . esc_attr($a['subtitle']) . '</h3>
      </div>
      </section>';
  }
  add_shortcode( 'fullscreen_video', 'fsve_shortcode' );
