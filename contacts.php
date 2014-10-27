<?php 
/*
 * Template name: Contacts
 */
get_header(); ?>
    <div class="head">
        <div class="first-h">Оставьте ваше мнение</div>         
    </div>
    <div id="content">
        <?php 
            if ( have_posts() )  : the_post(); 
                the_content();
            endif;
        ?>
    </div>

</div>
<div class="clearfix"></div>
<?php get_footer(); ?>