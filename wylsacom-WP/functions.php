<?php

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

add_theme_support('post-thumbnails');

add_action('pre_get_posts', 'hwl_home_pagesize', 1 );
function hwl_home_pagesize( $query ) {
	// Выходим, если это админ-панель или не основной запрос.
	if( is_admin() || ! $query->is_main_query() )
		return;

	if( is_home() ){
		// Выводим только 1 пост на главной странице
		$query->set( 'posts_per_page', 9 );
	}
}


if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function axxon_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 48 ); ?>
                <?php printf( __( '%s<span class="says"></span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Ваш комментарий ожидает модерации.', 'twentyten' ); ?></em>
                <br />
            <?php endif; ?>
 
            <div class="comment-meta commentmetadata"><i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s в %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Изменить)', 'twentyten' ), ' ' );
                ?>
            </div><!-- .comment-meta .commentmetadata -->
 
            <div class="comment-body"><?php comment_text(); ?>
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
            </div>
 
            
        </div><!-- #comment-##  -->
 
    <?php
            break;
        case 'pingback'  :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
    <?php
            break;
    endswitch;
}
endif;
 
/**
* Добавляем древовидной форме комментариев ответить всплывающее окно
*/
function enqueue_comment_reply() {
    if( is_singular() )
        wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );
 
/**
* Удаляем поле URL в форме комментариев
*/
 
function remove_comment_fields($fields) {
 
unset($fields['url']);
 
return $fields;
 
}
 
add_filter('comment_form_default_fields', 'remove_comment_fields');

// Widgets

add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => "sidebar",
        'before_widget' => '<div class="box-shadow widget">',
        'after_widget'  => "</div>",
        'before_title'  => '<h4>',
        'after_title'   => "</h4>",
    ) );
}








