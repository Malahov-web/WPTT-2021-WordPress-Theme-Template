<?php

/*
 * 1. add_styles_formats_to_editor() - add custom styles formats to mce editor in admin
 * 
 *
 *
 *
 *
 *
 */


 

/*
 *   8. Custom editor styles
 *
*//***************************************************************************************/

/*
* Функция добавления кнопок в редактор
*/


function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');



/*
* Функция вызова фильтра для настроек MCE
*/

function my_mce_before_init_insert_formats( $init_array ) {

    // Определяем массив style_formats
    
        $style_formats = array(
            // Каждый дочерний элемент  - формат со своими собственными настройками

            // array(
            //     'title' => 'Blue Button',
            //     'block' => 'span',
            //     'classes' => 'blue-button',
            //     'wrapper' => true,
            // ),
            array(
                'title' => 'Two-columns List',
                'block' => 'div',
                'classes' => 'two-columns-list',
                'wrapper' => true,
            ),
        );
        // Вставляем массив, JSON ENCODED, в 'style_formats'
        $init_array['style_formats'] = json_encode( $style_formats );
    
        return $init_array;
    
    }
// Прикрепляем вызов к 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
    