    <div class="sidebar">
        <!-- sidebar -->
        <section class="author">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="" class="author-img" />
            <p class="author-slogan">YOUR WEBSITE</p>


            <?php
            $user = get_user_by('login', 'admin'); // Получаем объект пользователя по логину "admin"

        if ($user) {
    $user_info = get_userdata($user->ID); // Получаем данные пользователя

    if ($user_info) {
        $username = $user_info->display_name; // Имя пользователя
        $biography = $user_info->description; // Биография пользователя

        echo ' <p class="author-name">' . $username . '</p>';
        echo '<p class="author-text">' . $biography. '</p>';
    }
}
?>



            <button type="button" class="author-btn" data-modal-open>
                Let’s Chat
            </button>
           
        </section>

        <section class="newsletter">
            <p class="newsletter-title">Newsletter</p>
            <p class="newsletter-slogan">Join the 36,000 Little Voices!</p>
          
            
            
            <?php echo do_shortcode('[mailpoet_form id="1"]'); ?>
            
            <p class="newsletter-text">
                Rest assured! You’re gonna have a lot of fun when you press this
            </p>
        </section>



        <section class="top-rated">
            <p class="top-rated-title">Top Rated</p>
            <ul class="top-rated-list">
                <?php
// Создаем запрос для получения 5 самых просматриваемых постов
$popular_posts = pvc_get_most_viewed_posts( array(
    'posts_per_page'     => 5, // Количество постов для вывода
    'post_type'           => array( 'post' ), // Типы записей
    'order'               => 'desc', // Порядок сортировки (desc - по убыванию, asc - по возрастанию)
    // Дополнительные параметры по вашему выбору
) );

// Проверяем, есть ли посты
if ( $popular_posts ) {
    // Начинаем цикл
    foreach ( $popular_posts as $post ) {
        setup_postdata( $post );
        ?>
                <li class="top-rated-item">
                    <!-- <img src="<?php the_field('img-post'); ?>" alt="<?php the_title(); ?> - img"
                        class="top-rated-item-img" /> -->
                    <?php echo get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'top-rated-item-img') ); ?>
                    <div class="top-rated-item-right">
                        <h4 class="top-rated-item-right-title">
                            <a href="<?php the_permalink(); ?>"
                                class="top-rated-item-right-title-link"><?php the_title(); ?></a>
                        </h4>
                        <a href="<?php the_permalink(); ?>">
                            <button type="button" class="top-rated-item-right-btn">READ MORE</button>
                        </a>
                    </div>
                </li>
                <?php
    }
    wp_reset_postdata();
} else {
    // Если посты не найдены
    echo '<li class="top-rated-item">Посты не найдены.</li>';
}
?>
            </ul>
        </section>

        <section class="posts-category">
            <p class="posts-category-title">Categories</p>
            <ul class="posts-category-list">
                <?php
    // Получаем список категорий
    $categories = get_categories();

    // Проверяем, есть ли категории
    if ($categories) {
        foreach ($categories as $category) {
            $category_name = $category->name;
            $category_count = $category->count;
            $category_link = get_category_link($category->term_id);
            ?>
                <li class="posts-category-item">
                    <p class="posts-category-item-name">
                        <a href="<?php echo $category_link; ?>"
                            class="posts-category-item-name-link"><?php echo $category_name; ?></a>
                    </p>
                    <p class="posts-category-item-number"><?php echo $category_count; ?></p>
                </li>
                <?php
        }
    }
    ?>
            </ul>
        </section>
        <!-- sidebar -->
    </div>