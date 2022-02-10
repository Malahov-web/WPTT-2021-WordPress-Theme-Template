<?php

/*
 * 1. acf_add_options_page()  - add options page in main menu
 * 2. add_excerpt_for_pages() - add excerpt for page type
 * 3. svg_upload_allow() - add svg type for files to upload in admin
 * 4. my_theme_add_editor_styles() - add my theme styles to editor
 * 5. add_styles_formats_to_editor() - add custom styles formats to mce editor in admin
 * 6. true_apply_tags_for_pages() - add my theme styles to editor
 * 7. add_post_columns() - add and fill post columns in page list in admin
 *
 *
 *
 *
 */


// Опции - Страница настроек на ACF
/*
 * acf_add_options_page()
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(
        array(
        'page_title' => 'Опции',
        'menu_title' => 'Опции',
        'menu_slug' => 'theme-contacts-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-art',
        'position' => '60',
        'redirect' => false
        )
    );
}




//Добавление "Цитаты" для страниц
/*
 * add_excerpt_for_pages()
 */
function add_excerpt_for_pages() {
    add_post_type_support('page', array('excerpt'));
}
add_action('init', 'add_excerpt_for_pages');
//Добавление "Цитаты" для страниц – КОНЕЦ КОДА




/*
 *  3. SVG upload to admin
 *
*//***************************************************************************************/

// Подключение файлов
get_template_part( 'functions/admin/svg_upload_allow' ); // без расширения




// Добавление стилей темы для контента в редакторе 
/*
 * my_theme_add_editor_styles()
 */

add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

function my_theme_add_editor_styles() {

	add_editor_style( 'css/editor-styles.css' );
	// необходимая поддержка add_theme_support( 'editor-style' ); активируется автоматом
}




/*
 *  5. add custom styles formats to mce editor in admin
 *
*//***************************************************************************************/

// Подключение файлов
get_template_part( 'functions/admin/add_styles_formats_to_editor' ); // без расширения




// Добавляем метки к страницам 
/*
 * true_apply_tags_for_pages()
 */

function true_apply_tags_for_pages(){
	add_meta_box( 'tagsdiv-post_tag', 'Теги', 'post_tags_meta_box', 'page', 'side', 'normal' ); // сначала добавляем метабокс меток
	register_taxonomy_for_object_type('post_tag', 'page'); // затем включаем их поддержку страницами wp
}
 
add_action('admin_init','true_apply_tags_for_pages');
 
function true_expanded_request_post_tags($q) {
	if (isset($q['tag'])) // если в запросе присутствует параметр метки
		$q['post_type'] = array('post', 'page');
	return $q;
}
 
add_filter('request', 'true_expanded_request_post_tags');




/*
 *  7. add and fill post columns in page list in admin
 *
*//***************************************************************************************/

// Подключение файлов
get_template_part( 'functions/admin/add_post_columns' ); // без расширения



// What is it?)
//
// function typed_script_init() {
//     wp_enqueue_script( 'typedJS', 'https://pro.crunchify.com/typed.min.js', array('jquery') );
// }
// add_action('wp_enqueue_scripts', 'typed_script_init');
 
// function typed_init() {
//     echo '<script>
// 	jQuery(function($){
//       		$(".element").typed({
//       	 	strings: ["App Shah...", " an Engineer (MS)...","a WordPress Lover...", "a Java Developer..."],
//       	 	typeSpeed:100,
//      		backDelay:1000,
//      		loop:true
// 	});
//      });</script>';
// }
// add_action('wp_footer', 'typed_init');
