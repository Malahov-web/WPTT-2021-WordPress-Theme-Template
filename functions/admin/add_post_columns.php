<?php

/*
 * 1. page_add_post_columns() - add columns with 'post-template' to pages list in admin
 * 
 *
 *
 *
 *
 *
 */


 

// 1.3 Добавляем колонки с списке записей (кастомных) в админке
 
function page_add_post_columns($my_columns){
	// $my_columns = array(
	    // 'cb' => '<input type="checkbox" />',
		// 'title' => __('Title'),
		// 'thumbnail' => __('Thumbnail'),
		// 'page_template' => __('Шаблон страницы'),		
		// 'author' => __('Author'),
		// 'date' => __('Date')
	// );
	
	$my_columns['page_template'] = 'Шаблон страницы';
	$my_columns['thumbnail'] = __('Thumbnail');
	
	return $my_columns;
}
 
add_filter( 'manage_edit-page_columns', 'page_add_post_columns', 10, 1 );


// 1.4 Заполняем колонки

function mw_page_fill_post_columns( $column ) {
	global $post;
	
	switch ( $column ) {
		case 'page_template':
		
			echo get_post_meta( $post->ID, '_wp_page_template', true);
			//echo 'шаблон';

			break;

		case 'thumbnail':
			echo get_the_post_thumbnail($post->ID,'thumbnail_75_50');
			break;			
					
	}
	
}
 
//add_action( 'manage_posts_custom_column', 'mw_page_fill_post_columns', 10, 1 );
//add_action( 'manage_page_posts_column', 'mw_page_fill_post_columns', 10, 1 );
add_action('manage_pages_custom_column', 'mw_page_fill_post_columns', 10, 1);
