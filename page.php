<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage malahov_web
 * @since kapital_pvk 1.0
 * @author Kirill Malahov
 */

get_header();

// Доп поля
// $section_contact_form_title = get_field('section_contact_form_title');
// $section_contact_form_content = get_field('section_contact_form_content');
?>




<?php //get_sidebar('left'); ?>         
<?php //get_sidebar('right'); ?>




        <section class="section section-article">
            <div class="container">


                <div class="row">
                    <div class="mv_12 lefted">
                        <h2 class="section__title">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                </div>


                <article class="article content mt-md">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

                </article>


            </div>
        </section>




<?php get_footer();
