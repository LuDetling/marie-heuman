<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="md:flex">
        <aside id="main-header"
            class="block site-container-left fixed md:h-screen top-0 left-0 header-marron  w-full">
            <header class=" content-header">
                <nav class="md:h-screen flex flex-col md:justify-between p-4 md:py-[60px] md:px-0">
                    <!-- Menu -->
                    <div class="flex icones items-start">
                        <div class="flex items-center w-full">
                            <button id="menu-toggle" class="cursor-pointer flex items-start md:justify-center"
                                aria-expanded="false" aria-controls="main-menu">
                                <div class="img-menu"></div>
                                <p class="show-hover">↻ Changer l'ambiance</p>
                            </button>
                            <div class="responsive-menu md:hidden">
                                <button class="button header-white-button">Menu</button>
                            </div>
                        </div>
                    </div>

                    <div class="liens">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'main_menu'
                        ]); ?>
                        <!-- calendly -->
                        <a href="<?= get_permalink(40) ?>#custom-booking-app"
                            class="header-button button header-white-button mx-auto">
                            Réserver un appel
                        </a>
                    </div>
                </nav>

            </header>
        </aside>
        <div class="site-container-right">