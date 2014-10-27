<?php get_header(); if(!is_front_page()){ ?>
    
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
<?php } ?>
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