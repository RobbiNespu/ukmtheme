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
  $current_year = date('Y');
  $current_month = date('m');
  $eveData = array(
    'post_type'       => 'event',
    'posts_per_page'  => 10,
    'year'            => $current_year,
    'monthnum'        => $current_month,
    'post_status'     => array( 'publish', 'future' ),
    );
    
  $eveSlider = new WP_Query( $eveData );
?>
<script type="text/javascript">
  (function($) {
    $(function() {
      var jcarousel = $('.jcarousel');

      jcarousel
      .on('jcarousel:reload jcarousel:create', function () {
        var width = jcarousel.innerWidth();

        if (width >= 600) {
          width = width / 3;
        } else if (width >= 350) {
          width = width / 2;
        }

        jcarousel.jcarousel('items').css('width', width + 'px');
      })
      .jcarousel({
        wrap: 'circular'
      });

      $('.jcarousel-control-prev')
      .jcarouselControl({
        target: '-=1'
      });

      $('.jcarousel-control-next')
      .jcarouselControl({
        target: '+=1'
      });

      $('.jcarousel-pagination')
      .on('jcarouselpagination:active', 'a', function() {
        $(this).addClass('active');
      })
      .on('jcarouselpagination:inactive', 'a', function() {
        $(this).removeClass('active');
      })
      .on('click', function(e) {
        e.preventDefault();
      })
      .jcarouselPagination({
        perPage: 1,
        item: function(page) {
          return '<a href="#' + page + '">' + page + '</a>';
        }
      });
    });
  })(jQuery);
</script>

<div class="wrap event_jcarousel-outer">
  <div class="jcarousel-wrapper">
  <div class="jcarousel">
    <ul>
    <?php while ( $eveSlider->have_posts() ) : $eveSlider->the_post(); ?>
      <li>
        <span class="new_event_heading"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?>&nbsp;:&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?></span>
        <span class="new_event_content"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <a href="#" class="jcarousel-control-prev"><i class="uk-icon-chevron-left"></i></a>
  <a href="#" class="jcarousel-control-next"><i class="uk-icon-chevron-right"></i></a>
  </div>
</div>