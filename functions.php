<?php 
// after setup theme hook
function launcher_setup_theme(){
    load_default_textdomain('launcher');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'launcher_setup_theme');

// wp enqueue scripts
function launcher_assets(){
    if(is_page()){
        $launcher_template_name = basename(get_page_template());
        if($launcher_template_name == "launcher.php"){
            // CSS Files
            wp_enqueue_style("animate", get_theme_file_uri("/assets/css/animate.css"));
            wp_enqueue_style("bootstrap", get_theme_file_uri("/assets/css/bootstrap.css"));
            wp_enqueue_style("icomoon", get_theme_file_uri("/assets/css/icomoon.css"));
            wp_enqueue_style("style", get_theme_file_uri("/assets/css/style.css"));
            wp_enqueue_style("launcher", get_stylesheet_uri());

            // JS Files
            wp_enqueue_script("easing", get_theme_file_uri("/assets/js/jquery.easing.1.3.js"), array('jquery'), null, true);
            wp_enqueue_script("bootstrap", get_theme_file_uri("/assets/js/bootstrap.min.js"), array('jquery'), null, true);
            wp_enqueue_script("waypoints", get_theme_file_uri("/assets/js/jquery.waypoints.min.js"), array('jquery'), null, true);
            wp_enqueue_script("countdown", get_theme_file_uri("/assets/js/simplyCountdown.js"), array('jquery'), null, true);
            wp_enqueue_script("main", get_theme_file_uri("/assets/js/main.js"), array('jquery'), null, true);
        }else{
            wp_enqueue_style("animate", get_theme_file_uri("/assets/css/animate.css"));
            wp_enqueue_style("bootstrap", get_theme_file_uri("/assets/css/bootstrap.css"));
            wp_enqueue_style("launcher", get_stylesheet_uri());
        }
    }
    
}
add_action('wp_enqueue_scripts', 'launcher_assets');

// widget init hook
function launcher_widgets_sidebar(){
    register_sidebar(array(
        'name' => __('Footer Left', 'Footer Left'),
        'id' => 'footer-left',
        'description' => __('Footer Left', 'Footer Left'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => __('Footer Right', 'Footer Right'),
        'id' => 'footer-right',
        'description' => __('Footer Right', 'Footer Right'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'launcher_widgets_sidebar');

// wp_head hook
function launcher_styles(){
    if(is_page()){
        $thumbnail_url = get_the_post_thumbnail_url(null, "large" );
        ?> 
            <style> 
                .side-image{
                    background-image: url(<?php echo $thumbnail_url; ?>);
                }
            </style>
        <?php
    }
}
add_action('wp_head', 'launcher_styles');