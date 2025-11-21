<?php
function marieheuman_supports()
{
    add_theme_support('title-tag');
}

function marieheuman_js()
{
    wp_enqueue_script('menu-js', get_template_directory_uri() . '/assets/js/menu.js', [], false, true);
    wp_enqueue_script('home-js', get_template_directory_uri() . '/assets/js/home.js', [], false, true);
    wp_enqueue_script('page-js', get_template_directory_uri() . '/assets/js/page.js', [], false, true);
}
function marieheuman_enqueue_scripts()
{
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/dist/style.css', [], wp_get_theme()->get('Version'));
    wp_enqueue_style('marieheuman-style', get_template_directory_uri() . '/dist/main.css', [], wp_get_theme()->get('Version'));
}

function marieheuman_setup()
{
    // Active la gestion des menus
    add_theme_support('menus');

    // Déclare ton menu principal
    register_nav_menus([
        'main_menu' => 'Menu principal',
        'second_menu' => 'Second menu',
        'reseaux' => 'Réseaux',
        'navigation' => 'Navigation',
        'contact' => 'Contact',
    ]);
}
function add_fontawesome()
{
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');
}
function theme_enqueue_dashicons()
{
    wp_enqueue_style('dashicons');
}

function register_blog_categories()
{

    register_taxonomy(
        'blog_category',
        'blog',
        [
            'label' => 'Catégories de Blog',
            'hierarchical' => true, // true = comme les catégories classiques
            'public' => true,
            'rewrite' => ['slug' => 'categorie-blog'],
            'show_admin_column' => true,
            'show_ui' => true,
            'show_in_rest' => true, // ← Obligatoire pour Gutenberg !!!

        ]
    );
}


// AJAX BLOG
function blog_ajax_scripts()
{
    if (is_page_template('page-blog.php')) {
        wp_enqueue_script('blog-ajax', get_template_directory_uri() . '/assets/js/blog-ajax.js', ['jquery'], '1.0', true);
        wp_localize_script('blog-ajax', 'blogAjax', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('blog_ajax_nonce')
        ]);
    }
}
add_action('wp_enqueue_scripts', 'blog_ajax_scripts');

// Handler AJAX
function load_blog_posts()
{
    check_ajax_referer('blog_ajax_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $per_page = 12;

    $args = [
        'post_type' => 'blog',
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'post_status' => 'publish'
    ];

    if (!empty($category)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'blog_category',
                'field' => 'slug',
                'terms' => $category
            ]
        ];
    }

    $query = new WP_Query($args);
    $html = '';

    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/card', 'blog');
        }
        $html = ob_get_clean();
    } else {
        $html = '<p class="no-posts">Aucun article trouvé.</p>';
    }

    wp_reset_postdata();

    wp_send_json_success([
        'html' => $html,
        'max_pages' => $query->max_num_pages,
        'current' => $paged
    ]);
}
add_action('wp_ajax_load_blog_posts', 'load_blog_posts');
add_action('wp_ajax_nopriv_load_blog_posts', 'load_blog_posts');

// END AJAX BLOG

add_action('init', 'register_blog_categories');
add_action('wp_enqueue_scripts', 'theme_enqueue_dashicons');
add_action('wp_enqueue_scripts', 'add_fontawesome');
add_action('after_setup_theme', 'marieheuman_setup');
add_action('wp_enqueue_scripts', 'marieheuman_enqueue_scripts');
add_action('wp_enqueue_scripts', 'marieheuman_js');
add_action('after_setup_theme', 'marieheuman_supports');