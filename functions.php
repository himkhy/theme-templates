<?php
/**
 * Twenty Seventeen functions and definitions
 *
 *
 *
 */
//Register style in functions
function add_style(){
	wp_enqueue_style('style',get_template_directory_uri()."/css/style.css");
	wp_enqueue_style('bootstrap',get_template_directory_uri()."/css/bootstrap.min.css");
}
add_action('wp_enqueue_scripts','add_style');



//Register multiple menu in functions
function register_my_menus() {
register_nav_menus(
	array(	     
	      'header-menu' => __('Header Menu')	      
	 ) 
 );
}
add_action( 'init', 'register_my_menus' );

//Register Post Type (add imagee)
function add_image(){
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','add_image');



function dwwp_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Ownership',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
       
    ) );
}
add_action( 'widgets_init', 'dwwp_widgets_init' );


//Register Metabox
function wp_add_custom_metabox() {
    add_meta_box(
        'wp_meta',
        __( 'Position' ),
        'wp_meta_callback',
        'post',
        'normal',
        'core'
    );
}
add_action( 'add_meta_boxes', 'wp_add_custom_metabox' );


function wp_meta_callback($post) {
    wp_nonce_field( basename( __FILE__ ), 'wp_jobs_nonce' );
    $wp_stored_meta = get_post_meta( $post->ID ); ?>
    <div>
        <div class="meta-row">
            <div class="meta-td">
                <select name="position" id="" style="width:100%">
                    <option value="1" <?php if(!empty ( $wp_stored_meta['position'] )):if($wp_stored_meta['position'][0]=="1"): echo 'selected'; endif; endif;?>>Right</option>
                    <option value="2" <?php if(!empty ( $wp_stored_meta['position'] )):if($wp_stored_meta['position'][0]=="2"): echo 'selected'; endif; endif;?>>Left</option>
                </select>
            </div>
        </div>
        </div>
    <?php
}


function wp_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wp_jobs_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp_jobs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST['position'] ) ) {
        update_post_meta( $post_id, 'position', sanitize_text_field( $_POST[ 'position' ] ) );
    }
}
add_action( 'save_post', 'wp_meta_save' );


