<?php get_header(); ?>
    <a href="<?php bloginfo('url'); ?>/catalog/vse-modeli" class="all-boots">Cмотреть все на одной странице</a>
    <div class="breadcrumbs">
        <?php if(function_exists('bcn_display')) {bcn_display(); } ?>
    </div>

    <div id="content">
            <div class="one-category">
                <div class="head">
                    <div class="first-h"><?php single_cat_title(); ?></div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <?php query_posts('posts_per_page=-1&cat='.$cat); ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="item">
                                <?php the_post_thumbnail('in_category'); ?>
                                <div class="zoom"></div>
                                <div class="item-name"><?php the_title(); ?></div>
                            </a>
                        <?php endwhile; endif;  ?>
                    <?php wp_reset_query();  ?> 
                </div>
                <article class="cat-desc">
                     <?php echo category_description( getCurrentCatID() ); ?>
                </article>
            </div>
    </div>

</div><!-- #wrapper -->
<div class="clearfix"></div>
<?php get_footer(); ?>