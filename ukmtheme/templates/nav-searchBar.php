<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
 ?>
<div class="uk-navbar-flip">
<form class="uk-search uk-form-small" data-uk-search="{source:'my-results.json'}" action="<?php echo home_url( '/' ); ?>">
	<input class="uk-search-field" type="search" placeholder="<?php echo __( 'search...', 'ukmtheme' ); ?>">
	<button class="uk-search-close" type="reset"></button>
</form>
</div>