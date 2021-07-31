<?php
// Can add hooks in this file and configure theme however want to.


function load_stylesheets() {

  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
  wp_enqueue_style('bootstrap');

  // Load our styles AFTER Bootstrap to prevent them being overwridden
  wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_enqueue_style('style');
}

// "Enqueue" (load) our stylesheet and Bootstrap's stylesheet into the document. Enqueueing in this file means we can keep the HTML markup cleaner with less scripts in head. Also, plugins can't detect inline references to stylesheets - e.g. caching plugins need access to stylesheets, so best to do it here.
add_action('wp_enqueue_scripts', 'load_stylesheets');

function include_jquery() {
  // Deregister jquery just incase wordpress is loading it in from somewhere, ensuring ours is the only one loaded.
  wp_deregister_script('jquery');

  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', '', 1, true);

  wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'include_jquery');


function loadjs() {
  
  // true = load at bottom of body
  wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
  wp_enqueue_script('customjs');
}

add_action('wp_enqueue_scripts', 'loadjs');

// So we can create menus from the dashboard.
add_theme_support('menus');

// So can add thumbnails to posts.
add_theme_support('post-thumbnails');

// Set the menu display locations to header and footer.
// __() translates text to users language I beleive.
register_nav_menus(
  array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme')
  )
);

// Tell Wordpress what image sizes we want. true = hard crop. Install force regenerate image plugin so already uploaded images get resized.
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);