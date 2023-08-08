<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.svg" rel="shortcut icon">


    <?php wp_head(); ?>
</head>

<body>
    <header>
        <section class="header">
            <div class="container header-vector">
                <nav class="nav-header">
                    <a href="/" class="logo"><span class="logo-span">Little Voices</span></a>
                 <ul class="nav-list">
                        <li class="nav-item">
                            <a href="/category/first-trimester/" class="nav-links">First trimester</a>
                        </li>
                        <li class="nav-item">
                            <a href="/category/second-trimester/" class="nav-links">Second trimester</a>
                        </li>
                        <li class="nav-item">
                            <a href="/category/third-trimester/" class="nav-links">Third trimester</a>
                        </li>
                       
                    </ul>
                    <div class="contact-search">
                        <form role="search" method="get" class="search-container"
                            action="<?php echo esc_url(home_url('/')); ?>">
                            <input required type="search" class="search-input"
                                placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-theme-domain'); ?>"
                                value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit" class="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                    <path stroke="#262626" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="m20 20-4.197-4.197M18 10.5a7.5 7.5 0 1 0-15 0 7.5 7.5 0 0 0 15 0Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </section>
    </header>