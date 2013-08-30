<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
?>
<div class="search-wrap">
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<div class="input-group input-group-xs">
      <input type="text" class="form-control" name="s" id="s">
      <span class="input-group-btn">
        <button class="btn btn-xs btn-primary carian" type="button" id="searchsubmit"><?php echo __('Search'); ?></button>
      </span>
    </div><!-- /input-group -->
</form>
</div>