<?php if(!is_page_template('contacts.php')){ ?>
    <footer id="footer">
        <div class="head">
            <h3>Контакты</h3>
            <div class="link">
                <a href="<?php echo get_option('contacts_link');?>" class="afterhead">Написать сообщение с сайта</a>
            </div>
        </div>
        <?php if( get_option('block2') != "") { ?>
            <address class="mapinfo">
                <?php echo get_option('block2');?>
            </address>
        <?php } ?>
    </footer><!-- #footer -->

    <div id="gmap" class="img-map" ></div>
<?php } ?>

<div class="copyright">
    <?php if(is_single()){ ?>
        <div class="desc-bg"></div>
    <?php } ?>
    <?php if(!is_page_template('contacts.php')){ ?>
        <div class="top-bord"></div>
        <div class="bottom-bord"></div>
    <?php } ?>
    <div class="incopyright">
        <?php echo get_option('copyright_notice');?> <a href="<?php echo get_option('sitemap_link');?>">Карта сайта</a>
    </div>
</div>
<?php wp_footer(); ?>

<script type="text/javascript">
    jQuery(function($) {
        $(".head").each(function(){
            head_width = parseInt($(this).children(".center-head").width());
            $(this).children("div.line").width(((930 - head_width)/2));     
        });
        bg_h = parseInt($(".desc").height()) + 120 + 93;
        bg_top = bg_h + 353;
        $(".desc-bg").height(bg_h);
        $(".desc-bg").css("top","-" + bg_top + "px");
        ;
    });
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter20658001 = new Ya.Metrika({id:20658001,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/20658001" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-26329044-2']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
s
</body>
</html>