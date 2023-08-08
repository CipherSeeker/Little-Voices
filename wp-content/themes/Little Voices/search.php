<?php get_header('low');?>

<!-- Здесь разместите код шапки и другие элементы вашего шаблона -->

<!-- Выводим заголовок результата поиска -->
<?php
$search_query = get_search_query(); // Получаем поисковый запрос пользователя
$search_results_count = $wp_query->found_posts; // Получаем количество найденных постов
?>


<main>
    <div class="wrapper">
        <div class="main-content">
            <!-- main-content -->

            <section class="posts">
                <p class="posts-search-text">
                    You have searched for
                    <span class="posts-search-text-span">“<?php echo esc_html($search_query); ?>”</span>
                </p>
                <p class="posts-search-title">
                    We have found
                    <span class="posts-search-title-span"><?php echo esc_html($search_results_count); ?></span>
                    Article(s)
                </p>


                <?php if (have_posts()) : ?>
                <!-- Выводим список результатов поиска -->
                <ul class="posts-list">
                    <?php while (have_posts()) : the_post(); ?>
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
                                    <?php the_title(); ?>
                                </h3>
                                <div class="posts-text-text">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>"> <button type="button" class="posts-text-btn">
                                        READ MORE
                                    </button></a>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>

                </ul>


                <!-- Выводим пагинацию -->
                <?php 
    global $wp_query;

    $pagination = paginate_links(array(
        'total' => $wp_query->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_next' => true,
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
                <p>No results found.</p>
                <?php endif; ?>

                <!-- Здесь разместите код подвала и другие элементы вашего шаблона -->

            </section>
            <!-- main-content-->
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>