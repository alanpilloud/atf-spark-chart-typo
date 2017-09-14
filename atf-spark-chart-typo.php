<?php
/*
Plugin Name:  ATF Spark chart typo
Plugin URI:   https://bwap.ch
Description:  Allows editors to display charts in Wysiwyg text editors. Typo made by After the flood (http://aftertheflood.co/projects/atf-spark)
Version:      1.0.0
Author:       Isaac Aristil @ bwap.ch
Author URI:   https://bwap.ch
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Add CSS for the frontend
 */
add_action('wp_enqueue_scripts', function () {
    wp_register_style('atf-spark-chart-typo', plugins_url('/assets/atf-spark-chart-typo.css', __FILE__), false, 1);
    wp_enqueue_style('atf-spark-chart-typo');
});

/**
 * Add CSS for admin pages
 */
add_action('admin_init', function () {
    add_editor_style(plugins_url('/assets/atf-spark-chart-typo-admin.css', __FILE__));
});
    
/**
 * Add Format select to tinymce buttons
 */
add_filter('mce_buttons', function ($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
});

/**
 * Add custom css classes to tinymce
 */
add_filter('tiny_mce_before_init', function ($init_array) {  
    $init_array['style_formats'] = json_encode([  
        [
            'title' => 'Chart - Bar Medium',  
            'inline' => 'span',  
            'classes' => 'atfspark-bar-medium',
            'wrapper' => false,
        ],
        [
            'title' => 'Chart - Bar Narrow',  
            'inline' => 'span',  
            'classes' => 'atfspark-bar-narrow',
            'wrapper' => false,
        ],
        [
            'title' => 'Chart - Bar Thin',  
            'inline' => 'span',  
            'classes' => 'atfspark-bar-thin',
            'wrapper' => false,
        ],
        [
            'title' => 'Chart - Line Medium',  
            'inline' => 'span',  
            'classes' => 'atfspark-line-medium',
            'wrapper' => false,
        ],
        [
            'title' => 'Chart - Dot  Medium',  
            'inline' => 'span',  
            'classes' => 'atfspark-dot-medium',
            'wrapper' => false,
        ],
        [
            'title' => 'Chart - Dot Small',  
            'inline' => 'span',  
            'classes' => 'atfspark-dot-small',
            'wrapper' => false,
        ],
    ]);  

    return $init_array;  
});  
