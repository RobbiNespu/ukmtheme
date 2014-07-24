<?php
/**
 * @link http://www.ukm.my/template
 * @link http://widget.supercounters.com
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
?>
<!-- BEGIN: Powered by Supercounters.com -->
<script type="text/javascript" src="http://widget.supercounters.com/texthit.js"></script>
<script type="text/javascript">
  var sc_texthit_var = sc_texthit_var || [];sc_text_hit(<?php echo get_option('ukmtheme_visitor_id'); ?>,
  "<?php _e( 'Visitors','ukmtheme' ); ?>&nbsp;.&nbsp;<?php _e( 'View Full Statistic','ukmtheme' ); ?>",
  "ffffff"
  );
</script>
&nbsp;.&nbsp;<?php _e( 'Last Update:&nbsp;', 'ukmtheme' ); ?><?php echo date( 'd/m/Y', strtotime("-3 days") ); ?><br/>
<!-- END: Powered by Supercounters.com -->