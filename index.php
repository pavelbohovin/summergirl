<?php get_header(); ?>

    <div id="content">
        <?php
            if ( have_posts() )  : the_post(); 
                the_content();
            endif;
        ?>
    </div><!-- #content-->

</div><!-- #wrapper -->
<div class="clearfix"></div>
<?php get_footer(); ?>