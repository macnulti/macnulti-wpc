<?php

function mc_theme_enqueue_assets() {

    wp_enqueue_style( 'mdc-fonts', 'https://cdn.jsdelivr.net/npm/remixicon@2.3.0/fonts/remixicon.css', array());
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'mdc-style', get_stylesheet_directory_uri() . '/assets/base/main.css', array(), '?v=1.0.13');
    
}
add_action( 'wp_enqueue_scripts', 'mc_theme_enqueue_assets' );

function mdc_setup() {
    load_child_theme_textdomain( 'divi', get_stylesheet_directory() . '/lang/theme/' );
    require_once( get_stylesheet_directory() . '/custom_functions.php' );
}
add_action( 'after_setup_theme', 'mdc_setup' );

function mc_body_classes( $classes ) {
    $classes[] = 'no-sidebar';
    if (!is_single()) {
        $classes[] = 'no-single';
    }
    return $classes;
}
add_filter( 'body_class', 'mc_body_classes' );

function mdc_tiny_mce_before_init($settings)
{
    $style_formats = array(
        array(
            'title' => 'Titulos y párrafos',
            'items' => array(
                array( 'title' => 'Pregunta', 'block' => 'p', 'classes' => 'q'),
                array( 'title' => 'Respuesta', 'block' => 'p', 'classes' => 'a'),
                array( 'title' => 'Normal', 'block' => 'p' ),
                array( 'title' => 'Titulo articulo', 'block' => 'h1'),
                array( 'title' => 'Titulo bloque', 'block' => 'h2'),
                array( 'title' => 'Titulo bloque 2', 'block' => 'h3'),
                array( 'title' => 'Titulo reseña', 'block' => 'h4'),
                array( 'title' => 'Texto centrado', 'block' => 'p', 'classes' => 'text-center')
            )
        ),
        array(
            'title' => 'Citas y textos',
            'items' => array(
                array( 'title' => 'Leyenda cita', 'block' => 'p', 'classes' => 'caption'),
                array( 'title' => 'Firma autor', 'block' => 'p', 'classes' => 'by-author'),
                array( 'title' => 'Firma reseña', 'inline' => 'span', 'classes' => 'by-author', 'exact' => true),
                array( 'title' => 'Enlace Nota', 'inline' => 'a', 'classes' => 'note'),
                array( 'title' => 'Texto a destacar', 'inline' => 'span', 'classes' => 'highlight', 'exact' => true),
                array( 'title' => 'Ref. articulo (pie)', 'block' => 'p', 'classes' => 'ref', 'exact' => true),
            )
        ),
        array(
            'title' => 'Bloques',
            'items' => array(
                array( 'title' => 'Intro', 'block' => 'div', 'classes' => 'intro', 'wrapper' => true),
                array( 'title' => 'Notas al pie', 'block' => 'div', 'classes' => 'footnotes', 'wrapper' => true),
            )
        )
    );
    $settings['style_formats'] = json_encode($style_formats);

    // force paste as plain text
    $settings['paste_as_text'] = true;

    return $settings;
}
add_filter('tiny_mce_before_init', 'mdc_tiny_mce_before_init');


