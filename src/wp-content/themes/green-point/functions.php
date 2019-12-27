<?php
define('THEME_URI', get_template_directory_uri());
define('DF_IMAGE', THEME_URI. '/assets/images/default');
define('TP_PART', THEME_URI. '/template-part');
define('THEME_DIR', get_template_directory());
include TEMPLATEPATH .'/function/function.php';
include TEMPLATEPATH .'/function/action-hook.php';


// Local JSON acf
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-field';
    return $path;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-field';
    return $paths;
}



// ADD CSS AND JS
function green_point_style() {
	$date = date('l jS \of F Y h:i:s A');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('slick', THEME_URI. '/assets/css/slick.css');
    // wp_enqueue_style('slick-theme', THEME_URI. '/assets/css/slick-theme.css');
    wp_enqueue_style('bootstrap', THEME_URI. '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', THEME_URI. '/assets/css/fontawesome.min.css');
    // wp_enqueue_style('owl-theme', THEME_URI. '/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('font-awesome5', THEME_URI. '/assets/fonts/fontawesome/css/all.css');
    
    wp_enqueue_style('font', THEME_URI. '/assets/css/font.css');
    wp_enqueue_style('global', THEME_URI. '/assets/css/global.css?'.$date);
    wp_enqueue_style('animate', THEME_URI. '/assets/css/animate.css?'.$date);


    //css our story
    if(is_page_template('templates/our-story.php'))
        wp_enqueue_style('our-story', THEME_URI.'/assets/css/our-story.css?'.$date);
    //css SpaceShapping
    if(is_page_template('templates/spaceshaping.php'))
        wp_enqueue_style('spaceshaping', THEME_URI.'/assets/css/spaceshaping.css?'.$date);
    //css home
    if(is_page_template('templates/home.php'))
        wp_enqueue_style('home', THEME_URI. '/assets/css/home.css?'.$date);
    //css work
    if(is_page_template('templates/work.php'))
        wp_enqueue_style('work', THEME_URI. '/assets/css/work.css?'.$date);
    //css services
    if(is_page_template('templates/services.php'))
        wp_enqueue_style('services', THEME_URI. '/assets/css/services.css?'.$date);
    //css news
    if(is_page_template('templates/news.php'))
        wp_enqueue_style('news', THEME_URI. '/assets/css/news.css?'.$date);
    if(is_page_template('templates/contact.php'))
        wp_enqueue_style('contact', THEME_URI. '/assets/css/contact.css?'.$date);
    //css team-culture
    if(is_page_template('templates/team-culture.php'))
        wp_enqueue_style('team-culture', THEME_URI. '/assets/css/team.css?'.$date);

    if(is_singular('post'))
        wp_enqueue_style('single-page', THEME_URI. '/assets/css/single.css');

    if(is_singular('work'))
        wp_enqueue_style('single-work', THEME_URI. '/assets/css/single-work.css?'.$date);

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.js', '','' , true);
    wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.1.0.js', '','' , true);
    wp_enqueue_script( 'bootstrap', THEME_URI. '/assets/js/bootstrap.min.js', '','' , true);
    wp_enqueue_script( 'slick', THEME_URI. '/assets/js/slick.min.js', '','' , true);
    wp_enqueue_script( 'call-slick', THEME_URI. '/assets/js/call-slick.js?'.$date, '','' , true);
    wp_enqueue_script( 'animation', THEME_URI. '/assets/js/WOW.js', '','' , true);
    wp_enqueue_script( 'event', THEME_URI. '/assets/js/event.js?'.$date, '','' , true);
    wp_enqueue_script( 'main', THEME_URI. '/assets/js/main.js?'.$date, '','' , true);
    wp_enqueue_script( 'ajax', THEME_URI. '/assets/js/ajax.js?'.$date, '','' , true);

    
    wp_localize_script('ajax', 'ajax_var', array('url' => admin_url('admin-ajax.php')));

}
add_action('wp_enqueue_scripts', 'green_point_style' );

// Menu
register_nav_menus(
    array(
        'header_menu' => __( 'Header menu' ),
        'footer_menu' => __('Footer menu'),
        'copyright_menu' => __('Copyright menu'),
        'contact_menu' => __('Contact menu')
    )
);

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
        'page_title'    => 'Theme Option',
        'menu_title'    => 'Theme Option',
        'menu_slug'     => 'Theme Option',
        'parent_slug'   => '',
        'position'      => false,
        'icon_url'      => false,
    ));
}



