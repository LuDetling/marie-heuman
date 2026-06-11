<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="flex">
        <aside class="site-container-left fixed h-screen top-0 left-0 header-marron">
            <header class=" content-header">
                <nav class="h-screen flex flex-col justify-between py-[60px]">
                    <!-- Menu -->
                    <button id="menu-toggle" class="cursor-pointer flex items-center justify-center" aria-expanded="false" aria-controls="main-menu">
                        <div class="img-menu"></div>
                    </button>
                    <nav>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'main_menu'
                        ]); ?>
                    </nav>
                    <!-- calendly -->
                    <a href="<?= get_permalink(40) ?>#custom-booking-app" class="header-button button header-white-button mx-auto">
                        Réserver un appel
                    </a>

            </header>
            <!-- <div class="other-buttons-header">
        <a href="<?= get_permalink(40) ?>#custom-booking-app" class="calendly-link flex md:hidden">
            <?=
                file_get_contents(get_template_directory() . '/assets/images/icones/calendar-dots.svg');
            ?>
        </a>
        <a href="<?= site_url("faq-architecte-interieur-tours-blois") ?>" class="faq-link hidden md:flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                <path
                    d="M192,96c0,28.51-24.47,52.11-56,55.56V160a8,8,0,0,1-16,0V144a8,8,0,0,1,8-8c26.47,0,48-17.94,48-40s-21.53-40-48-40S80,73.94,80,96a8,8,0,0,1-16,0c0-30.88,28.71-56,64-56S192,65.12,192,96Zm-64,96a16,16,0,1,0,16,16A16,16,0,0,0,128,192Z">
                </path>
            </svg>
        </a>
    </div> -->
        </aside>
        <div class="site-container-right">