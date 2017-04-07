<!DOCTYPE>
<html>

<head>
    <title>Hands On: With the Panzera Aquamarine 45 – Singapore Watch Club</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.6.1/css/tachyons.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/fa/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style-post.css" />
</head>

<body>
    <header class="header tc relative">
        <nav class="menu-sm relative overflow-visible">
            <a class="relative db" title="logo" href="">
                <h1>
                    <img class="branding" src="http://singaporewatchclub.com/site/wp-content/uploads/2016/10/logo-dep.png" alt="logo" />
                </h1>
            </a>

        </nav>
        <nav class="menu-lg dn relative overflow-visible">
            <ul class="ul-lg v-mid list tc">
                <li class="menu-item relative v-mid fw3">
                    <a href="<?php bloginfo('url'); ?>">HOME</a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a href="">ABOUT US</a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a href=""> PUBLICATIONS</a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a class="logo" href="">
                        <h1>
                            <img class="branding" src="http://singaporewatchclub.com/site/wp-content/uploads/2016/10/logo-dep.png" alt="logo" />
                        </h1>
                    </a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a class="forum" href="">FORUM</a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a href="">EVENTS</a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a href="">CONTACTUS</a>
                </li>
                <li class="menu-item relative v-mid fw3">
                    <a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <div>
        <div class="content-post">
            <div class="menu-post">
                <nav class="relative overflow-visible">
                    <ul class="breadcrumbs list fw3">
                        <li>
                            <a href="<?php bloginfo('url'); ?>" rel="home">
                                <span itemprop="name">HOME</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span itemprop="name">PUBLICATIONS</span>
                            </a>
                        </li>
                        <li>
                            <span itemprop="name">Hands On: With the Panzera Aquamarine 45</span>
                        </li>
                    </ul>
                </nav>
            </div>
            <header>
                <h1 class="h1-pub fw4"><?php wp_title(); ?></h1>
            </header>
   
            <article class="relative">
                <header class="serif">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <p class="entry-author">
                        BY
                        <span class="color-accent">
                            <a href="" title="Posts by @Onion_Horology" rel="author">
                                <span>@<?php the_author(); ?></span>
                        </a>
                        </span>
                    </p>
                </header>
                <div class="social-buttons">
                    <a title="Share on Instagram" href="">
                        <i class="fa fa-instagram color-accent" aria-hidden="true"></i>
                    </a>
                    <a title="Share on Email" href="">
                        <i class="fa fa-envelope-o color-accent" aria-hidden="true"></i>
                    </a>
                    <a title="Share on Weibo" href="">
                        <i class="fa fa-weibo color-accent" aria-hidden="true"></i>
                    </a>
                    <a title="Share on Facebook" href="">
                        <i class="fa fa-facebook-square color-fb" aria-hidden="true"></i>
                    </a>
                    <a title="Share on Twitter" href="">
                        <i class="fa fa-twitter-square color-tw" aria-hidden="true"></i>
                    </a>
                    <a title="Share on Pinterest" href="">
                        <i class="fa fa-pinterest-square color-pt" aria-hidden="true"></i>
                    </a>
                </div>
                             <?php while ( have_posts() ) : the_post(); ?>       
                <section class="entry-content vertical-space">
                    <?php the_content(); ?>

                </section>
                <?php endwhile;  ?>
            </article>
            <p class="read-next vertical-space tags">
                <strong><?php the_tags(); ?></strong>                
            </p>
        </div>
    </div>
    <footer>
        <p class="footer-content tc">SINGAPORE WATCH CLUB 2017 © ALL RIGHT RESERVED</p>
    </footer>
</body>

</html>