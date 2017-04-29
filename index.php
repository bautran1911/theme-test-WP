<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.6.1/css/tachyons.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/fa/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/flexslider.css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <title><?php bloginfo('name'); ?></title>
</head>

<body>
    <header class="header tc relative">
  
        <nav class="menu-sm relative overflow-visible">
            <a class="relative db" title="logo" href="">
                <h1>
                    <img class="branding" src="http://singaporewatchclub.com/site/wp-content/uploads/2016/10/logo-dep.png" alt="logo" />
                </h1>
            </a>

        
        <button class="button-menu hamburger hamburger--squeeze" onclick="toggleMenu(this)">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
        <?php wp_nav_menu( array(
            'theme_location' => 'main-nav-sm', 
            'container' => 'div', 
            'container_class' => 'menu-container inverted js-menu serif color-accent extralarge dn', 
            'menu_class' => 'menu' 
            ) ); ?>
            </nav>        
       <?php wp_nav_menu( array(
            'theme_location' => 'main-nav', 
            'container' => 'nav', 
            'container_class' => 'menu-lg dn relative overflow-visible', 
            'menu_class' => 'ul-lg v-mid list tc' 
            ) ); ?>           
    </header>
    <div class="content">
        <div class="pub">
            <header>
                <h1 class="h1-pub fw4">Publications</h1>
            </header>
        </div>
        <section class="posts">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <article class="post-1 relative">
                <div class="div-img">
                    <?php the_post_thumbnail() ?>
                </div>
                <header class="header-post">
                    <time class="time-post db" datetime="<?php the_time('Y-m-dTg:i:s'); ?>+07:00" title="<?php the_time('l, F jS, Y g:i a'); ?>"><?php the_time('d.m.y'); ?></time>
                    <h1 class="h1-post"><?php the_title(); ?></h1>
                    <a class="link-learnmore" href="<?php the_permalink() ?>">LEARN MORE</a>
                </header>
            </article>
            <?php endwhile; endif; ?>
        </section>
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
			echo get_theme_mod("footer_text");
		?>
    </p>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri() ?>/jquery.flexslider-min.js">

    </script>
    <script src="<?php echo get_template_directory_uri() ?>/javascript.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/flex.js"></script>
</body>

</html>