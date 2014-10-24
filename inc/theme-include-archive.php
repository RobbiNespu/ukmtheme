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
 * @link http://codex.wordpress.org/Function_Reference/is_post_type_archive
 *
 */

// appreciation

add_filter( 'template_include', 'archive_appreciation_page_template', 99 );

  function archive_appreciation_page_template( $template_appreciation ) {

    if ( is_post_type_archive( 'appreciation' )  ) {

      $new_template_appreciation = get_template_directory() . '/templates/archive-appreciation.php';

      if ( '' != $new_template_appreciation ) {

        return $new_template_appreciation ;

      }

    }

    return $template_appreciation;

  }

// event

add_filter( 'template_include', 'archive_event_page_template', 99 );

  function archive_event_page_template( $template_event ) {

    if ( is_post_type_archive( 'event' )  ) {

      $new_template_event = get_template_directory() . '/templates/archive-event.php';

      if ( '' != $new_template_event ) {

        return $new_template_event ;

      }

    }

    return $template_event;

  }

// expertise

add_filter( 'template_include', 'archive_expertise_page_template', 99 );

  function archive_expertise_page_template( $template_expertise ) {

    if ( is_post_type_archive( 'expertise' )  ) {

      $new_template_expertise = get_template_directory() . '/templates/archive-expertise.php';

      if ( '' != $new_template_expertise ) {

        return $new_template_expertise ;

      }

    }

    return $template_expertise;

  }

// faq

add_filter( 'template_include', 'archive_faq_page_template', 99 );

  function archive_faq_page_template( $template_faq ) {

    if ( is_post_type_archive( 'faq' )  ) {

      $new_template_faq = get_template_directory() . '/templates/archive-faq.php';

      if ( '' != $new_template_faq ) {

        return $new_template_faq ;

      }

    }

    return $template_faq;

  }

// gallery

add_filter( 'template_include', 'archive_gallery_page_template', 99 );

  function archive_gallery_page_template( $template_gallery ) {

    if ( is_post_type_archive( 'gallery' )  ) {

      $new_template_gallery = get_template_directory() . '/templates/archive-gallery.php';

      if ( '' != $new_template_gallery ) {

        return $new_template_gallery ;

      }

    }

    return $template_gallery;

  }

// news

add_filter( 'template_include', 'archive_news_page_template', 99 );

  function archive_news_page_template( $template_news ) {

    if ( is_post_type_archive( 'news' )  ) {

      $new_template_news = get_template_directory() . '/templates/archive-news.php';

      if ( '' != $new_template_news ) {

        return $new_template_news ;

      }

    }

    return $template_news;

  }

// press

add_filter( 'template_include', 'archive_press_page_template', 99 );

  function archive_press_page_template( $template_press ) {

    if ( is_post_type_archive( 'press' )  ) {

      $new_template_press = get_template_directory() . '/templates/archive-press.php';

      if ( '' != $new_template_press ) {

        return $new_template_press ;

      }

    }

    return $template_press;

  }

// publication

add_filter( 'template_include', 'archive_publication_page_template', 99 );

  function archive_publication_page_template( $template_publication ) {

    if ( is_post_type_archive( 'publication' )  ) {

      $new_template_publication = get_template_directory() . '/templates/archive-publication.php';

      if ( '' != $new_template_publication ) {

        return $new_template_publication ;

      }

    }

    return $template_publication;

  }

// Staff

add_filter( 'template_include', 'archive_staff_page_template', 99 );

  function archive_staff_page_template( $template_staff ) {

    if ( is_post_type_archive( 'staff' )  ) {

      $new_template_staff = get_template_directory() . '/templates/archive-staff.php';

      if ( '' != $new_template_staff ) {

        return $new_template_staff ;

      }

    }

    return $template_staff;

  }

// video

add_filter( 'template_include', 'archive_video_page_template', 99 );

  function archive_video_page_template( $template_video ) {

    if ( is_post_type_archive( 'video' )  ) {

      $new_template_video = get_template_directory() . '/templates/archive-video.php';

      if ( '' != $new_template_video ) {

        return $new_template_video ;

      }

    }

    return $template_video;

  }

?>