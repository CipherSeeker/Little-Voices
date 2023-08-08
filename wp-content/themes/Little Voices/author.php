<?php
/*
Template Name: Author Page
*/
?>

<?php get_header('low'); ?>

<main>
    <section class="section-author">
        <div class="container author-container">
            <?php
            $user_id = get_queried_object_id(); // Получаем ID текущего автора
            $author_bio = get_the_author_meta('description', $user_id);
            $author_name = get_the_author_meta('display_name', $user_id);
            ?>

            <div class="section-author-block-info">
                <div class="section-author-block-info-photo">
                    <?php
                    echo get_avatar($user_id, 150, '', 'User Avatar', array('class' => 'custom-avatar'));
                    ?>
                </div>
                <div class="section-author-block-info-text">
                    <?php
                    if ($author_name) {
                        echo '<div class="author-block-info-text">';
                        echo '<h1 class="section-author-block-info-text-name">' . esc_html($author_name) . '</h1>';
                        echo '<p>(' . get_field('bio', 'user_' . $user_id) . ')</p>';
                        echo '</div>';
                    }

                    if ($author_bio) {
                        echo '<p class="section-author-block-info-text-biography">' . esc_html($author_bio) . '</p>';
                    } else {
                        echo '<p class="section-author-block-info-text-biography">There is no biography.</p>';
                    }
                    ?>
                </div>
            </div>

            <?php
            // Модификация запроса для вывода всех статей автора без пагинации
            global $wp_query;
            $original_query = $wp_query;

            $args = array(
                'author' => $user_id,
                'posts_per_page' => -1,
            );

            $author_query = new WP_Query($args);

            if ($author_query->have_posts()) {
                echo '<h2 class="author-post-title">СТАТЬИ АВТОРА: </h2>';
                echo '<ul class="author-post">';
                while ($author_query->have_posts()) {
                    $author_query->the_post();
                    // Вывод информации о статье
                    ?>

                    <li class="author-post-trending-item">
                        <div class="trending-block">
                            <?php
                            $title = get_the_title();
                            $alt_text = $title . ' - photo';
                            echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'trending-block-img', 'alt' => $alt_text));
                            ?>

                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                $category = $categories[0];
                                ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"> <button
                                        type="button" class="trending-block-icon">
                                        <?php echo esc_html($category->name); ?>
                                    </button></a>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="trending-text">
                            <h3 class="trending-text-title"><a href="<?php the_permalink(); ?>"
                                                               class="trending-text-title-link"><?php the_title(); ?></a>
                            </h3>
                            <div class="trending-text-text"><?php the_excerpt(); ?></div>
                            <div class="author-post-btn">
                                <a href="<?php the_permalink(); ?>"> <button type="button"
                                                                                class="trending-text-btn">
                                        READ MORE
                                    </button></a>
                                <p class="trending-info-data"><?php echo get_the_date('F jS, Y'); ?></p>
                            </div>
                        </div>
                    </li>

                    <?php
                }
                echo '</ul>';
                wp_reset_postdata();
            } 

            // Восстанавливаем исходный запрос, чтобы не повлиять на другие части сайта
            $wp_query = $original_query;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
