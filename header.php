<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title><?php if(is_front_page() || is_404()){ echo get_option('title'); } else { wp_title('', true); }?></title>
    <?php if(get_option('desc')){ ?><meta name="description" content="<?php echo get_option('desc');?>" /><?php } ?>
    <?php if(get_option('keywords')){ ?><meta name="keywords" content="<?php echo get_option('keywords');?>" /><?php } ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css" type="text/css" media="screen, projection" />
    <link href='http://fonts.googleapis.com/css?family=Rufina' rel='stylesheet' type='text/css'>
    <?php wp_enqueue_script("jquery"); ?>
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <?php wp_head(); ?>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
        function initialize() {
            var mapOptions = {
                zoom: 14,
                center: new google.maps.LatLng(55.742224,37.54845),
                disableDefaultUI: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById('gmap'), mapOptions);
            var image = '<?php bloginfo('template_directory');?>/images/marker.png';
            var myLatLng = new google.maps.LatLng(55.742296,37.527559);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        }
    </script>
    <script>
        $(function() {
            $.fn.scrollToTop = function() {
                $(this).hide().removeAttr("href");
                
                if ($(window).scrollTop() >= "250")
                    $(this).fadeIn("fast")
                var scrollDiv = $(this);

                $(window).scroll(function() {
                    if ($(window).scrollTop() <= "250") 
                        $(scrollDiv).fadeOut("fast")
                    else
                        $(scrollDiv).fadeIn("fast")
                });

                $(this).click(function() {
                    $("html, body").animate({scrollTop: 0}, "fast")
                });
            }

            $("#Go_Top").scrollToTop();
        });
    </script>
    <?php if(is_front_page()){ ?>
        <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jcarousellite.js"></script>
        <script type="text/javascript">
            jQuery(function($) {
                if( $(".carousel_slide .carousel ul li").length <= 1 ) {
                    $(".prev").hide();
                    $(".next").hide();
                }
                $(".carousel_slide .carousel").jCarouselLite({
                    btnNext: ".next",
                    btnPrev: ".prev",
                    visible: 1,
                    vertical: false,
                    scroll: 1,          
                    speed: 400
                });
            });
        </script>
    <?php } ?>
</head>
<?php 
    $class = "";
    if(is_front_page()) $class .= " home" ;
    if(is_single()) $class .= " single" ;
    if(is_page()) $class .= " page" ; 
    if(is_page_template('contacts.php')) $class .= " contacts" ; 
    if(is_category()) $class .= " category" ; 
    if(is_page('o-brende')) $class .= " brand" ; 
?>
<body <?php if(is_page_template('contacts.php')){ ?>onload="initialize()"<?php } ?> class="<?php echo $class; ?>">
    <?php if(is_front_page()) { ?>
        <div class="frontslider">
            <div class="front-wrapper">
                <header class="slider-header">
                    <div class="logo">
                        <span class="summer">Summer</span><span class="girl">girl</span>
                    </div>
                    <nav class="slider-nav">
                        <?php wp_nav_menu('menu=main menu&container='); ?>
                    </nav>
                    <div class="social">
                        <a href="http://<?php echo get_option('link_vk');?>" class="vk" ></a>
                        <a href="http://<?php echo get_option('link_y');?>" class="youtube" ></a>
                        <a href="http://<?php echo get_option('link_i');?>" class="inst" ></a>
                        <a style='position: fixed; bottom: 50px;  cursor:pointer; display:none; z-index: 9999;'
                        href='#' id='Go_Top'>
                            <img src="<?php bloginfo('template_directory');?>/images/icon_up.png" alt="Наверх" title="Наверх">
                        </a>
                    </div>
                    <div class="scroll-bg"></div>
                </header>
                <div class="carousel_slide">
                    <div class="main">
                        <div class="carousel">
                            <ul>
                                <?php query_posts('post_type=collections'); ?>
                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <li>
                                        <div class="block">
                                            <?php echo get_the_content(); ?>
                                            <a href="<?php if(get_post_meta($post->ID, 'service', true) != "") {echo get_post_meta($post->ID, 'service', true);} else { echo "#"; } ?>" class="all">Перейти к каталогу продукции</a>
                                        </div>
                                    </li>
                                    <?php endwhile; endif;  ?>
                                <?php wp_reset_query();  ?>  
                            </ul>
                        </div>
                        <input type="button" value="" class="prev" />
                        <input type="button" value="" class="next" />
                    </div>
                </div>
            </div>
        </div>
        <?php query_posts('posts_per_page=4&meta_key=new_models&meta_value=on'); if (have_posts()) { ?>
            <div class="white-wrapper">
                <div class="new-models">
                    <div class="head">
                        <h2>Новые модели</h2>
                        <div class="link">
                            <a href="<?php bloginfo('url'); ?>/catalog/novye-modeli" class="afterhead grey">Смотреть все модели</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">   
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="item">
                                <?php the_post_thumbnail('in_category'); ?>
                                <div class="zoom"></div>
                                <div class="item-name"><?php the_title(); ?></div>
                            </a>
                        <?php endwhile; endif;  ?>
                    </div>
                </div>
            </div>
        <?php } wp_reset_query();  ?>
    <?php }  ?>
    
    <?php if(is_page_template('contacts.php')) { ?>
        <div id="gmap"></div>
    <?php } ?>
    <?php if(!is_front_page()) { ?>
        <div class="main-menu">
            <header class="slider-header pink">
                <div class="logo">
                    <a href="<?php bloginfo('url');?>"><span class="summer">Summer</span><span class="girl">girl</span></a>
                </div>
                <nav class="slider-nav">
                    <?php wp_nav_menu('menu=main menu&container='); ?>
                </nav>
                <div class="social">
                    <a href="http://<?php echo get_option('link_vk');?>" class="vk" ></a>
                    <a href="http://<?php echo get_option('link_y');?>" class="youtube" ></a>
                    <a href="http://<?php echo get_option('link_i');?>" class="inst" ></a>
                    <a style='position: fixed; bottom: 50px;  cursor:pointer; display:none; z-index: 9999;'
                    href='#' id='Go_Top'>
                        <img src="<?php bloginfo('template_directory');?>/images/icon_up.png" alt="Наверх" title="Наверх">
                    </a>
                </div>
            </header>
            <?php if(is_page_template('contacts.php') && get_option('block1') != ""){ ?>
                <address class="mapinfo">
                    <?php echo get_option('block1');?>
                </address>
            <?php } ?>
        </div>
    <?php } ?>

<div id="wrapper">