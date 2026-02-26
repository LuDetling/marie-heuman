<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="content-header">
            <nav class="flex items-center md:flex-row-reverse gap-8">
                <!-- Menu -->
                <div class="content-logo-menu">
                    <button id="menu-toggle" class="cursor-pointer" aria-expanded="false" aria-controls="main-menu">
                        <div class="img-menu"></div>
                        <!-- <img src="<?= get_template_directory_uri() ?>/assets/images/marie-heuman-architecte-interieur-tours-blois-monogramme-clair.png"
                            alt="logo menu" class="logo-menu"> -->
                    </button>
                </div>

                <!-- Accueil -->
                <a href="<?= home_url() ?>" class="block px-5 py-4">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/marie-heuman-architecte-interieur-tours-blois-logo-clair.png"
                        alt="logo menu" class="logo-menu-home"></a>

                <!-- calendly -->
                <div class="content-calendly">
                    <a href="<?= get_permalink(40) ?>#custom-booking-app" class="calendly hidden md:flex">
                        <?=
                            file_get_contents(get_template_directory() . '/assets/images/icones/calendar-dots.svg');
                        ?>
                    </a>
                </div>

        </div>
        <nav class="menu-plied">
            <?php
            wp_nav_menu([
                'theme_location' => 'main_menu'
            ]);
            wp_nav_menu([
                'theme_location' => 'second_menu'
            ]);

            ?>
        </nav>
    </header>
    <div class="other-buttons-header">
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
    </div>