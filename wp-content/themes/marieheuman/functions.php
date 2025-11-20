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
// 1. Enqueue (Chargement) du Script AJAX
function blog_filter_enqueue_scripts()
{
    // Vérifie si la librairie jQuery est disponible (WordPress la charge par défaut)
    wp_enqueue_script('jquery');

    // Enregistre et charge votre fichier JavaScript (nous le créerons à l'étape suivante)
    // Le fichier est supposé être dans le dossier /js/ de votre thème
    wp_enqueue_script(
        'blog-ajax-script',
        get_template_directory_uri() . '/assets/js/blog-ajax.js',
        ['jquery'], // Dépendance : assure que jQuery est chargé avant
        filemtime(get_template_directory() . '/assets/js/blog-ajax.js'), // Version dynamique pour éviter le cache
        true // Charge le script dans le pied de page (footer)
    );

    // Transmet des variables PHP essentielles au script JavaScript
    wp_localize_script('blog-ajax-script', 'blog_ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'), // L'URL standard de WordPress pour toutes les requêtes AJAX
        'nonce' => wp_create_nonce('blog_filter_nonce'), // Un jeton de sécurité unique (Nonce)
    ]);
}
add_action('wp_enqueue_scripts', 'blog_filter_enqueue_scripts');


// 2. Fonction de Traitement PHP de la requête AJAX
function render_blog_posts($tax_slug = 'all')
{ // Accepte 'all' par défaut

    // Arguments de base de la WP_Query (votre CPT est 'blog')
    $args = array(
        'post_type' => 'blog',
        'posts_per_page' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    // Si le slug n'est pas 'all', ajouter les arguments de taxonomie
    if ($tax_slug !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'blog_category', // Votre taxonomie
                'field' => 'slug',
                'terms' => $tax_slug,
            ),
        );
    }

    // Exécuter la requête
    $query = new WP_Query($args);

    // Boucle pour générer le HTML des articles
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Affiche le titre comme dans votre template
            ?>
            <div><?= the_title() ?></div>
            <?php
        }
    } else {
        echo '<p class="no-results">Désolé, aucun article trouvé dans cette sélection.</p>';
    }

    wp_reset_postdata();
}


/**
 * Fonction de Traitement AJAX (Celle-ci contient wp_die())
 */
function filter_blog_posts_ajax()
{

    // 1. Vérification de la sécurité (indispensable pour AJAX)
    check_ajax_referer('blog_filter_nonce', 'nonce');

    // 2. Récupérer le slug de la catégorie envoyé par JavaScript
    $tax_slug = isset($_POST['cat_slug']) ? sanitize_text_field($_POST['cat_slug']) : 'all';

    // 3. Appeler la fonction de rendu
    render_blog_posts($tax_slug);

    wp_die(); // UN SEUL wp_die() DANS CETTE FONCTION
}

// 3. Raccrochage de la fonction PHP aux hooks AJAX de WordPress

// Pour les utilisateurs non connectés (visiteurs)
add_action('wp_ajax_nopriv_filter_blog_posts', 'filter_blog_posts_ajax');

// Pour les utilisateurs connectés (administrateurs, éditeurs, etc.)
add_action('wp_ajax_filter_blog_posts', 'filter_blog_posts_ajax');
// END AJAX BLOG

add_action('init', 'register_blog_categories');
add_action('wp_enqueue_scripts', 'theme_enqueue_dashicons');
add_action('wp_enqueue_scripts', 'add_fontawesome');
add_action('after_setup_theme', 'marieheuman_setup');
add_action('wp_enqueue_scripts', 'marieheuman_enqueue_scripts');
add_action('wp_enqueue_scripts', 'marieheuman_js');
add_action('after_setup_theme', 'marieheuman_supports');