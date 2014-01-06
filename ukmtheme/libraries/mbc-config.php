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

require_once get_template_directory() . '/plugins/meta-box-class/my-meta-box-class.php';
if (is_admin()){

$prefix = 'ut_';

// Custom Post Type: Staff Detail

$config = array(
    'id'             => 'staff_meta_box',
    'title'          => 'Staff Details',
    'pages'          => array('staff'),
    'context'        => 'normal', 
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' =>  get_stylesheet_directory_uri() .'/plugins/meta-box-class'
  );
  
$my_meta =  new AT_Meta_Box($config);

$my_meta->addImage($prefix.'staff_photo',array('name'=> 'Photo'));

$my_meta->addText($prefix.'staff_phone',array('name'=> 'Phone No.'));

$my_meta->addText($prefix.'staff_email',array('name'=> 'Email'));

$my_meta->Finish();

// Custom Post Type: Slideshow

$config_slideshow = array(
  'id'             => 'slideshow_meta_box',
  'title'          => 'Slideshow Detail',
  'pages'          => array('slideshow'),
  'context'        => 'normal', 
  'priority'       => 'high',
  'fields'         => array(),
  'local_images'   => false,
  'use_with_theme' =>  get_stylesheet_directory_uri() .'/plugins/meta-box-class'
);
  
$my_meta_slideshow =  new AT_Meta_Box($config_slideshow);

$my_meta_slideshow->addImage($prefix.'slideshow_image',array('name'=> 'Image', 'desc' => __('Image size: 960x350px', 'ukmtheme')));

$my_meta_slideshow->addText($prefix.'slideshow_link',array('name'=> 'Link URL'));

$my_meta_slideshow->Finish();

// Custom Post Type: Events

$config_event = array(
  'id'             => 'event_meta_box',
  'title'          => 'Event Detail',
  'pages'          => array('event'),
  'context'        => 'normal', 
  'priority'       => 'high',
  'fields'         => array(),
  'local_images'   => false,
  'use_with_theme' =>  get_stylesheet_directory_uri() .'/plugins/meta-box-class'
);
  
$my_meta_event =  new AT_Meta_Box($config_event);

$my_meta_event->addDate($prefix.'event_date',array('name'=> __('Date', 'ukmtheme'),'format'=> 'D, dd/mm/yy'));

$my_meta_event->addTime($prefix.'event_start_time',array('name'=> __('Start Time', 'ukmtheme'),'format'=> 'hh:mm tt'));

$my_meta_event->addTime($prefix.'event_end_time',array('name'=> __('End Time', 'ukmtheme'),'format'=> 'hh:mm tt'));

$my_meta_event->addText($prefix.'event_venue',array('name'=> __('Venue', 'ukmtheme')));

$my_meta_event->addWysiwyg($prefix.'event_summary',array('name'=> __('Summary', 'ukmtheme')));

$my_meta_event->Finish();

}

