<?php 
/*
 * Template name: Catalog
 */
get_header(); ?>

    <?php $args = array(
                    'show_option_all'    => '',
                    'orderby'            => 'name',
                    'order'              => 'DESC',
                    'style'              => 'list',
                    'show_count'         => 0,
                    'hide_empty'         => 0,
                    'use_desc_for_title' => 0,
                    'child_of'           => 0,
                    'feed'               => '',
                    'feed_type'          => '',
                    'feed_image'         => '',
                    'exclude'            => '1',
                    'exclude_tree'       => '',
                    'include'            => '',
                    'hierarchical'       => 0,
                    'title_li'           => '',
                    'show_option_none'   => '',
                    'number'             => null,
                    'echo'               => 1,
                    'depth'              => 0,
                    'current_category'   => 0,
                    'pad_counts'         => 0,
                    'taxonomy'           => 'category',
                    'parent'             => 0,
                    'walker'             => null
                ); ?>

    <a href="<?php bloginfo('url'); ?>/catalog/vse-modeli" class="all-boots">Cмотреть все на одной странице</a>
    
    <div class="breadcrumbs">
        <ul class="all-cats">
            <?php wp_list_categories($args); ?>
        </ul>
    </div>

    <div id="content">
        <?php 
            $categories = get_categories($args);
            foreach ($categories as $c) { ?>
                <div class="one-category four-items">
                    <div class="head">
                        <div class="first-h"><?php echo $c->cat_name; ?></div>
                        <div class="link">
                            <a href="<?php echo get_category_link($c->term_id); ?>" class="afterhead grey">Смотреть все модели</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <?php query_posts('posts_per_page=4&cat='.$c->term_id); ?>
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
                    
                    </article>
                </div>
        <?php } ?>
    </div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>