<?php

/**
 * Enqueue scripts and styles.
 */
function iap_scripts() {
    wp_enqueue_style( 'style', untrailingslashit( get_template_directory_uri() ) . '/style.css' );
    wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', false ); 
}
add_action( 'wp_enqueue_scripts', 'iap_scripts' );