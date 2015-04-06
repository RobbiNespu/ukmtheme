<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 */
get_header(); ?>
<div class="home-content-wrap">
  <div class="wrap home-content">
  <?php
    $widget_news_scroller   = get_option('ukmtheme_widget_news');
    $widget_one_box         = get_option('ukmtheme_widget_one');
    $widget_three_box       = get_option('ukmtheme_widget_three');
    $widget_four_box        = get_option('ukmtheme_widget_four');
    $widget_basic           = get_option('ukmtheme_widget_basic');
    $widget_custom          = get_option('ukmtheme_widget_custom');
    $widget_facebook        = get_option('ukmtheme_widget_facebook');
    $widget_event           = get_option('ukmtheme_widget_event');
    $widget_tabber          = get_option('ukmtheme_widget_tabber');
    $widget_news_portal     = get_option('ukmtheme_widget_newsPortal');
   
    /**
     * Susunan Widget di muka hadapan web
     * Boleh disusun mengikut kehendak PTJ
     * Susunan asal adalah seperti di bawah. Jangan ubah kod di atas
     * Sebarang keraguan boleh menghubungi pembangun di sambungan 6685
     */

    /** 1. */ get_template_part( 'templates/widget', $widget_event );
    /** 2. */ get_template_part( 'templates/widget', $widget_tabber );
    /** 2. */ get_template_part( 'templates/widget', $widget_one_box );
    /** 3. */ get_template_part( 'templates/widget', $widget_news_portal );
    /** 4. */ get_template_part( 'templates/widget', $widget_news_scroller );
    /** 5. */ get_template_part( 'templates/widget', $widget_basic );
    /** 6. */ get_template_part( 'templates/widget', $widget_custom );
    /** 7. */ get_template_part( 'templates/widget', $widget_three_box );
    /** 8. */ get_template_part( 'templates/widget', $widget_four_box );
    /** 9. */ get_template_part( 'templates/widget', $widget_facebook );

    /**
     * Sekiranya anda telah menambah widget area di functions.php
     * gunakan kod <?php if (dynamic_sidebar( 'sidebar-4' )) : else : endif; ?>
     * "sidebar-4" adalah nama widget yang dicipta
     */
    
  ?>
  </div>
</div>
<?php get_footer(); ?>