<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/template_include
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/single_template
 *
 */


// Appreciation

add_filter( 'single_template', 'get_appreciation_post_type_template' );

  function get_appreciation_post_type_template($single_appreciation_template) {

    global $post;

      if ($post->post_type == 'appreciation') {

        $single_appreciation_template = get_template_directory() . '/templates/single-appreciation.php';
      }
      
      return $single_appreciation_template;

  }

// Events

add_filter( 'single_template', 'get_event_post_type_template' );

  function get_event_post_type_template($single_event_template) {

    global $post;

      if ($post->post_type == 'event') {

        $single_event_template = get_template_directory() . '/templates/single-event.php';

      }

      return $single_event_template;

  }

// Expertise

add_filter( 'single_template', 'get_expertise_post_type_template' );

  function get_expertise_post_type_template($single_expertise_template) {

    global $post;

      if ($post->post_type == 'expertise') {

        $single_expertise_template = get_template_directory() . '/templates/single-expertise.php';

      }

      return $single_expertise_template;

  }

// FAQ

add_filter( 'single_template', 'get_faq_post_type_template' );

  function get_faq_post_type_template($single_faq_template) {

    global $post;

      if ($post->post_type == 'faq') {

        $single_faq_template = get_template_directory() . '/templates/single-faq.php';

      }

      return $single_faq_template;

  }

// Gallery

add_filter( 'single_template', 'get_gallery_post_type_template' );

  function get_gallery_post_type_template($single_gallery_template) {

    global $post;

      if ($post->post_type == 'gallery') {

        $single_gallery_template = get_template_directory() . '/templates/single-gallery.php';

      }

      return $single_gallery_template;

  }

// News

add_filter( 'single_template', 'get_news_post_type_template' );

  function get_news_post_type_template($single_news_template) {

    global $post;

      if ($post->post_type == 'news') {

        $single_news_template = get_template_directory() . '/templates/single-news.php';

      }

      return $single_news_template;

  }

// Publication

add_filter( 'single_template', 'get_publication_post_type_template' );

  function get_publication_post_type_template($single_publication_template) {

    global $post;

      if ($post->post_type == 'publication') {

        $single_publication_template = get_template_directory() . '/templates/single-publication.php';

      }

      return $single_publication_template;

  }

// Staff Directory

add_filter( 'single_template', 'get_staff_post_type_template' );

  function get_staff_post_type_template($single_staff_template) {

    global $post;

      if ($post->post_type == 'staff') {

        $single_staff_template = get_template_directory() . '/templates/single-staff.php';

      }

      return $single_staff_template;

  }

// Video

add_filter( 'single_template', 'get_video_post_type_template' );

  function get_video_post_type_template($single_video_template) {

    global $post;

      if ($post->post_type == 'video') {

        $single_video_template = get_template_directory() . '/templates/single-video.php';

      }

      return $single_video_template;

  }

?>