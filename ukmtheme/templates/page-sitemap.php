<?php
function ukmtheme_html_sitemap() {
$ukmtheme_sitemap = '';
$published_posts = wp_count_posts('post');
 
$pages_args = array(
    'exclude' => '', /* ID of pages to be excluded, separated by comma */
    'post_type' => 'page',
    'post_status' => 'publish'
); 
 
$ukmtheme_sitemap .= '<h3>Pages</h3>';
$ukmtheme_sitemap .= '<ul>';
$pages = get_pages($pages_args); 
foreach ( $pages as $page ) :
$ukmtheme_sitemap .= '<li class="pages-list"><a href="'.get_page_link( $page->ID ).'" rel="bookmark">'.$page->post_title.'</a></li>';
endforeach;
$ukmtheme_sitemap .= '<ul>';
 
return $ukmtheme_sitemap;
}

add_shortcode( 'ukmtheme-sitemap','ukmtheme_html_sitemap' ); // [spp-sitemap]
?>