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

$my_meta->addTaxonomy($prefix.'staff_position',array('taxonomy' => 'position'),array('name'=> 'Position'));

$my_meta->addTaxonomy($prefix.'staff_department',array('taxonomy' => 'department'),array('name'=> 'Department'));

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

$my_meta_slideshow->addImage($prefix.'slideshow_image',array('name'=> 'Image'));

$my_meta_slideshow->addText($prefix.'slideshow_link',array('name'=> 'Link URL'));

$my_meta_slideshow->Finish();

}

