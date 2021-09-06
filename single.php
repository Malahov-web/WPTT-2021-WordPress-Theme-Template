<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage malahov_web
 * @since kapital_pvk 1.0
 * @author Kirill Malahov
 */

get_header();

$post_id = $post->ID;

// Доп поля
// $section_contact_form_title = get_field('section_contact_form_title');
// $section_contact_form_content = get_field('section_contact_form_content');
?>


<?php //get_sidebar('left'); ?>         
<?php //get_sidebar('right'); ?>




        <main class="section section-article">
            <article class="container">


                <header class="row">
                    <div class="mv_12 lefted">
                        <h2 class="section__title">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                </header>


                <div class="article content mt-md">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

                </div>


            </article>
        </main>






<?php get_footer();
