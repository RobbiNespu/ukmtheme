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
 * 1. Staff Directory
 * 2. Frontpage Slideshow
 * 3. Events Manager
 */

require_once get_template_directory() . '/lib/meta-box-class/my-meta-box-class.php';
if (is_admin()){

$prefix = 'ut_';

// Custom Post Type: Staff Detail

$config = array(
    'id'             => 'staff_meta_box',
    'title'          => __('Staff Detail','ukmtheme'),
    'pages'          => array('staff'),
    'context'        => 'normal', 
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' =>  get_stylesheet_directory_uri() .'/lib/meta-box-class'
  );
  
$my_meta =  new AT_Meta_Box($config);

$my_meta->addImage($prefix.'staff_photo',array('name'=> __('Photo','ukmtheme'), 'desc' => __('Image dimension: W:200 x H:250 pixel, graphic template for this image can be downloaded here: <a href="'.get_template_directory_uri().'/assets/templates/templates.zip">templates.zip</a>', 'ukmtheme')));

$my_meta->addText($prefix.'staff_phone',array('name'=> __('Phone No.','ukmtheme'), 'desc' => __('eg: 03-8921-7070','ukmtheme')));

$my_meta->addText($prefix.'staff_email',array('name'=> __('Email','ukmtheme'), 'desc' => __('e.g: username@ukm.my', 'ukmtheme')));

$my_meta->Finish();

// Custom Post Type: Slideshow

$config_slideshow = array(
  'id'             => 'slideshow_meta_box',
  'title'          => __('Slideshow Detail','ukmtheme'),
  'pages'          => array('slideshow'),
  'context'        => 'normal', 
  'priority'       => 'high',
  'fields'         => array(),
  'local_images'   => false,
  'use_with_theme' =>  get_stylesheet_directory_uri() .'/lib/meta-box-class'
);
  
$my_meta_slideshow =  new AT_Meta_Box($config_slideshow);

$my_meta_slideshow->addImage($prefix.'slideshow_image',array('name'=> 'Image', 'desc' => __('Image dimension: W:960 x H:350 pixel, graphic template for this image can be downloaded here: <a href="'.get_template_directory_uri().'/assets/templates/templates.zip">templates.zip</a>', 'ukmtheme')));

$my_meta_slideshow->addText($prefix.'slideshow_link',array('name'=> 'Link URL', 'desc' => __('This is optional. If so enter full url e.g: http://www.ukm.my','ukmtheme')));

$my_meta_slideshow->Finish();

// Custom Post Type: Events

$config_event = array(
  'id'             => 'event_meta_box',
  'title'          => __('Event Detail','ukmtheme'),
  'pages'          => array('event'),
  'context'        => 'normal', 
  'priority'       => 'high',
  'fields'         => array(),
  'local_images'   => false,
  'use_with_theme' =>  get_stylesheet_directory_uri() .'/lib/meta-box-class'
);
  
$my_meta_event =  new AT_Meta_Box($config_event);

$my_meta_event->addDate($prefix.'event_date',array('name'=> __('Date', 'ukmtheme'),'format'=> 'D, dd/mm/yy'));

$my_meta_event->addTime($prefix.'event_start_time',array('name'=> __('Start Time', 'ukmtheme'),'format'=> 'hh:mm tt'));

$my_meta_event->addTime($prefix.'event_end_time',array('name'=> __('End Time', 'ukmtheme'),'format'=> 'hh:mm tt'));

$my_meta_event->addText($prefix.'event_venue',array('name'=> __('Venue', 'ukmtheme')));

$my_meta_event->addWysiwyg($prefix.'event_summary',array('name'=> __('Summary', 'ukmtheme')));

$my_meta_event->Finish();

// Custom Post Type: Publication

$config_publication = array(
    'id'             => 'publication_meta_box',
    'title'          => __('Publication Details','ukmtheme'),
    'pages'          => array('publication'),
    'context'        => 'normal', 
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' =>  get_stylesheet_directory_uri() .'/lib/meta-box-class'
  );
  
$my_meta_publication =  new AT_Meta_Box($config_publication);

$my_meta_publication->addImage($prefix.'publication_cover',array('name'=> __('Cover Image','ukmtheme'), 'desc' => __('Image dimension: W:200 x H:250 pixel, graphic template for this image can be downloaded here: <a href="'.get_template_directory_uri().'/assets/templates/templates.zip">templates.zip</a>', 'ukmtheme')));

//$my_meta_publication->addText($prefix.'publication_ISBN',array('name'=> __('ISBN','ukmtheme'), 'desc' => __('eg: 978-983-99557-1-2','ukmtheme')));

$my_meta_publication->addText($prefix.'publication_author',array('name'=> __('Author','ukmtheme'), 'desc' => __('e.g: Jamaludin Rajalu', 'ukmtheme')));

$my_meta_publication->addText($prefix.'publication_publisher',array('name'=> __('Publisher','ukmtheme'), 'desc' => __('e.g: Pusat Teknologi Maklumat', 'ukmtheme')));

$my_meta_publication->addText($prefix.'publication_year',array('name'=> __('Year','ukmtheme'), 'desc' => __('eg: 2014','ukmtheme')));

$my_meta_publication->addText($prefix.'publication_pages',array('name'=> __('Number of page','ukmtheme'), 'desc' => __('e.g: 199', 'ukmtheme')));

$my_meta_publication->addText($prefix.'publication_reference',array('name'=> __('Reference/Download','ukmtheme'), 'desc' => __('e.g: http://www.example.com or http://www.example.com/softcopy-example.pdf', 'ukmtheme')));

$my_meta_publication->Finish();

}

