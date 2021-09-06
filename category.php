<?php
/*
Примечание : Пагинация работает если использовать как в станд. темах ф-ю  while ( have_posts() ) : the_post();
Пагинация также работает если испльзовать WP Query (проверить)
Если использовать offset , то пагинация не работает
*/

/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage theme_name
 * @since theme_name 1.0
 * @author Kirill Malahov
 */

get_header(); ?>

<?php 
$this_cat_id = get_query_var('cat');  // id
$this_cat_object = get_queried_object(); // Object,  get the current taxonomy term 
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

// $category_image = get_field('category_image', $this_cat_object);
// $category_description = get_field('category_description', $this_cat_object);


?>




<main class="section section-news">
    <div class="container">


        <div class="__news row-flex">
            <div class="mv_12 lefted">
                <h1 class="section__title ? page__title">
                    <?php  echo $this_cat_object->name; ?>
                </h1>
            </div>
        </div>




        
        <?php if ( have_posts() ) : ?>
        <div class="news row-flex">


            <?php while ( have_posts() ) : the_post();
            $i++;
            ?>
                <div class="mv_12  ds_10 ds_offset_1  hd_10 hd_offset_1 news__item-outer">

                    <article class="news__item">
                        <h2 class="section__title news__item-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>


                        <div class="news__item-inner">
                            <div class="news__item-image-outer">
                                <figure class="news__item-image">
                                    
                                    <?php echo get_the_post_thumbnail( $post->ID, 'news_item_160_240' ); ?>

                                
                                    <!-- <picture>
                                        <source media="(min-width: 0)" srcset="uploads/news/news-item-img-1.jpg">
                                            <img alt="Ипотечный центр полного цикла" src="uploads/news/news-item-img-1.jpg">
                                        
                                        </source>
                                    </picture> -->


                                    <?php
                                    $caption = get_the_post_thumbnail_caption();

                                    if ( $caption ) { ?>
                                        <figcaption class="wp-caption-text">
                                            <?php echo esc_html( $caption ); ?>
                                        </figcaption>
                                    <?php
                                    } ?>                                    

                                </figure>
                            </div>

                            <div class="news__item-content">
                                <div class="news__item-text">
                                    <?php the_excerpt(); // the_content(); ?>
                                </div>

                                <div class="news__item-buttons">

                                    <a href="<?php the_permalink(); ?>" class="button button-buy">
                                        <span>Читать далее </span>
                                    </a>

                                </div>
                            </div>
                        </div>


                    </article>

                </div>
            <?php endwhile; ?>


            <!-- <div class="mv_12">
                <?php // the_posts_pagination(); ?>
            </div> -->


        </div>
        <?php endif ;  ?>


    </div>
</main>