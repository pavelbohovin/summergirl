<?php 
/*
 * Template name: All models
 */
get_header(); ?>
    <div class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
    <script type="text/javascript">
        $(function() {
            $(".ctg").remove();
        });
    </script>
    <div class="head">
        <div class="first-h"><?php the_title(); ?></div>            
    </div>
    <div id="content">
        <?php if ( have_posts() )  : the_post(); 
                the_content();
            endif; ?>
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
    </div><!-- #content-->

</div><!-- #wrapper -->
<div class="clearfix"></div>
<?php get_footer(); ?>