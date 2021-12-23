<?
/*
TODO:
 template() renderTemplate() - подключение get_template_part() и передача парам-в для set_query_var()

*/
/*
 * 1. renderLogo()  -  render logo with or w/o link <a>
 * 2. theme_path()  -  echo theme path
 * 3. formatPhone()  -  clean all chars except digits, for href=tel:
 * 
 *
 *
 *
 *
 *
 */



/*
 * renderLogo()
 */

if ( ! function_exists( '__renderLogo' ) ) {

	function __renderLogo( $logo_class = '' ) {

		if ( is_front_page()  ) {
			$logo_href = '#';
			$logo_tag = 'span';
		} else {
			$logo_href = '/';
			$logo_tag = 'a';

		}
		?>

		<div class="logo <?php echo $logo_class; ?>">
			<<?php echo $logo_tag; ?> href="<?php echo $logo_href; ?>">
                <img src="<?php echo get_template_directory_uri(); // Ссылка на папку темы ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>">
            </<?php echo $logo_tag; ?>>
		</div>

		<?php		
	}

}


if ( ! function_exists( 'renderLogo' ) ) {

	function renderLogo( $logo_class = '' ) {

        // Front page
		if ( is_front_page()  ) {
        ?>

            <div class="logo <?php echo $logo_class; ?>">
                <span>
                    <img src="<?php echo get_template_directory_uri(); // Ссылка на папку темы ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>">
                </span>
            </div>

        <?php
        // Inner pages
		} else {
        ?>

            <div class="logo <?php echo $logo_class; ?>">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri(); // Ссылка на папку темы ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            </div>

        <?php
		}
	
	}

}




/*
 * theme_path()
 */
/* <?php theme_path(); ?>  */
if ( ! function_exists( 'theme_path' ) ) {

    function theme_path() {

        echo get_template_directory_uri();
        // return;
    }

}




/*
 * formatPhone()
 */
if ( ! function_exists( 'formatPhone' ) ) {

    function formatPhone(String $phone) {

        // phone
        $phone_formatted = str_replace ( ['(', ')', ' '] , '' , $phone  );

        return $phone_formatted;
    }

}




/*
 * getProductCategories()
 */

if ( ! function_exists( 'getProductCategories' ) ) {

	function getProductCategories() {


        $categories_args = [
            'taxonomy'      => [ 'category' ], // название таксономии с WP 4.5
            'orderby'       => 'id',
            'order'         => 'ASC',
            // 'child_of'         => '', // id int, - все дочерние термины (все уровни вложенности)
            'parent'         => '3', // 3 - products;  // id int - только прямые потомки
            'hide_empty'    => false,
        ];
        
        $categories =  get_terms( $categories_args );  

        return $categories;


	}

}


