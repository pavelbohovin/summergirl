<?php get_header(); ?>
    <div class="head">
        <div class="first-h">404</div>
    </div>
        <div id="content">
            <div class="error first-h">Страница не найдена</div>
            <p>Запрашиваемая страница на сайте <a href="<?php bloginfo('url');?>">www.summer-girl.ru</a> не найдена.</p>
            <p>Найти интересующие материалы Вы можете воспользовавшись следующими путями:</p>
            <ul>
                <li>перейти на <a href="<?php bloginfo('url');?>">главную страницу</a> сайта</li>
                <li>воспользоваться <a href="<?php bloginfo('url');?>/sitemap/">картой сайта</a></li>
            </ul>
        </div>

    </div>
    <div class="clearfix"></div>
<?php get_footer(); ?>