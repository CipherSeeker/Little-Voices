<?php
/*
Template Name: Page Categories
*/
?>

<?php get_header('low'); ?>

<?php $category_object = get_queried_object(); ?>


<main>


    <section class="categories-hero">
        <div class="container categories-hero-block">

            <p class="categories-hero-slogan">CATEGORY</p>
            <h1 class="categories-hero-title"><?php single_cat_title(); ?></h1>
        </div>
    </section>
    <section class="categories">
        <div class="container categories-vector">
            <div class="calendar"><span class="calendar-title">Pregnancy Calendar</span></div>
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


            <section class="posts">
                <?php if (have_posts()) : ?>
                <h2 class="trending-title">
                    The Latest from <span class="trending-title-span"><?php single_cat_title(); ?></span>
                </h2>
                <ul class="posts-list">
                    <?php while (have_posts()) : the_post(); ?>
                    <!-- Выводим посты в категории -->
                    <li class="posts-item">
                        <div class="posts-block-left">
                            
                            <?php echo get_the_post_thumbnail( $id, 'large', array('class' => 'posts-block-img') ); ?>
                            <?php
                            $categories = get_the_category(); // Получаем категории поста
                            if ( $categories ) {
                                $category = $categories[0]; // Берем первую категорию
                                ?>
                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"> <button
                                    type="button" class="posts-block-icon">
                                    <?php echo esc_html( $category->name ); ?>
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
                                <h3 class="posts-text-title">
                                    <a href="<?php the_permalink(); ?>"
                                        class="posts-text-title-link"><?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="posts-text-text"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>"> <button type="button" class="posts-text-btn">
                                        READ MORE
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>

                <!-- Выводим пагинацию -->
                <?php 
                    global $wp_query;

                    $pagination = paginate_links(array(
                         'prev_next' => true,
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => '&lt;',
                        'next_text' => '&gt;',
                        'prev_class' => 'pagination-link prev',
                        'next_class' => 'pagination-link next',
                    ));

                    if ($pagination) {
                        echo '<div class="posts-pagination">';
                        echo $pagination;
                        echo '</div>';
                    }
                    ?>

                <?php else : ?>
                <p>No posts found.</p>
                <?php endif; ?>

            </section>
            <!-- main-content-->
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>



<?php get_footer();?>