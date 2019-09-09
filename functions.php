<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

if (!session_id()) {
  session_start();
}

require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
require_once get_template_directory() . '/inc/custom-fields/pages-meta.php';
require_once get_template_directory() . '/inc/custom-fields/tax-meta.php';
require_once get_template_directory() . '/inc/TGM/example.php';
require_once get_template_directory() . '/inc/filters/filters.php';


register_nav_menus( array(
    'head_menu' => 'Меню в шапке',
) );

function addAdminEditorStyle() {
    add_editor_style( get_stylesheet_directory_uri() . 'css/editor-style.css' );
};
// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css', false, time() );
    wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', '','',true);
    wp_enqueue_script( 'animate-puk', get_template_directory_uri() . '/js/animate-puk.js','','',true);
    wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.min.js','','',true);
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js','','',true);
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js','','',true);
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', '','',true);
};

//подключаем стили к админке
function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; 
    $args['post_status'] = 'publish';
 
   
    query_posts( $args );
 
    if( have_posts() ) :
 
        
        while( have_posts() ): the_post();
            get_template_part( 'blocks/default/loop', 'default' );
        
        endwhile;
 
    endif;
    die; 
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); 


function create_post_type() {
    register_post_type( 'teachers',
        array(
            'labels' => array(
                'name' => 'Преподаватели',
                'singular_name' => 'Преподаватель'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
        )
    );
    register_post_type( 'lessons',
        array(
            'labels' => array(
                'name' => 'Занятия',
                'singular_name' => 'Занятие'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
        )
    );
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => 'Мероприятия',
                'singular_name' => 'Мероприятие'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
        )
    );
    register_post_type( 'homeworks',
        array(
            'labels' => array(
                'name' => 'Задания',
                'singular_name' => 'Задание'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
        )
    );
}

add_action( 'init', 'create_post_type' );  

add_action('init', 'create_taxonomy');
function create_taxonomy(){
  register_taxonomy('subject', array('post', 'teachers', 'lessons', 'homeworks'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Направления',
      'singular_name'     => 'Направление',
      'search_items'      => 'Поиск направления',
      'all_items'         => 'Все направления',
      'view_item '        => 'Посмотреть направление',
      'parent_item'       => 'Родительское направление',
      'parent_item_colon' => 'Родительское направление:',
      'edit_item'         => 'Редактировать направление',
      'update_item'       => 'Одновить направление',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новая',
      'menu_name'         => 'Направления',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );

  register_taxonomy('class', array('teachers', 'lessons', 'homeworks'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Класс',
      'singular_name'     => 'Класс',
      'search_items'      => 'Поиск класса',
      'all_items'         => 'Все классы',
      'view_item '        => 'Посмотреть класс',
      'parent_item'       => 'Родительский класс',
      'parent_item_colon' => 'Родительский класс',
      'edit_item'         => 'Редактировать класс',
      'update_item'       => 'Обновить класс',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новая',
      'menu_name'         => 'Классы',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );
}

function my_custom_upload_mimes($mimes = array()) {
    $mimes['svg'] = "image/svg+xml";
    return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

function my_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: url(<?php bloginfo('template_url') ?>/img/logo.svg);
      width: 100%;
      height: 54px;
      background-size: contain;
      padding: 20px 0px;
      background-position: center;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );