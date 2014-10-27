<?php
add_filter('category_link', create_function('$a', 'return str_replace("category/", "", $a);'), 9999);
register_nav_menu( 'main menu', 'Main menu' );

if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Ракурс 2',
                'id' => 'secondary-image',
                'post_type' => 'post'
            )
        );
        new MultiPostThumbnails(
            array(
                'label' => 'Ракурс 3',
                'id' => 'third-image',
                'post_type' => 'post'
            )
        );
        new MultiPostThumbnails(
            array(
                'label' => 'Ракурс 4',
                'id' => 'forth-image',
                'post_type' => 'post'
            )
        );
        new MultiPostThumbnails(
            array(
                'label' => 'Ракурс 5',
                'id' => 'fifth-image',
                'post_type' => 'post'
            )
        );
        new MultiPostThumbnails(
            array(
                'label' => 'Ракурс 6',
                'id' => 'six-image',
                'post_type' => 'post'
            )
        );
        new MultiPostThumbnails(
            array(
                'label' => 'Ракурс 7',
                'id' => 'seven-image',
                'post_type' => 'post'
            )
        );
    }

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' ); 
    add_image_size( 'item-full', 680, 450, true ); 
    add_image_size( 'in_category', 175, 175, true ); 
    add_image_size( 'mini', 56, 56, true ); 
}

/* Shortcodes */
// [head title="О бренде"]
function block_head( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'title' => ''
    ), $atts));
    $block_head = '
        <div class="head">
            <h3>' . $title . '</h3>
        </div>';
    return $block_head;
}
add_shortcode('head', 'block_head');

// Create Custom post type collections
	
add_action('init', 'collections_custom_init');

function collections_custom_init() 

{

  $labels = array(

    'name' => _x('Коллекции', 'post type general name'),

    'singular_name' => _x('Коллекции', 'post type singular name'),

    'add_new' => _x('Добавить новые', 'Коллекции'),

    'add_new_item' => __('Добавить новые Коллекции'),

    'edit_item' => __('Редактировать Коллекции'),

    'new_item' => __('Новые Коллекции'),

    'all_items' => __('Все Коллекции'),

    'view_item' => __('Просмотреть Коллекции'),

    'search_items' => __('Поиск Коллекции'),

    'not_found' =>  __('Не найдены Коллекции'),

    'not_found_in_trash' => __('Не найдены Коллекции в корзине'), 

    'parent_item_colon' => '',

    'menu_name' => 'Коллекции'



  );

  $args = array(

    'labels' => $labels,

    'public' => true,

    'publicly_queryable' => true,

    'show_ui' => true, 

    'show_in_menu' => true, 

    'query_var' => true,

    'rewrite' => true,

    'capability_type' => 'post',

    'has_archive' => true, 

    'hierarchical' => false,

    'menu_position' => null,

    'supports' => array('title','editor', 'excerpt','thumbnail')

  ); 

  register_post_type('collections',$args);

}

/* Define the custom box */
add_action( 'add_meta_boxes', 'of_add_custom_box' );
add_action( 'save_post', 'of_save_postdata' );

function of_add_custom_box() {
    add_meta_box(
        'of_service',
        __( 'Ccылка на коллекцию', 'of_textdomain' ),
        'of_inner_custom_box',
        'collections'
    );
}

function of_inner_custom_box( $post ) { ?>
    <input type="text" id="of_service" size="100" name="of_service" value="<?php echo get_post_meta($post->ID, 'service', true); ?>" />
<?php }

function of_save_postdata( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;
    
    update_post_meta( $post_id , 'service', $_POST['of_service']);
}
        
add_action( 'add_meta_boxes', 'of_add_custom_box2' );
add_action( 'save_post', 'of_save_postdata2' );

/* Adds a box to the main column on the Post and Page edit screens */
function of_add_custom_box2() {
    add_meta_box(
    'of_service2',        
    __( 'Дополнительные опции', 'of_textdomain' ),
    'of_inner_custom_box2',
    'post'
    );
}

/* Prints the box content */
function of_inner_custom_box2( $post ) { ?>

    <label for="of_service2" style="width:60px; display: inline-block;">Артикул: </label>
    <input type="text" id="of_service2" size="30" name="of_service2" value="<?php echo get_post_meta($post->ID, 'service2', true); ?>" /><br />
    <label for="of_service4" style="width:60px; display: inline-block;">Цвет: </label>
    <input type="text" id="of_service4" size="80" name="of_service4" value="<?php echo get_post_meta($post->ID, 'service4', true); ?>" /><br />
    <label for="of_service5" style="width:60px; display: inline-block;">Состав: </label>
    <input type="text" id="of_service5" size="80" name="of_service5" value="<?php echo get_post_meta($post->ID, 'service5', true); ?>" /><br />
    <label style="width:60px; display: inline-block;">Размеры: </label><br />

    <?php
    $min_size = 35;
    $max_size = 41;
    for ( $i = $min_size; $i <= $max_size; $i++) { ?>
        <label for="of_service<?php echo $i; ?>"><input type="checkbox" name="of_service<?php echo $i; ?>" id="of_service<?php echo $i; ?>" <?php if(get_post_meta($post->ID, 'service'.$i, true)=="on"){ ?>checked="checked"<?php } ?> /> <?php echo $i; ?></label><br />
    <?php } ?>  

    <br /><br />
    <label for="new_models"><input type="checkbox" name="new_models" id="new_models" <?php if(get_post_meta($post->ID, 'new_models', true)=="on"){ ?>checked="checked"<?php } ?> /> Новые модели</label><br />        
<?php }

