<?php get_header(); ?>
    <div class="breadcrumbs">
        <?php if(function_exists('bcn_display')) {
            bcn_display();
        } ?>
    </div>
    <div class="head">
        <div class="first-h"><?php the_title(); ?></div>            
        <div class="link">
            <?php 
                $category = get_the_category(); 
                echo '<a href="'.get_category_link($category[0]->term_id ).'" class="afterhead grey">Вернуться к каталогу</a>';
            ?>  
        </div>
    </div>
    <div id="content">
        <?php if ( has_post_thumbnail() ) { ?>
            <div id="scroll">
                <div class="prev"></div>
                <div class="next"></div>
                
                <!-- scrollable items -->
                <div id="tools">
                    <!-- empty slot -->
                    <div class="tool">
                        &nbsp;
                    </div>

                    <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image', NULL)) { ?>
                        <div class="tool">
                            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image', NULL,  'item-full'); endif; ?>
                        </div>
                    <?php } ?>

                    <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'third-image', NULL)) { ?>
                        <div class="tool">
                            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'third-image', NULL,  'item-full'); endif; ?>      
                        </div>
                    <?php } ?>

                    <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'forth-image', NULL)) { ?>
                        <div class="tool">
                            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'forth-image', NULL,  'item-full'); endif; ?>      
                        </div>
                    <?php } ?>

                    <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'fifth-image', NULL)) { ?>
                        <div class="tool">
                            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'fifth-image', NULL,  'item-full'); endif; ?>      
                        </div>
                    <?php } ?>
                    
                    <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'six-image', NULL)) { ?>
                        <div class="tool">
                            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'six-image', NULL,  'item-full'); endif; ?>        
                        </div>
                    <?php } ?>
                    
                    <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'seven-image', NULL)) { ?>
                        <div class="tool">
                            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'seven-image', NULL,  'item-full'); endif; ?>      
                        </div>
                    <?php } ?>
                </div>

                <!-- intro "page" -->
                <div id="intro" class="tool">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail('item-full'); ?>
                    <?php } ?>
                </div>

                <!-- required for IE6/IE7 -->
                <br clear="all" />

                <!-- thumbnails -->
                <div id="thumbs" class="t">
                    <!-- scrollable navigator root element -->            
                    <div class="navi">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <a id="t0" class="active"><?php the_post_thumbnail('mini'); ?></a>
                        <?php } ?>
                        <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image', NULL)) { ?>
                            <a id="t1"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image', NULL,  'mini'); endif; ?></a>
                        <?php } ?>
                        <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'third-image', NULL)) { ?>
                            <a id="t2"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'third-image', NULL,  'mini'); endif; ?></a>
                        <?php } ?>
                        <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'forth-image', NULL)) { ?>
                            <a id="t3"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'forth-image', NULL,  'mini'); endif; ?></a>
                        <?php } ?>
                        <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'fifth-image', NULL)) { ?>
                            <a id="t4"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'fifth-image', NULL,  'mini'); endif; ?></a>
                        <?php } ?>
                        <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'six-image', NULL)) { ?>
                            <a id="t5"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'six-image', NULL,  'mini'); endif; ?></a>
                        <?php } ?>
                        <?php if(MultiPostThumbnails::has_post_thumbnail('post', 'seven-image', NULL)) { ?>
                            <a id="t6"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'seven-image', NULL,  'mini'); endif; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <script>
                // initialize scrollable and return the programming API
                var api = $("#scroll").scrollable({
                items: '#tools'

                // use the navigator plugin
                }).navigator().data("scrollable");


                // this callback does the special handling of our "intro page"
                api.onBeforeSeek(function(e, i) {

                    // when on the first item: hide the intro
                    if (i) {
                        $("#intro").fadeOut("slow");

                        // dirty hack for IE7-. cannot explain
                        if ($.browser.msie && $.browser.version < 8) {
                            $("#intro").hide();
                        }

                        // otherwise show the intro
                    } else {
                        $("#intro").fadeIn(1000);
                    }

                    // toggle activity for the intro thumbnail
                    $("#t0").toggleClass("active", i == 0);
                });

                // a dedicated click event for the intro thumbnail
                $("#t0").click(function() {

                    // seek to the beginning (the hidden first item)
                    $("#scroll").scrollable().begin();
                });

                $(".tool").each(function(){
                    if( parseInt($(this).children(".attachment-item-full").height()) < 450 ){
                       i_h = (450 - parseInt($(this).children(".attachment-item-full").height()))/2;
                       $(this).children(".attachment-item-full").css("margin-top", i_h+"px");
                   }
                });

                $(".navi a").each(function(){
                    if( parseInt($(this).children(".attachment-mini").height()) < 56 ){
                       i_h = (56 - parseInt($(this).children(".attachment-mini").height()))/2;
                       $(this).children(".attachment-mini").css("margin-top", i_h+"px");
                   }
                });
                if($(".navi a").length == 1){
                    $(".navi").hide();
                }

                if($(".navi").is(":hidden")){
                    $("#scroll").height(500);
                }
            </script>
        <?php } ?>
        <div class="item-desc">
            <div class="left-side">         
                <p><?php if(get_post_meta( $post->ID , 'service2', true) != ""){ ?><span>Aртикул: </span><?php } ?><?php echo get_post_meta( $post->ID , 'service2', true)?></p>
                <p><?php if(get_post_meta( $post->ID , 'service4', true) != ""){ ?><span>Цвет: </span><?php } ?><?php echo get_post_meta( $post->ID , 'service4', true)?></p>
            </div>
            <div class="right-side">
                <p><?php if(get_post_meta( $post->ID , 'service5', true) != ""){ ?><span>Состав: </span><?php } ?><?php echo get_post_meta( $post->ID , 'service5', true)?></p>
                <p class="sizes"><span class="with-color" >Размеры: </span>
                    <?php
                      $min_size = 35;
                      $max_size = 41;
                       for( $i = $min_size; $i <= $max_size; $i++) { ?>
                         <?php if(get_post_meta($post->ID, 'service'.$i, true)=="on"){ ?><span class="with-color sans-r"><?php echo $i." "; ?></span><?php } else { echo $i." "; } ?>
                    <?php } ?>  
                </p>
            </div>
            <div class="clearfix"></div>
            <a href="<?php bloginfo('url');?>/gde-kupit/" class="where">Где<br />купить?</a>
        </div>
        <div class="clearfix"></div>

        <?php if ( have_posts() )  : the_post(); 
                    $content = get_the_content();
                endif; ?>

        <?php if($content != ""){ ?>
            <article class="desc">
                <div class="head">
                    <h3>Описание</h3>           
                </div>
                <?php echo $content; ?>
            </article>
        <?php } ?>
    
    </div><!-- #content-->

</div><!-- #wrapper -->

<div class="clearfix"></div>
<?php get_footer(); ?>