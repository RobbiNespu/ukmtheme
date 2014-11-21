<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/The_Loop
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<article class="wrap">
  <div class="content clearfix">
    <section class="col-3-4">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-1-1">
          <div class="col-3-10 article">
          <?php
            $expertPhoto = get_post_meta($post->ID,'ut_expertise_photo',true);
            if ( $expertPhoto ) {
              echo '<img src="'.$expertPhoto.'">';
            }
            else {
              echo '<img src="'. get_template_directory_uri() .'/assets/images/public/staff-photo.png">';
            }
          ?>
          </div>
          <div class="col-7-10 article">
            <h2><?php the_title(); ?></h2>
              <p><strong><?php _e('Email','ukmtheme'); ?>:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ut_expertise_email', true); ?>&nbsp;<strong><?php _e('Phone','ukmtheme'); ?>:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ut_expertise_contact', true); ?></p>
            <p><strong><?php _e( 'Current Position', 'ukmtheme' ) ?>:</strong>
            <?php echo get_post_meta($post->ID, 'ut_expertise_position', true); ?></p>
            <p><strong><?php _e( 'Specialisation', 'ukmtheme' ) ?>:</strong>
            <?php echo get_post_meta($post->ID, 'ut_expertise_specialisation', true); ?></p>
              <p><?php echo get_post_meta($post->ID, 'ut_expertise_biography', true); ?></p>
          </div>
          <section class="col-1-1">
            <div class="column ut_divider">
              <div class="col-3-10 article">
                <strong><?php _e( 'Qualifications', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_qualification', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider">
              <div class="col-3-10 article">
                <strong><?php _e( 'Areas of Research', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_research_area', true); ?></p>
              </div>
            </div>
            <?php
              /**
               * Senarai item yang boleh disembunyikan
               * 20141121 1357
               */
              $hide_consultation    = get_post_meta($post->ID, 'ut_expertise_research_consultation_hide', true);
              $hide_journal         = get_post_meta($post->ID, 'ut_expertise_journal_hide', true);
              $hide_proceedings     = get_post_meta($post->ID, 'ut_expertise_proceedings_hide', true);
              $hide_book            = get_post_meta($post->ID, 'ut_expertise_book_hide', true);
              $hide_antologi        = get_post_meta($post->ID, 'ut_expertise_antologi_hide', true);
              $hide_monograph       = get_post_meta($post->ID, 'ut_expertise_monograph_hide', true);
              $hide_seminar         = get_post_meta($post->ID, 'ut_expertise_seminar_hide', true);
              $hide_award           = get_post_meta($post->ID, 'ut_expertise_award_hide', true);
              $hide_supervision     = get_post_meta($post->ID, 'ut_expertise_supervision_hide', true);
              $hide_administrative  = get_post_meta($post->ID, 'ut_expertise_administrative_hide', true);
              $hide_reports         = get_post_meta($post->ID, 'ut_expertise_reports_hide', true);
              $hide_research_grant  = get_post_meta($post->ID, 'ut_expertise_research_grant_hide', true);
              $hide_teaching        = get_post_meta($post->ID, 'ut_expertise_teaching_hide', true);
            ?>
            <div class="column ut_divider <?php if ( $hide_consultation == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Research/Consultation<br/>/Expansion', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_research_consultation', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_journal == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Publications Journals', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_journal', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_proceedings == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Proceedings', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_proceedings', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_book == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Book', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_book', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_antologi == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Articles in Antologi/Chapters in Book', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_antologi', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_monograph == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Monograph, Working Papers and Non-Periodical Publications', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_monograph', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_seminar == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Seminar', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_seminar', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_award == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Award', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_award', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_supervision == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Supervision', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_supervision', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_administrative == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Administrative Services/Committee', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_administrative', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_reports == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Reports: Technical<br/>/Research/Consultation', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_reports', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_research_grant == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Research Grant', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_research_grant', true); ?></p>
              </div>
            </div>
            <div class="column ut_divider <?php if ( $hide_teaching == on ) { echo 'ut_hidden'; } ?>">
              <div class="col-3-10 article">
                <strong><?php _e( 'Teaching', 'ukmtheme' ) ?></strong>
              </div>
              <div class="col-7-10">
                <p><?php echo get_post_meta($post->ID, 'ut_expertise_teaching', true); ?></p>
              </div>
            </div>
          </section>
        </div>
      <?php endwhile; else: ?>
          <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <?php get_template_part('templates/content','edit' ); ?>
    </section>
    <aside class="col-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>