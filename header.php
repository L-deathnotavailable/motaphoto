<!doctype html>
<html <?php language_attributes(); ?>>

    <!-- Elements repris du theme hello elementor -->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Photographe</title>
        <?php wp_head(); ?>
    </head>

    <body>
        <header>
            <!-- Add a custom logo that can be modified via the dashboard-->
            <div class="logo">
                <?php the_custom_logo() ?>
            </div>
            
            <nav>
                <?php
                wp_nav_menu(array(
					// Calls up the main menu, which can be modified in the dashboard
                    'theme_location' => 'menu_principal',
                    'container' => false,
                    'menu_class' => 'menu',
                ));
                ?>
            </nav>
						<!-- Other elements will be added later -->
        </header>

        <main>