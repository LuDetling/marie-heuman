<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <header class="">
        <nav class="flex items-center p-8 flex-row-reverse gap-8">
            <!-- Logo -->
            <!-- <a href="<?= home_url() ?>" class="logo flex flex-row-reverse gap-4">
                <span class="block">MH</span>
                menu
                <img src=" <?= get_template_directory_uri(); ?>/assets/images/logo.webp"
                    alt="<?php bloginfo('name'); ?>" class="">
            </a> -->
            <!-- Bouton mobile -->
            <button id=" menu-toggle" class="md:hidden p-2 rounded border" aria-expanded="false"
                aria-controls="main-menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <!-- Menu principal -->

            <?php
            wp_nav_menu([
                'theme_location' => 'main_menu'
            ]) ?>
            <!-- <?php
            wp_nav_menu(['theme_location' => 'contact_menu']); ?> -->

    </header>