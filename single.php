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
         <?php wp_nav_menu( array(
            'theme_location' => 'main-nav', 
            'container' => 'nav', 
            'container_class' => 'menu-lg dn relative overflow-visible', 
            'menu_class' => 'ul-lg v-mid list tc' 
            ) ); ?>         
    </header>
    <div>
        <div class="content-post">
            <div class="menu-post">
                <nav class="relative overflow-visible">
                    <?php the_breadcrumb(); ?>
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
            <?php wp_nav_menu( array(
                'theme_location' => 'footer-nav', 
                'container' => 'nav', 
                'container_class' => 'footer-nav', 
                'menu_class' => 'menu clearfix' 
            ) ); ?>
        <p class="footer-content tc">
    <?php
			echo get_theme_mod("ads_text");
		?>
    </p>
    </footer>
</body>

</html>