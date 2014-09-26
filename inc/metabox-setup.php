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
 * Custom field and metaboxes
 */

add_filter( 'cmb_meta_boxes', 'ukmtheme_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function ukmtheme_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = 'ut_';

  // Video

  $meta_boxes['video_metabox'] = array(
    'id'          => 'video_metabox',
    'title'       => __( 'Video Detail', 'ukmtheme' ),
    'pages'       => array( 'video', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Video Link', 'ukmtheme' ),
        'desc'    => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'ukmtheme' ),
        'id'      => $prefix . 'video_url',
        'type'    => 'oembed',
      ),
    ),
  );


  // News Portal Link

  $meta_boxes['news_portal_metabox'] = array(
    'id'          => 'news_portal_metabox',
    'title'       => __( 'News Detail', 'ukmtheme' ),
    'pages'       => array( 'news_portal', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'News URL', 'ukmtheme' ),
        'desc'    => __( 'field description (optional)', 'ukmtheme' ),
        'id'      => $prefix . 'news_portal_url',
        'type'    => 'text_url',
      ),
    ),
  );

  // Press Release

  $meta_boxes['press_metabox'] = array(
    'id'          => 'press_metabox',
    'title'       => __( 'Press Release Detail', 'ukmtheme' ),
    'pages'       => array( 'press', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Date', 'ukmtheme' ),
        'desc'    => __( 'Press Release Date', 'ukmtheme' ),
        'id'      => $prefix . 'press_date',
        'type'    => 'text_date',
      ),
      array(
        'name'    => __( 'Document File', 'ukmtheme' ),
        'desc'    => __( 'Upload document file.', 'ukmtheme' ),
        'id'      => $prefix . 'press_file',
        'type'    => 'file',
        'allow'   => array('url'),
      ),
    ),
  );

  // GALLERY

  $meta_boxes['gallery_metabox'] = array(
    'id'          => 'gallery_metabox',
    'title'       => __( 'Gallery Detail', 'ukmtheme' ),
    'pages'       => array( 'gallery', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Gallery Cover Image', 'ukmtheme' ),
        'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x300 pixels. <a href="'. get_template_directory_uri() .'/assets/psd/300_300.psd">PSD File</a>', 'ukmtheme' ),
        'id'      => $prefix . 'gallery_cover',
        'type'    => 'file',
        'allow'   => array('url'),
      ),
      array(
        'name'    => __( 'Date', 'ukmtheme' ),
        'desc'    => __( 'Gallery Date', 'ukmtheme' ),
        'id'      => $prefix . 'gallery_date',
        'type'    => 'text_date',
      ),
      array(
        'name'    => __( 'Phographer', 'ukmtheme' ),
        'desc'    => __( 'Photo by.', 'ukmtheme' ),
        'id'      => $prefix . 'gallery_photographer',
        'type'    => 'text',
      ),
    ),
  );

  // SLIDESHOW

  $meta_boxes['slideshow_metabox'] = array(
    'id'          => 'slideshow_metabox',
    'title'       => __( 'Slideshow Detail', 'ukmtheme' ),
    'pages'       => array( 'slideshow', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Slideshow Image', 'ukmtheme' ),
        'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 960x350 pixels. <a href="'. get_template_directory_uri() .'/assets/psd/960_350.psd">PSD File</a>', 'ukmtheme' ),
        'id'      => $prefix . 'slideshow_image',
        'type'    => 'file',
        'allow'   => array('url'),
      ),
      array(
        'name'    => __( 'Slideshow Link', 'ukmtheme' ),
        'desc'    => __( 'links to posts, pages or external web.', 'ukmtheme' ),
        'id'      => $prefix . 'slideshow_link',
        'type'    => 'text',
      ),
    ),
  );

  // APPRECIATION

  $meta_boxes['appreciation_metabox'] = array(
    'id'          => 'appreciation_metabox',
    'title'       => __( 'Appreciation Detail', 'ukmtheme' ),
    'pages'       => array( 'appreciation', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'By', 'ukmtheme' ),
        'desc'    => __( 'e.g. Jamaludin Rajalu', 'ukmtheme' ),
        'id'      => $prefix . 'appreciation_by',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'PTJ', 'ukmtheme' ),
        'desc'    => __( 'e.g. Pusat Teknologi Maklumat', 'ukmtheme' ),
        'id'      => $prefix . 'appreciation_ptj',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Date', 'ukmtheme' ),
        'desc'    => __( 'Date of appreciation', 'ukmtheme' ),
        'id'      => $prefix . 'appreciation_date',
        'type'    => 'text_date',
      ),
      array(
        'name'    => __( 'Greeting', 'ukmtheme' ),
        'desc'    => __( 'e.g. Terima kasih atas sumbangan sebagai urusetia majlis', 'ukmtheme' ),
        'id'      => $prefix . 'appreciation_greeting',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
    ),
  );

  // EVENT MANAGER

  $meta_boxes['event_metabox'] = array(
    'id'          => 'event_metabox',
    'title'       => __( 'Event Detail', 'ukmtheme' ),
    'pages'       => array( 'event', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Date', 'ukmtheme' ),
        'desc'    => __( 'Date of event', 'ukmtheme' ),
        'id'      => $prefix . 'event_date',
        'type'    => 'text_date',
      ),
      array(
        'name'    => __( 'Time: Start', 'ukmtheme' ),
        'desc'    => __( 'Start time of the event', 'ukmtheme' ),
        'id'      => $prefix . 'event_time_start',
        'type'    => 'text_time',
      ),
      array(
        'name'    => __( 'Time: End', 'ukmtheme' ),
        'desc'    => __( 'End time of the event', 'ukmtheme' ),
        'id'      => $prefix . 'event_time_end',
        'type'    => 'text_time',
      ),
      array(
        'name'    => __( 'Venue', 'ukmtheme' ),
        'desc'    => __( 'Venue of the event', 'ukmtheme' ),
        'id'      => $prefix . 'event_venue',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Summary', 'ukmtheme' ),
        'desc'    => __( 'Event Summary', 'ukmtheme' ),
        'id'      => $prefix . 'event_summary',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
    ),
  );

  // PUBLICATION

  $meta_boxes['publication_metabox'] = array(
    'id'          => 'publication_metabox',
    'title'       => __( 'Publication Detail', 'ukmtheme' ),
    'pages'       => array( 'publication', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Cover Image', 'ukmtheme' ),
        'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels. <a href="'. get_template_directory_uri() .'/assets/psd/300_380.psd">PSD File</a>', 'ukmtheme' ),
        'id'      => $prefix . 'publication_cover',
        'type'    => 'file',
        'allow'   => array('url'),
      ),
      array(
        'name'    => __( 'Author', 'ukmtheme' ),
        'desc'    => __( 'e.g. Jamaludin Rajalu', 'ukmtheme' ),
        'id'      => $prefix . 'publication_author',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Publisher', 'ukmtheme' ),
        'desc'    => __( 'e.g. Pusat Teknologi Maklumat', 'ukmtheme' ),
        'id'      => $prefix . 'publication_publisher',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Year', 'ukmtheme' ),
        'desc'    => __( 'e.g. 2014', 'ukmtheme' ),
        'id'      => $prefix . 'publication_year',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Number of Pages', 'ukmtheme' ),
        'desc'    => __( 'e.g. 199', 'ukmtheme' ),
        'id'      => $prefix . 'publication_pages',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Reference/Download', 'ukmtheme' ),
        'desc'    => __( 'e.g. http://www.ukm.my', 'ukmtheme' ),
        'id'      => $prefix . 'publication_reference',
        'type'    => 'text_url',
      ),
    ),
  );

  // STAFF DIRECTORY

  $meta_boxes['staff_metabox'] = array(
    'id'          => 'staff_metabox',
    'title'       => __( 'Staff Detail', 'ukmtheme' ),
    'pages'       => array( 'staff', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Staff Photo', 'ukmtheme' ),
        'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels. <a href="'. get_template_directory_uri() .'/assets/psd/300_380.psd">PSD File</a>', 'ukmtheme' ),
        'id'      => $prefix . 'staff_photo',
        'type'    => 'file',
        'allow'   => array('url'),
      ),
      array(
        'name'    => __( 'Phone No.', 'ukmtheme' ),
        'desc'    => __( 'e.g. 03-8921-7070', 'ukmtheme' ),
        'id'      => $prefix . 'staff_phone',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Email', 'ukmtheme' ),
        'desc'    => __( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
        'id'      => $prefix . 'staff_email',
        'type'    => 'text_email',
      ),
      array(
        'name'    => __( 'Display Job Scope', 'ukmtheme' ),
        'desc'    => __( 'Please check if want to display Scope of Work', 'ukmtheme' ),
        'id'      => $prefix . 'staff_work_scope',
        'type'    => 'checkbox',
      ),
      array(
        'name'    => __( 'Hide Title', 'ukmtheme' ),
        'desc'    => __( 'Please check if want to hide Scope of Work title "Scope of Work"', 'ukmtheme' ),
        'id'      => $prefix . 'staff_work_scope_title',
        'type'    => 'checkbox',
      ),
      array(
        'name'    => __( 'New Title', 'ukmtheme' ),
        'desc'    => __( 'e.g. "Expertise". Please leave it blank if do not want to display', 'ukmtheme' ),
        'id'      => $prefix . 'staff_work_scope_title_custom',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Scope of Work Detail', 'ukmtheme' ),
        'desc'    => __( 'e.g. Do Multimedia Work', 'ukmtheme' ),
        'id'      => $prefix . 'staff_work_scope_desc',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
    ),
  );

  // EXPERTISE

  $meta_boxes['expertise_metabox'] = array(
    'id'          => 'expertise_metabox',
    'title'       => __( 'Expertise Detail', 'ukmtheme' ),
    'pages'       => array( 'expertise', ),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true,
    'fields'      => array(
      array(
        'name'    => __( 'Expert Photo', 'ukmtheme' ),
        'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels. <a href="'. get_template_directory_uri() .'/assets/psd/300_380.psd">PSD File</a>', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_photo',
        'type'    => 'file',
        'allow'   => array('url'),
      ),
      array(
        'name'    => __( 'Biography', 'ukmtheme' ),
        'desc'    => __( 'A brief biography', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_biography',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Contact', 'ukmtheme' ),
        'desc'    => __( 'e.g. 03-8921-7070', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_contact',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Email', 'ukmtheme' ),
        'desc'    => __( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_email',
        'type'    => 'text_email',
      ),
      array(
        'name'    => __( 'Current Position', 'ukmtheme' ),
        'desc'    => __( 'e.g. Professor', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_position',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Specialisation', 'ukmtheme' ),
        'desc'    => __( 'Tourism and Hospitality Marketing, &amp; Services Marketing', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_specialisation',
        'type'    => 'text',
      ),
      array(
        'name'    => __( 'Qualifications', 'ukmtheme' ),
        'desc'    => __( 'e.g. Doctor of Philosophy (University of Malaya) [2002-2005]', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_qualification',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Areas of Research', 'ukmtheme' ),
        'desc'    => __( 'e.g. Services Marketing and Consumer Behavior Analysis', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_research_area',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Research/<br/>Consultation/<br/>Expansion', 'ukmtheme' ),
        'desc'    => __( 'e.g. Developing A Higher Education Brand Index for Malaysia. Jan1, 2009-June 30,2010. GSB-001-2009 (External Grant). Ongoing.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_research_consultation',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Publications Journals', 'ukmtheme' ),
        'desc'    => __( 'e.g. Ahmad Azmi M. Ariffin & Mohd Safar Hashim. 2009. Marketing Malaysia to the Middle East Tourists: Towards a Prime Inter-Regional Destination. International Journal of West Asian Studies. 1(1): 43-58. ISSN 1394-0902.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_journal',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Proceedings', 'ukmtheme' ),
        'desc'    => __( 'e.g. Ahmad Azmi M.Ariffin, Aliah Hanim M.Salleh, Norzalita A.Aziz & Astuti A.Asbudin. 2009. Determining Passengers’ Expectation, Service Quality and Satisfaction for Low Cost Carriers. The Proceeding of The 11th. International Business Research Conference. Sydney Australia. Dec 2-4, 2009. ISBN: 978-0-980-4557-0-7 (Presenter).', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_proceedings',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Book', 'ukmtheme' ),
        'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_book',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Articles in Antologi/<br/>Chapters in Book', 'ukmtheme' ),
        'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_antologi',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Monograph,<br/> Working Papers<br/> and Non-Periodical<br/> Publications', 'ukmtheme' ),
        'desc'    => __( 'e.g. Module ”Tourism Marketing” (Code: BBAS 3103).  Open University Malaysia. 2007/2008', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_monograph',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Seminar', 'ukmtheme' ),
        'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_seminar',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Award', 'ukmtheme' ),
        'desc'    => __( 'e.g. EXCELLENT SERVICE AWARD 2007. Faculty of Economics and BusinessUniversiti Kebangsaan Malaysia', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_award',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Supervision', 'ukmtheme' ),
        'desc'    => __( 'e.g. Lim Chui Seong (DBA. Disertasi) The Influence of e-Hospitality on Websites Satisfaction and Loyalty (Ongoing)', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_supervision',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Administrative<br/> Services/Committee', 'ukmtheme' ),
        'desc'    => __( 'e.g. MANAGING EDITOR OF JURNAL PENGURUSAN 1 April 2007 – Present Graduate School of Business, Universiti Kebangsaan Malaysia', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_administrative',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Reports: Technical/<br/>Research/<br/>Consultation', 'ukmtheme' ),
        'desc'    => __( 'e.g. Mohd Fauzi Mohd Jani, Zaimah Derawi, Tih Sio Hong, Rozita Amirudin, Ahmad Azmi Ariffin, Zafir Makhbul, Aini Aman, Mohd Radzuan Rahid, Ahmad Raflis Omar, Kamalrudin Mohamed Saleh. 2008. “Laporan Akhir Program Latihan Keusahawanan: Kerjasama Pelajar Universiti dan Entepris Kecil dan Sederhana (EKS)”. SMIDEC.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_reports',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Research Grant', 'ukmtheme' ),
        'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_research_grant',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
      array(
        'name'    => __( 'Teaching', 'ukmtheme' ),
        'desc'    => __( 'e.g. Courses Taught at Ph.D./DBA Level Hospitality Marketing: Theory and Research', 'ukmtheme' ),
        'id'      => $prefix . 'expertise_teaching',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
      ),
    ),
  );

// END HERE

  return $meta_boxes;

}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once get_template_directory() . '/lib/metabox/init.php';

} ?>