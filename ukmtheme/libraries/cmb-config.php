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
 
add_filter( 'cmb_meta_boxes', 'ukmtheme_metaboxes' );

function ukmtheme_metaboxes( array $meta_boxes ) {

	$prefix = '_cmb_';

	$meta_boxes['staff_detail'] = array(
		'id'         => 'staff_detail',
		'title'      => __( 'Staff Detail', 'ukmtheme' ),
		'pages'      => array( 'staff', ),
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __( 'Staff Photo', 'ukmtheme' ),
				'desc' => __( 'Upload an image or enter a URL size W:125 x H:60px.', 'ukmtheme' ),
				'id'   => $prefix . 'staff_photo',
				'type' => 'file',
			),
			array(
			'name'		=> __( 'Position', 'ukmtheme' ),
			'desc'		=> __( 'Staff Position', 'ukmtheme' ),
			'id'		=> $prefix . 'staff_position',
			'type'		=> 'taxonomy_select',
			'taxonomy'	=> 'position',
			),
			array(
				'name'		=> __( 'Department', 'ukmtheme' ),
				'desc'		=> __( 'Staff department or unit', 'ukmtheme' ),
				'id'		=> $prefix . 'staff_department',
				'type'		=> 'taxonomy_select',
				'taxonomy'	=> 'department',
			),
			array(
				'name' => __( 'Phone', 'ukmtheme' ),
				'desc' => __( 'Telephone No.', 'ukmtheme' ),
				'id'   => $prefix . 'staff_phone',
				'type' => 'text',
			),
			array(
				'name' => __( 'Email', 'ukmtheme' ),
				'desc' => __( 'Staff official email', 'ukmtheme' ),
				'id'   => $prefix . 'staff_email',
				'type' => 'text_email',
			),

		)
	);
    
    $meta_boxes['slideshow_image'] = array(
        'id'         => 'slideshow_image',
        'title'      => __( 'Slideshow Image', 'ukmtheme' ),
        'pages'      => array( 'slideshow', ),
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __( 'Image', 'ukmtheme' ),
                'desc' => __( 'Upload an image or enter a URL size W:960 x H:350 px.', 'ukmtheme' ),
                'id'   => $prefix . 'slideshow_image',
                'type' => 'file',
            ),
        )
    );

	return $meta_boxes;

}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once get_template_directory() . '/plugins/Custom-Metaboxes/init.php';

}
?>