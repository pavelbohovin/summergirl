<?php 
/*
 * Template name: Page with links
 */
get_header(); ?>
    <div class="breadcrumbs">
        <ul class="all-cats">
            <?php wp_list_pages( array('child_of' => $post->ID, 'title_li' => __('')) ); ?>
        </ul>
    </div>

    <div class="head">
        <div class="first-h good"><?php if(is_front_page()) { echo "О бренде"; }  else { echo get_the_title(); } ?></div>           
    </div>
    
    <div id="content">
        <?php if ( have_posts() )  : the_post(); 
            the_content();
        endif; ?>
    </div><!-- #content-->

</div><!-- #wrapper -->
<div class="clearfix"></div>
<?php get_footer(); ?>