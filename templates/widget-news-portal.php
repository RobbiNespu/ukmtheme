<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Function_Reference/get_term_link
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */

$newsPortalData = array( 'post_type' => 'news_portal', 'posts_per_page' => 4 );
$newsPortalLoop = new WP_Query( $newsPortalData );

?>

<div class="pure-g news-portal">
  <div class="pure-u-1-8 news-portal-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/newsportal-logo.png?ver=6.2"/>
  </div>
  <div class="pure-u-7-8">
    <ul class="pure-g news-portal-block-wrapper">
    <?php while ( $newsPortalLoop->have_posts() ) : $newsPortalLoop->the_post(); ?>
      <li class="pure-u-1-4 news-portal-block">
        <a href="<?php echo get_post_meta($post->ID, 'ut_news_portal_url', true); ?>"><?php the_title(); ?></a>
      </li>
      <?php endwhile ?>
    </ul>
  </div>
</div>



