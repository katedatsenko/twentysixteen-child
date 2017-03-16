<?php

add_filter('wp_title', 'filterTitle');
function filterTitle($title) {
    return $title.' - Twenty Sixteen Child';
}
add_filter('the_content', 'filterTheContent');
function filterTheContent($content) {
    return $content.' - Twenty Sixteen Child';
}
add_action('wp_enqueue_scripts', 'my_theme_styles' );
function my_theme_styles() {
    wp_enqueue_style('parent-theme-css', get_template_directory_uri() .'/style.css' );
    wp_enqueue_style('child-theme-css', get_stylesheet_directory_uri() .'/style.css', array('parent-theme-css') );
}

define("MY_THEME_TEXTDOMAIN", 'twentysixteen-child');
/**
 * Загрузка Text Domain
 */
function childThemeLocalization(){
    load_child_theme_textdomain(MY_THEME_TEXTDOMAIN, get_stylesheet_directory() . '/languages/');
}
add_action('after_setup_theme', 'childThemeLocalization');
add_action('admin_menu', 'addAdminMenu');
function addAdminMenu(){
    $themeMenuPage = add_theme_page(
        __('Sub theme by Kate', MY_THEME_TEXTDOMAIN),
        __('Sub theme by Kate', MY_THEME_TEXTDOMAIN),
        'read',
        'twentysixteen_child_control_sub_theme_menu',
        'renderThemeMenu'
    );
}
function renderThemeMenu(){
    _e('Sub theme by Kate', MY_THEME_TEXTDOMAIN);
}