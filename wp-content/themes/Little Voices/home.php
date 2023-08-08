<?php
/*
Template Name: Home
*/
?>

<?php get_header();?>





<main>
    <section class="hero">
        <div class="container hero-block">
            <p class="hero-slogan">ALONG WITH THE LITTLE STARS</p>
            <h1 class="hero-title">
                WELCOME TO <span class="hero-title-span">"LITTLE VOICES"</span>
            </h1>
            <p class="hero-text">
               Welcome to the world of "Little Voices" - a gentle and magical period of pregnancy and the joy of childbirth. We proudly introduce a team that aims to share all aspects of this incredible time in every woman's life.
            </p>
        </div>
    </section>
    <section class="categories">
        <div class="container categories-vector">
            <div class="categories-header">


                <?php

if ( function_exists( 'tablepress_print_table' ) ) {
    tablepress_print_table( array( 'id' => 1 ) );
}
?>

                <?php

if ( function_exists( 'tablepress_print_table' ) ) {
    tablepress_print_table( array( 'id' => 2 ) );
}
?>

                <?php

if ( function_exists( 'tablepress_print_table' ) ) {
    tablepress_print_table( array( 'id' => 3 ) );
}


?>


            </div>
    </section>
    <div class="wrapper">
        <div class="main-content">
            <!-- main-content -->
            <section class="post">
                <h2 class="hidden">Last post</h2>
                <div class="last-post">
   <?php
$args = array(
    'posts_per_page' => 1, // Получаем только один пост
);

$latest_post = get_posts($args); // Получаем последний пост

if ($latest_post) {
    foreach ($latest_post as $post) {
        setup_postdata($post);
        ?>
        <div class="last-post-block">
            <?php
            $title = get_the_title(); // Получаем заголовок поста
            $alt_text = $title . ' - photo'; // Создаем текст для атрибута alt
            echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'last-post-block-img', 'alt' => $alt_text));
            ?>

            <?php
            $categories = get_the_category(); // Получаем категории поста
            if ($categories) {
                $category = $categories[0]; // Берем первую категорию
                ?>
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                    <button type="button" class="last-post-block-icon">
                        <?php echo esc_html($category->name); ?>
                    </button>
                </a>
            <?php
            }
            ?>
        </div>
        <div class="last-post-info">
            <div class="author-avatar">
                <?php
                
                echo get_avatar(get_the_author_meta('ID'), 150, '', 'User Avatar', array('class' => 'custom-avatar-post'));
                ?>
            </div>
            <p class="last-post-info-name">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-link-author">
                    <?php the_author(); ?>
                </a>
            </p>
            <p class="last-post-info-data"><?php the_date('F jS, Y'); ?></p>
            <p class="last-post-info-slogan">COMING IN HOT!</p>
        </div>
        <div class="last-post-text">
            <h3 class="last-post-text-title"><a href="<?php the_permalink(); ?>"
                                                class="last-post-text-title-link"><?php the_title(); ?></a></h3>
            <div class="last-post-text-text"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>">
                <button type="button" class="last-post-text-btn">
                    READ MORE
                </button>
            </a>
        </div>
    <?php
    }

    wp_reset_postdata(); // Сбрасываем данные поста
}
?>

                </div>
            </section>
            <section class="trending">
                <h2 class="trending-title">Trending</h2>
                <div>

                    <?php
$args = array(
    'posts_per_page' => 2, // Получаем два поста
    'offset' => 1, // Пропускаем последний пост
);

$latest_posts = get_posts($args); // Получаем предпоследние посты

if ($latest_posts) {
    echo '<ul class="trending-list">'; // Начало списка

    foreach ($latest_posts as $post) {
        setup_postdata($post);
        ?>
                    <li class="trending-item">
                        <div class="trending-block">

                            <?php
                            $title = get_the_title(); // Получаем заголовок поста
                            $alt_text = $title . ' - photo'; // Создаем текст для атрибута alt
                            echo get_the_post_thumbnail( $id, 'large', array('class' => 'trending-block-img', 'alt' => $alt_text) );
                            ?>
                            <?php
                $categories = get_the_category(); // Получаем категории поста
                if ($categories) {
                    $category = $categories[0]; // Берем первую категорию
                    ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"> <button
                                    type="button" class="trending-block-icon">
                                    <?php echo esc_html($category->name); ?>
                                </button></a>
                            <?php
                }
                ?>
                        </div>
                        <div class="trending-info">
                            <?php
                
                            echo get_avatar(get_the_author_meta('ID'), 150, '', 'User Avatar', array('class' => 'custom-avatar-post'));
                            ?>
                            <p class="trending-info-name">   <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-link-author">
                                <?php the_author(); ?>
                            </a></p>
                         
                            <p class="trending-info-data"><?php echo get_the_date('F jS, Y'); ?></p>
                        </div>
                        <div class="trending-text">
                            <h3 class="trending-text-title"><a href="<?php the_permalink(); ?>"
                                    class="trending-text-title-link"><?php the_title(); ?></a></h3>
                            <div class="trending-text-text"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>"> <button type="button" class="trending-text-btn">
                                    READ MORE
                                </button></a>
                        </div>
                    </li>
                    <?php
    }

    echo '</ul>'; // Завершение списка

    wp_reset_postdata(); // Сбрасываем данные постов
}
?>
                </div>
            </section>
            <section class="posts">
                <h2 class="hidden">Posts</h2>



                <?php
        $args = array(
            'posts_per_page' => 3, // Получаем три поста
            'offset' => 3, // Пропускаем три последних поста
        );

        $latest_posts = get_posts($args); // Получаем предпоследние посты

        if ($latest_posts) {
            echo '<ul class="posts-list">'; // Начало списка

            foreach ($latest_posts as $post) {
                setup_postdata($post);
                ?>
                <li class="posts-item">
                    <div class="posts-block-left">

                        <?php
                            $title = get_the_title(); // Получаем заголовок поста
                            $alt_text = $title . ' - photo'; // Создаем текст для атрибута alt
                            echo get_the_post_thumbnail( $id, 'large', array('class' => 'posts-block-img', 'alt' => $alt_text) );
                            ?>

                        <?php
                        $categories = get_the_category(); // Получаем категории поста
                        if ($categories) {
                            $category = $categories[0]; // Берем первую категорию
                            ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"> <button type="button"
                                class="posts-block-icon">
                                <?php echo esc_html($category->name); ?>
                            </button></a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="posts-block-right">
                        <div class="posts-info">
                              <?php
                                echo get_avatar(get_the_author_meta('ID'), 150, '', 'User Avatar', array('class' => 'custom-avatar-post'));
                            ?>
                            <p class="posts-info-name">   <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-link-author">
                                <?php the_author(); ?>
                            </a></p>
                            <p class="posts-info-data"><?php echo get_the_date('F jS, Y'); ?></p>
                        </div>
                        <div class="posts-text">
                            <h3 class="posts-text-title"><a href="<?php the_permalink(); ?>"
                                    class="posts-text-title-link"><?php the_title(); ?></a></h3>
                            <div class="posts-text-text"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>"> <button type="button" class="posts-text-btn">
                                    READ MORE
                                </button></a>
                        </div>
                    </div>
                </li>
                <?php
            }

            echo '</ul>'; // Завершение списка

            wp_reset_postdata(); // Сбрасываем данные постов
        }
        ?>






            </section>
            <!-- main-content-->
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer();?>