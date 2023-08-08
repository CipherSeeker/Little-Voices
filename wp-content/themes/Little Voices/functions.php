<?php 

add_action('wp_enqueue_scripts', function() {
    // Подключение стилей
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('googleapis', 'https://fonts.googleapis.com');
    wp_enqueue_style('gstatic', 'https://fonts.gstatic.com');
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Cinzel&family=Poppins:wght@400;500;600;700&display=swap');
    wp_enqueue_style('cdnjs', 'https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');

    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js');
	wp_enqueue_script( 'jquery' );


    // Подключение скриптов
   
 
    wp_enqueue_script('modal-js', get_template_directory_uri() . '/assets/js/modal.js', '', '', true);
   
    wp_enqueue_script('slider-js', get_template_directory_uri() . '/assets/js/slider.js', '', '', true);
});






//     <link
//       rel="stylesheet"
//       href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css"
//       integrity="sha512-wpPYUAdjBVSE4KJnH1VR1HeZfpl1ub8YT/NKx4PuQ5NmX2tKuGu6U/JRp5y+Y8XG2tV+wKQpNHVUX03MfMFn9Q=="
//       crossorigin="anonymous"
//       referrerpolicy="no-referrer"
//     />
//   


    // <script src="./js/search.js"></script>
    // <script src="./js/modal.js"></script>
    // <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    // <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    // <script src="./js/sllider.js"></script>
//    

add_theme_support('post_thumbnails');
add_theme_support( 'post-thumbnails' );
add_theme_support('title-tag');
add_theme_support('custom-logo');

// В файле functions.php
add_image_size('custom-thumb-size', 441, 274, true);




function remove_featured_image_from_content($content) {
    // Проверяем, находимся ли мы на странице одиночного поста
    if (is_single()) {
        // Получаем ID текущего поста
        $post_id = get_the_ID();

        // Удаляем главное изображение из содержимого поста
        $content = preg_replace('/<figure class="wp-block-post-featured-image">.*<\/figure>/s', '', $content);
    }

    return $content;
}
add_filter('the_content', 'remove_featured_image_from_content');



function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );


add_theme_support('html5', array('search-form'));

function custom_search_filter($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('post'));
    }
    return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');



function custom_excerpt_length( $length ) {
    return 100; // Замените это число на количество символов, которое вы хотите выводить в миниатюре.
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// function custom_search_rewrite_rule() {
//     add_rewrite_rule('^search/([^/]+)/page/([0-9]+)/?', 'index.php?s=' . $wp_rewrite->preg_index(1) . '&paged=' . $wp_rewrite->preg_index(2), 'top');
// }
// add_action('init', 'custom_search_rewrite_rule');
?>