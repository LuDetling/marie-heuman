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
            <nav class="flex items-center flex-row-reverse gap-8">
                <!-- Menu -->
                <div class="content-logo-menu">
                    <button id="menu-toggle" class="cursor-pointer" aria-expanded="false" aria-controls="main-menu">
                        <div class="img-menu"></div>
                        <!-- <img src="<?= get_template_directory_uri() ?>/assets/images/marie-heuman-architecte-interieur-tours-blois-monogramme-clair.png"
                            alt="logo menu" class="logo-menu"> -->
                    </button>
                </div>

                <!-- Accueil -->
                <a href="<?= home_url() ?>" class="block p-4">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/marie-heuman-architecte-interieur-tours-blois-logo-clair.png"
                        alt="logo menu" class="logo-menu-home"></a>

                <!-- calendly -->
                <a href="contact-architecte-interieur-tours-blois/#custom-booking-app" class="calendly hidden md:flex">
                    <?=
                        file_get_contents(get_template_directory() . '/assets/images/icones/calendar-dots.svg');
                    ?>
                </a>

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
        <a href="contact-architecte-interieur-tours-blois/#custom-booking-app" class="calendly-link flex md:hidden">
            <?=
                file_get_contents(get_template_directory() . '/assets/images/icones/calendar-dots.svg');
            ?>
        </a>
        <a href="<?= site_url("foire-aux-questions") ?>" class="faq-link hidden md:flex">
            ?</a>
    </div>