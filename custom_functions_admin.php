<?php

/*
 * 1. acf_add_options_page()  - add options page in main menu
 * 2. add_excerpt_for_pages() - add excerpt for page type
 * 3. svg_upload_allow() - add avg type for files to upload in admin
 * 
 *
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




// SVG upload to admin
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}


add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}


add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {

	if ( $response['mime'] === 'image/svg+xml' ) {

		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}



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
