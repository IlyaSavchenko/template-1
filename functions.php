<?php 
add_theme_support('menus'); //Add menus
register_nav_menu('header-menu', 'Верхнее меню');

add_theme_support( 'custom-logo' ); //Add logo

add_theme_support( 'html5', array( 'search-form' ) );

add_theme_support('post-thumbnails'); // Add thumbnails
add_image_size( 'thumb185', 185, 185, true );
add_image_size( 'thumb70', 70, 70, true );
add_image_size( 'sliderimg', 200, 150, true );

?>