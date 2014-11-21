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

// News

add_filter( 'template_include', 'taxonomy_news_page_template', 99 );

  function taxonomy_news_page_template( $template_newscat ) {

    if ( is_tax( 'newscat' )  ) {

      $new_template_newscat = get_template_directory() . '/templates/taxonomy-newscat.php';

      if ( '' != $new_template_newscat ) {

        return $new_template_newscat ;

      }

    }

    return $template_newscat;

  }

// Staff Department

add_filter( 'template_include', 'taxonomy_department_page_template', 99 );

  function taxonomy_department_page_template( $template_department ) {

    if ( is_tax( 'department' )  ) {

      $new_template_department = get_template_directory() . '/templates/taxonomy-department.php';

      if ( '' != $new_template_department ) {

        return $new_template_department ;

      }

    }

    return $template_department;

  }

// Staff Position

add_filter( 'template_include', 'taxonomy_position_page_template', 99 );

  function taxonomy_position_page_template( $template_position ) {

    if ( is_tax( 'position' )  ) {

      $new_template_position = get_template_directory() . '/templates/taxonomy-position.php';

      if ( '' != $new_template_position ) {

        return $new_template_position ;

      }

    }

    return $template_position;

  }

// FAQ Category

add_filter( 'template_include', 'taxonomy_faqcat_page_template', 99 );

  function taxonomy_faqcat_page_template( $template_faqcat ) {

    if ( is_tax( 'faqcat' )  ) {

      $new_template_faqcat = get_template_directory() . '/templates/taxonomy-faqcat.php';

      if ( '' != $new_template_faqcat ) {

        return $new_template_faqcat ;

      }

    }

    return $template_faqcat;

  }

// Gallery Category

add_filter( 'template_include', 'taxonomy_galcat_page_template', 99 );

  function taxonomy_galcat_page_template( $template_galcat ) {

    if ( is_tax( 'galcat' )  ) {

      $new_template_galcat = get_template_directory() . '/templates/taxonomy-galcat.php';

      if ( '' != $new_template_galcat ) {

        return $new_template_galcat ;

      }

    }

    return $template_galcat;

  }

// Publication Category

add_filter( 'template_include', 'taxonomy_pubcat_page_template', 99 );

  function taxonomy_pubcat_page_template( $template_pubcat ) {

    if ( is_tax( 'pubcat' )  ) {

      $new_template_pubcat = get_template_directory() . '/templates/taxonomy-pubcat.php';

      if ( '' != $new_template_pubcat ) {

        return $new_template_pubcat ;

      }

    }

    return $template_pubcat;

  }

// Video Category

add_filter( 'template_include', 'taxonomy_vidcat_page_template', 99 );

  function taxonomy_vidcat_page_template( $template_vidcat ) {

    if ( is_tax( 'vidcat' )  ) {

      $new_template_vidcat = get_template_directory() . '/templates/taxonomy-vidcat.php';

      if ( '' != $new_template_vidcat ) {

        return $new_template_vidcat ;

      }

    }

    return $template_vidcat;

  }

?>