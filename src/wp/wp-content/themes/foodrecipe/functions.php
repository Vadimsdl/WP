<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function foodrecipe_setup() {
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on foodrecipe, use a find and replace
        * to change 'foodrecipe' to the name of your theme in all the template files
        */
    load_theme_textdomain( 'foodrecipe', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    
    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded  tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support( 'title-tag' );
    
    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
    add_theme_support( 'post-thumbnails' );   
    
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'foodrecipe' ),
    ) );
    
    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
    
    /*
        * Enable support for Post Formats.
        *
        * See: https://codex.wordpress.org/Post_Formats
        */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    $defaults = array(
    'height'      => 37,
    'width'       => 45,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true, 
    );

    add_theme_support( 'custom-logo', $defaults );       

    add_image_size( 'foodrecipe-post-thumbnail', 800, 500, true ); 
    add_image_size( 'trueslider', 640, 480, true );//1300 550

    if ( ! session_id() ){
        session_start();
        $_SESSION['foodrecipe_count_post'] = get_option( 'posts_per_page' );
        $_SESSION['foodrecipe_sort_post'] = isset($_POST['foodrecipe_sort_post']) ? $_POST['foodrecipe_sort_post'] : 'date';
    }
}
function foodrecipe_register_meta_boxes() {
    add_meta_box( 'foodrecipe_post_in_slider', __( 'Post in slider', 'foodrecipe' ), 'foodrecipe_post_slider', 'post' );
}
function foodrecipe_post_slider( $post ) {
    $checkbox=get_post_meta( $post->ID , 'foodrecipe_display_inslider', true );
    ?> <label> <input type="checkbox" name="checkbox_foodrecipe" value="1" <?php checked($checkbox, 1); ?> ></input> <?php _e( 'in the slider', 'foodrecipe'); ?> </label><?php 
}
function foodrecipe_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
    if ( wp_is_post_revision( $post_id ) ) {
        return;
    }
    if ( isset($_POST['checkbox_foodrecipe']) ) {
        update_post_meta( $post_id, 'foodrecipe_display_inslider', 1 );        
    } else {
        delete_post_meta( $post_id, 'foodrecipe_display_inslider' );
    } 
}
/**
 * Add a sidebar.
 */
function foodrecipe_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Left Sidebar', 'foodrecipe' ),
        'id'            => 'left-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'foodrecipe' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar', 'foodrecipe' ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Widgets in this area will be shown on footer.', 'foodrecipe' ),
        'before_widget' => '<li id="%1$s" class="widget col-12 col-sm-3 %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
/**
 *Add a style.
 */
function foodrecipe_style_script() {    
    wp_enqueue_style( 'foodrecipe_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.5.3' );
    wp_enqueue_style( 'foodrecipe_style', get_stylesheet_uri(), false, '0.1');    
    wp_enqueue_script( 'foodrecipe_script_bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.5.3', true );
    wp_enqueue_script( 'foodrecipe_script', get_template_directory_uri() . '/js/script.js', array( ), '0.1', true );
}
function foodrecipe_change_post_count_order( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if(isset($_POST['foodrecipe_count_post']) === true){
            $query->set( 'posts_per_page', $_POST['foodrecipe_count_post'] );
            //$query->set( 'post__not_in', array( 7, 11 ) );
            $_SESSION['foodrecipe_count_post']=$_POST['foodrecipe_count_post'];
        }           
        if(isset($_POST['foodrecipe_sort_post']) === true){
            $query->set( 'orderby', $_POST['foodrecipe_sort_post'] );
            $query->set( 'order', 'ASC' );
            //$query->set( 'post__not_in', array( 7, 11 ) );
            $_SESSION['foodrecipe_sort_post']=$_POST['foodrecipe_sort_post'];
        }
    }
}
function foodrecipe_excerpt_more( $more ) {
    return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
        esc_url( get_permalink( get_the_ID() ) ),
        sprintf( __( 'Read more', 'foodrecipe' ))
    );
}
//custum functions
function foodrecipe_display_inslider(){
    global $wp_query;
    $old_query = $wp_query;
    $wp_query = new WP_Query( array( 
        'meta_key' => 'foodrecipe_display_inslider',
        'post_type'  => 'post',
        'meta_value' => 1, 
        'post_status' => 'publish'
    ) );
        ?> <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
         <?php
    if ( have_posts( ) ) {
        $count = 0;
        ?>
        <div class="carousel-inner">
            <?php
            while( have_posts( ) ) {
                the_post( );
                ?>            
                <div class="carousel-item <?php if( $count === 0 ) echo 'active'; ?>" style="background-image: url('<?php the_post_thumbnail_url() ?>')">>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="title"><?php the_title( );?></h1>
                        <?php the_excerpt( ); ?>
                        <a class="button" href="<?php the_permalink( ); ?>">read more</a>
                    </div>
                    
                </div>
                <?php
                $count++;
            }        
            ?> 
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
    }
    wp_reset_query();
    $wp_query = $old_query;
}
add_action( 'after_setup_theme', 'foodrecipe_setup' );
add_action( 'add_meta_boxes', 'foodrecipe_register_meta_boxes' );
add_action( 'save_post', 'foodrecipe_save_meta_box' );
add_action( 'widgets_init', 'foodrecipe_widgets_init' );
add_action( 'wp_enqueue_scripts', 'foodrecipe_style_script' );
add_action( 'pre_get_posts', 'foodrecipe_change_post_count_order' );
add_filter( 'excerpt_more', 'foodrecipe_excerpt_more' );