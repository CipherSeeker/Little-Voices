<?php
/*
Template Name: Page Post
*/
?>

<?php get_header('low');?>
<?php the_post();?>

<main>

    <section class="categories">
        <div class="container categories-vector">
            <div class="calendar"><span class="calendar-title">Pregnancy Calendar</span></div>
            <div class=" categories-header">


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
            <section class="bread-crumbs">
                <a href="/">
                    <p class="bread-crumbs-text">Home</p>
                </a>
                <?php
    $categories = get_the_category();
    if (!empty($categories)) {
        $category = $categories[0];
        $category_link = esc_url(get_category_link($category->term_id));
        $category_name = $category->name;
        
        ?>
                <a href="<?php echo $category_link; ?>">
                    <p class="bread-crumbs-text"><?php echo $category_name; ?></p>
                </a>
                <?php } ?>

                <p class="bread-crumbs-text"><?php the_title(); ?></p>

            </section>

            <section class="post">
                <h1 class="post-title">
                    <?php the_title();?>
                </h1>
                <div class="post-content">
                    <?php
                            $title = get_the_title(); // Получаем заголовок поста
                            $user_id = get_the_author_meta('ID');
                            $alt_text = $title . ' - photo'; // Создаем текст для атрибута alt
                            echo get_the_post_thumbnail( $id, 'large', array('class' => 'posts-block-img-all', 'alt' => $alt_text) );
                            ?>
                             <div class="posts-block-author">
                             <div class="posts-block-author-img-name">
                                 <?php
                                echo get_avatar(get_the_author_meta('ID'), 150, '', 'User Avatar', array('class' => 'custom-avatar-post'));
                            ?>
                            <p class="posts-info-name-all">   <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-link-author">
                                <?php the_author(); ?>
                            </a>
                            <?php  echo '<span>(' . get_field('bio', 'user_' . $user_id) . ')</span>'; ?>
                            </p>
                                  
                             </div>
                             <p class="posts-info-data"><?php echo get_the_date('F jS, Y'); ?></p>
                             </div>
                           
                    <div class="post-text">
                       
                        <?php the_content();?>
                    </div>
                </div>
            </section>

            <section class="share">

                <?php
    $categories = get_the_category();
    if (!empty($categories)) {
        $category = $categories[0];
        $category_link = esc_url(get_category_link($category->term_id));
        $category_name = $category->name;
        ?>
                <a href="<?php echo $category_link; ?>">
                    <button type="button" class="share-cat">
                        <?php echo $category_name; ?>
                    </button>
                </a>
                <?php } ?>


                <div class="share-block-right">
                     
                    
                    <p class="share-block-right-text">Let’s Share It</p>
                    <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
                    <!--<ul class="share-block-right-list">-->
                    <!--    <li class="share-block-right-item">-->
                    <!--        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"-->
                    <!--                viewBox="0 0 23 23" fill="none">-->
                    <!--                <path fill-rule="evenodd" clip-rule="evenodd"-->
                    <!--                    d="M0 11.5C0 5.14873 5.14873 0 11.5 0C17.8513 0 23 5.14873 23 11.5C23 17.8513 17.8513 23 11.5 23C5.14873 23 0 17.8513 0 11.5ZM11.5 5.75C14.6625 5.75 17.25 8.3375 17.25 11.5C17.25 14.375 15.1656 16.8188 12.2906 17.25V13.1531H13.6562L13.9437 11.5H12.3625V10.4219C12.3625 9.99062 12.5781 9.55937 13.2969 9.55937H14.0156V8.12187C14.0156 8.12187 13.3688 7.97813 12.7219 7.97813C11.4281 7.97813 10.5656 8.76875 10.5656 10.2063V11.5H9.12813V13.1531H10.5656V17.1781C7.83437 16.7469 5.75 14.375 5.75 11.5C5.75 8.3375 8.3375 5.75 11.5 5.75Z" />-->
                    <!--            </svg>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--    <li class="share-block-right-item">-->
                    <!--        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"-->
                    <!--                viewBox="0 0 23 23" fill="none">-->
                    <!--                <path fill-rule="evenodd" clip-rule="evenodd"-->
                    <!--                    d="M0 11.5C0 5.14873 5.14873 0 11.5 0C17.8513 0 23 5.14873 23 11.5C23 17.8513 17.8513 23 11.5 23C5.14873 23 0 17.8513 0 11.5ZM15.8844 8.26562C16.3875 8.19375 16.8188 8.12187 17.25 7.90625C16.9625 8.40938 16.5312 8.84062 16.0281 9.12813C16.1719 12.5062 13.7281 16.1719 9.34375 16.1719C8.05 16.1719 6.82812 15.7406 5.75 15.0938C6.97187 15.2375 8.26562 14.8781 9.12813 14.2312C8.05 14.2312 7.1875 13.5125 6.9 12.5781C7.25938 12.65 7.61875 12.5781 7.97813 12.5062C6.9 12.2188 6.10938 11.2125 6.10938 10.1344C6.46875 10.2781 6.82812 10.4219 7.1875 10.4219C6.18125 9.70312 5.82188 8.3375 6.46875 7.25938C7.69062 8.69688 9.41563 9.63125 11.3562 9.70312C10.9969 8.26562 12.1469 6.82812 13.6562 6.82812C14.3031 6.82812 14.95 7.11562 15.3812 7.54688C15.9562 7.40313 16.4594 7.25937 16.8906 6.97187C16.7469 7.54688 16.3875 7.97813 15.8844 8.26562Z" />-->
                    <!--            </svg>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--    <li class="share-block-right-item">-->
                    <!--        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"-->
                    <!--                viewBox="0 0 24 23" fill="none">-->
                    <!--                <path fill-rule="evenodd" clip-rule="evenodd"-->
                    <!--                    d="M0 11.5C0 5.14873 5.37258 0 12 0C18.6274 0 24 5.14873 24 11.5C24 17.8513 18.6274 23 12 23C5.37258 23 0 17.8513 0 11.5ZM6.15 9.55938V17.25H8.7V9.55938H6.15ZM6 7.11563C6 7.90625 6.6 8.48125 7.425 8.48125C8.25 8.48125 8.85 7.90625 8.85 7.11563C8.85 6.325 8.25 5.75 7.425 5.75C6.675 5.75 6 6.325 6 7.11563ZM15.45 17.25H17.85V12.5063C17.85 10.1344 16.35 9.34375 14.925 9.34375C13.65 9.34375 12.75 10.1344 12.525 10.6375V9.55938H10.125V17.25H12.675V13.1531C12.675 12.075 13.425 11.5 14.175 11.5C14.925 11.5 15.45 11.8594 15.45 13.0812V17.25Z" />-->
                    <!--            </svg>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--    <li class="share-block-right-item">-->
                    <!--        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"-->
                    <!--                viewBox="0 0 23 23" fill="none">-->
                    <!--                <path d="M13.3688 11.5L10.35 9.775V13.225L13.3688 11.5Z" />-->
                    <!--                <path fill-rule="evenodd" clip-rule="evenodd"-->
                    <!--                    d="M0 11.5C0 5.14873 5.14873 0 11.5 0C17.8513 0 23 5.14873 23 11.5C23 17.8513 17.8513 23 11.5 23C5.14873 23 0 17.8513 0 11.5ZM15.9563 7.69063C16.4594 7.83438 16.8188 8.19375 16.9625 8.69688C17.25 9.63125 17.25 11.5 17.25 11.5C17.25 11.5 17.25 13.3688 17.0344 14.3031C16.8906 14.8063 16.5312 15.1656 16.0281 15.3094C15.0937 15.525 11.5 15.525 11.5 15.525C11.5 15.525 7.83437 15.525 6.97187 15.3094C6.46875 15.1656 6.10938 14.8063 5.96563 14.3031C5.75 13.3688 5.75 11.5 5.75 11.5C5.75 11.5 5.75 9.63125 5.89375 8.69688C6.0375 8.19375 6.39688 7.83438 6.9 7.69063C7.83438 7.475 11.4281 7.475 11.4281 7.475C11.4281 7.475 15.0938 7.475 15.9563 7.69063Z" />-->
                    <!--            </svg>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--    <li class="share-block-right-item">-->
                    <!--        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"-->
                    <!--                viewBox="0 0 23 23" fill="none">-->
                    <!--                <path-->
                    <!--                    d="M11.5 13.5125C10.4219 13.5125 9.4875 12.65 9.4875 11.5C9.4875 10.4219 10.35 9.4875 11.5 9.4875C12.5781 9.4875 13.5125 10.35 13.5125 11.5C13.5125 12.5781 12.5781 13.5125 11.5 13.5125Z" />-->
                    <!--                <path fill-rule="evenodd" clip-rule="evenodd"-->
                    <!--                    d="M13.9437 6.6125H9.05625C8.48125 6.68437 8.19375 6.75625 7.97813 6.82812C7.69063 6.9 7.475 7.04375 7.25938 7.25937C7.08875 7.43 7.00814 7.60062 6.9107 7.80685C6.88502 7.8612 6.8581 7.91817 6.82812 7.97812C6.81701 8.01148 6.80417 8.04656 6.79041 8.08415C6.71521 8.28958 6.6125 8.5702 6.6125 9.05625V13.9437C6.68438 14.5187 6.75625 14.8062 6.82812 15.0219C6.9 15.3094 7.04375 15.525 7.25938 15.7406C7.43 15.9112 7.60062 15.9919 7.80685 16.0893C7.86125 16.115 7.91812 16.1419 7.97813 16.1719C8.01148 16.183 8.04656 16.1958 8.08415 16.2096C8.28958 16.2848 8.5702 16.3875 9.05625 16.3875H13.9437C14.5187 16.3156 14.8063 16.2437 15.0219 16.1719C15.3094 16.1 15.525 15.9562 15.7406 15.7406C15.9112 15.57 15.9919 15.3994 16.0893 15.1931C16.115 15.1388 16.1419 15.0819 16.1719 15.0219C16.183 14.9885 16.1958 14.9534 16.2096 14.9158C16.2848 14.7104 16.3875 14.4298 16.3875 13.9437V9.05625C16.3156 8.48125 16.2437 8.19375 16.1719 7.97812C16.1 7.69062 15.9562 7.475 15.7406 7.25937C15.57 7.08875 15.3994 7.00814 15.1931 6.9107C15.1388 6.88504 15.0818 6.85807 15.0219 6.82812C14.9885 6.817 14.9534 6.80416 14.9158 6.7904C14.7104 6.71521 14.4298 6.6125 13.9437 6.6125ZM11.5 8.40937C9.775 8.40937 8.40938 9.775 8.40938 11.5C8.40938 13.225 9.775 14.5906 11.5 14.5906C13.225 14.5906 14.5906 13.225 14.5906 11.5C14.5906 9.775 13.225 8.40937 11.5 8.40937ZM15.3812 8.3375C15.3812 8.73445 15.0595 9.05625 14.6625 9.05625C14.2655 9.05625 13.9437 8.73445 13.9437 8.3375C13.9437 7.94054 14.2655 7.61875 14.6625 7.61875C15.0595 7.61875 15.3812 7.94054 15.3812 8.3375Z" />-->
                    <!--                <path fill-rule="evenodd" clip-rule="evenodd"-->
                    <!--                    d="M0 11.5C0 5.14873 5.14873 0 11.5 0C17.8513 0 23 5.14873 23 11.5C23 17.8513 17.8513 23 11.5 23C5.14873 23 0 17.8513 0 11.5ZM9.05625 5.53437H13.9437C14.5906 5.60625 15.0219 5.67812 15.3812 5.82187C15.8125 6.0375 16.1 6.18125 16.4594 6.54062C16.8188 6.9 17.0344 7.25937 17.1781 7.61875C17.3219 7.97812 17.4656 8.40937 17.4656 9.05625V13.9437C17.3937 14.5906 17.3219 15.0219 17.1781 15.3812C16.9625 15.8125 16.8188 16.1 16.4594 16.4594C16.1 16.8187 15.7406 17.0344 15.3812 17.1781C15.0219 17.3219 14.5906 17.4656 13.9437 17.4656H9.05625C8.40938 17.3937 7.97813 17.3219 7.61875 17.1781C7.1875 16.9625 6.9 16.8187 6.54063 16.4594C6.18125 16.1 5.96563 15.7406 5.82188 15.3812C5.67813 15.0219 5.53437 14.5906 5.53437 13.9437V9.05625C5.60625 8.40937 5.67813 7.97812 5.82188 7.61875C6.0375 7.1875 6.18125 6.9 6.54063 6.54062C6.9 6.18125 7.25938 5.96562 7.61875 5.82187C7.97813 5.67812 8.40938 5.53437 9.05625 5.53437Z" />-->
                    <!--            </svg>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--</ul>-->
                </div>
            </section>

            <section class="article">
                <div class="article-block">
                    <?php $previous_post = get_previous_post(); ?>
                    <?php if (!empty($previous_post)) : ?>
                    <a href="<?php echo get_permalink($previous_post->ID); ?>" class="article-block-prev-next">&lt;</a>
                    <div class="article-block-text-left">
                        <p class="article-block-text-slogan">PREVIOUS ARTICLE</p>
                        <a href="<?php echo get_permalink($previous_post->ID); ?>"
                            class="article-block-text-title"><?php echo get_the_title($previous_post->ID); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="1" height="96" viewBox="0 0 1 96" fill="none">
                    <path d="M0.5 95.5V0.5" stroke="white" />
                </svg>
                <div class="article-block">
                    <?php $next_post = get_next_post(); ?>
                    <?php if (!empty($next_post)) : ?>
                    <div class="article-block-text-right">
                        <p class="article-block-text-slogan">NEXT ARTICLE</p>
                        <a href="<?php echo get_permalink($next_post->ID); ?>"
                            class="article-block-text-title"><?php echo get_the_title($next_post->ID); ?></a>
                    </div>
                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="article-block-prev-next">&gt;</a>
                    <?php endif; ?>
                </div>
            </section>

            <!-- main-content-->
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>


<?php get_footer();?>