<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Post_Types
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
 ?>
<form role="search" method="get" class="uk-form" action="<?php echo home_url( '/' ); ?>">
  <label>
    <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
  </label>
  <input type="submit" class="search-submit uk-button uk-button-primary" value="Search" />
</form>