function of_save_postdata2( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    update_post_meta( $post_id , 'service2', $_POST['of_service2']);
    update_post_meta( $post_id , 'service4', $_POST['of_service4']);
    update_post_meta( $post_id , 'service5', $_POST['of_service5']);
    update_post_meta( $post_id , 'new_models', $_POST['new_models']);

    $min_size = 35;
    $max_size = 41;
    for ( $i = $min_size; $i <= $max_size; $i++) {
        update_post_meta( $post_id , 'service'.$i, $_POST['of_service'.$i]);
    }

}

function getCurrentCatID(){  
    global $wp_query;  
    if(is_category() || is_single()){  
        $cat_ID = get_query_var('cat');  
    }  

    return $cat_ID;  
}

add_action('admin_menu', 'ff_create_menu');

function ff_create_menu() {
    add_menu_page('Summergirl options', 'Summergirl options', 'administrator', __FILE__, 'ff_settings_page', $icon_url);
    add_action( 'admin_init', 'ff_register_settings' );
}

function ff_register_settings() {

register_setting( 'ff-settings-group', 'copyright_notice' );
register_setting( 'ff-settings-group', 'contacts_link' );
register_setting( 'ff-settings-group', 'sitemap_link' );

register_setting( 'ff-settings-group', 'phone' );
register_setting( 'ff-settings-group', 'address' );
register_setting( 'ff-settings-group', 'mail' );
register_setting( 'ff-settings-group', 'link_vk' );
register_setting( 'ff-settings-group', 'link_y' );
register_setting( 'ff-settings-group', 'link_i' );

register_setting( 'ff-settings-group', 'phone2' );
register_setting( 'ff-settings-group', 'address2' );
register_setting( 'ff-settings-group', 'mail2' );
register_setting( 'ff-settings-group', 'link_vk2' );
register_setting( 'ff-settings-group', 'link_y2' );

register_setting( 'ff-settings-group', 'title' );
register_setting( 'ff-settings-group', 'desc' );
register_setting( 'ff-settings-group', 'keywords' );

register_setting( 'ff-settings-group', 'block1' );
register_setting( 'ff-settings-group', 'block2' );

}

function ff_settings_page() {
?>
<div class="wrap">
    <form method="post" action="options.php">
        <?php settings_fields('ff-settings-group'); ?>
        <table>
            <tr>
                <td>
                    <h2>Ссылки на социальные сети:</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link_vk">Вконтакте:</label>
                </td>
                <td>
                    <input size="100" type="text" id="link_vk" name="link_vk" value="<?php echo get_option('link_vk');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link_y">Youtube:</label>
                </td>
                <td>
                    <input size="100" type="text" id="link_y" name="link_y" value="<?php echo get_option('link_y');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link_i">Instagram:</label>
                </td>
                <td>
                    <input size="100" type="text" id="link_i" name="link_i" value="<?php echo get_option('link_i');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Секция подвала:</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="copyright_notice">Текст:</label>
                </td>
                <td>
                    <input size="100" type="text" id="copyright_notice" name="copyright_notice" value="<?php echo get_option('copyright_notice');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contacts_link">Ссылка на контакты:</label>
                </td>
                <td>
                    <input size="100" type="text" id="contacts_link" name="contacts_link" value="<?php echo get_option('contacts_link');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sitemap_link">Ссылка на карту сайта:</label>
                </td>
                <td>
                    <input size="100" type="text" id="sitemap_link" name="sitemap_link" value="<?php echo get_option('sitemap_link');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Для главной страницы:</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="title">Title:</label>
                </td>
                <td>
                    <input size="100" type="text" id="title" name="title" value="<?php echo get_option('title');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="keywords">Keywords:</label>
                </td>
                <td>
                    <input size="100" type="text" id="keywords" name="keywords" value="<?php echo get_option('keywords');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="desc">Description:</label>
                </td>
                <td>
                    <input size="100" type="text" id="desc" name="desc" value="<?php echo get_option('desc');?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Блок контакты:</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="block1">На странице "Контакты":</label>
                </td>
                <td>
                    <textarea id="block1" name="block1" rows="8" cols="150"><?php echo get_option('block1');?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="block2">На всех страницах:</label>
                </td>
                <td>
                    <textarea id="block2" name="block2" rows="8" cols="150"><?php echo get_option('block2');?></textarea>
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>
<?php }

function is_child($pageID) { 
    global $post; 
    if(is_page() && ($post->post_parent == $pageID)) {
        return true;
    } else { 
        return false; 
    }
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

?>