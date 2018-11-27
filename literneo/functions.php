<?php

// styles scripts fonts
function register_styles() {
	wp_register_style('style', get_template_directory_uri() . 
		'/style.css');
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'register_styles');

function load_my_script() {
	wp_register_script('scripts', get_template_directory_uri() .
		'/js/scripts.min.js');
	wp_enqueue_script('scripts');
}
add_action('wp_enqueue_scripts', 'load_my_script');


/** Menu **/
register_nav_menu('primary', 'Main menu');

//Theme supporting
add_theme_support('post-thumbnails');
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 83,
        'width'       => 83,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

add_action('pre_get_posts', 'hwl_home_pagesize', 1 );
function hwl_home_pagesize( $query ) {
	// Выходим, если это админ-панель или не основной запрос.
	if( is_admin() || ! $query->is_main_query() )
		return;

	$query->set( 'posts_per_page', 5);
}
add_filter('pre_get_posts', 'posts_in_category');

function posts_in_category($query){
    if ($query->is_category) {
        if( is_category( 'blog' ))
            $query->set('posts_per_archive_page', 5);
        else if ( is_category( 'project' ))
            $query->set('posts_per_archive_page', 4);
        else
        $query->set('posts_per_archive_page', 9);
    }
}

# ---------------------------------------------------
# REMOVE SCREEN READER TEXT FROM POST PAGINATION
# ---------------------------------------------------
function sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
add_action('navigation_markup_template', 'sanitize_pagination');

//shortcodes
function shortcode_lessonStep($atts, $content = null) {
    extract(shortcode_atts(array(
        "title" => '',
        "text" => ''
    ), $atts));
    $result = '<div class="lessonstep animated animated-slUp"><div class="lscontent">';
    if($title != '')
        $result .= '<div class="lsctitle">' . $title . '</div>';
    $result .= '<p class="lsctext">' . $text. '</p></div>';
    $result .= '<div class="lsimg lsquare"><div class="popup-gallery">';

    $doc = new DOMDocument();
    $doc->loadHTML($content);
    $xml = simplexml_import_dom($doc);
    $images = $xml->xpath('//img');
    foreach ($images as $img)
        $result .= '<a href="' . $img['src'] . '" title=""><div class="bgimg-cover" style="background-image: url(' . $img['src'] . ');"></div></a>';
    $result .= '</div></div></div>';
    return $result;
}
add_shortcode('LStep', 'shortcode_lessonStep');
function shortcode_lessonHeader($atts, $content = null) {
    extract(shortcode_atts(array(
        "title" => '',
        "author" => '',
        "text" => '',
    ), $atts));
    $result = '<div class="lessonstep lsmain"><div class="lscontent">';
    $result .= '<div class="lscheader">' . $title . '</div>';
    $result .= '<div class="lscauthor"><span>Автор:</span>' . $author. '</div>';
    $result .= '<p class="lsctext">' . $text . '</p></div>';
    $result .= '<div class="lsimg lsquare"><div class="popup-gallery">';

    $doc = new DOMDocument();
    $doc->loadHTML($content);
    $xml = simplexml_import_dom($doc);
    $images = $xml->xpath('//img');
    foreach ($images as $img)
        $result .= '<a href="' . $img['src'] . '"><div class="bgimg-cover" style="background-image: url(' . $img['src'] . ');"></div></a>';
    $result .= '</div></div></div>';
    return $result;
}
add_shortcode('LHeader', 'shortcode_lessonHeader');

//walkers
class footer_walker_nav_menu extends Walker_Nav_Menu {
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output
     * @param object $item Объект элемента меню, подробнее ниже.
     * @param int $depth Уровень вложенности элемента меню.
     * @param object $args Параметры функции wp_nav_menu
     */
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;           
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        /*
         * Генерируем строку с CSS-классами элемента меню
         */
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] =  $args->li_class;
 
        // функция join превращает массив в строку
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
        /*
         * Генерируем ID элемента
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
        /*
         * Генерируем элемент меню
         */
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
 
        // атрибуты элемента, title="", rel="", target="" и href=""
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
        // ссылка и околоссылочный текст
        $item_output = $args->before;
        $item_output .= '<a' . ' class="' . $args->a_class . '"' . $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}









