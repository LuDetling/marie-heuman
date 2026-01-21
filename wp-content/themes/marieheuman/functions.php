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
    wp_enqueue_script('carousel-js', get_template_directory_uri() . '/assets/js/carousel.js', [], false, true);
    wp_enqueue_script('single-js', get_template_directory_uri() . '/assets/js/projet.js', [], false, true);
    if (is_page_template('page-faq.php')) {
        wp_enqueue_script('faq-js', get_template_directory_uri() . '/assets/js/faq.js', [], false, true);
    }
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

function register_categories()
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

    register_taxonomy(
        'faq_category',
        'faq',
        [
            'label' => 'Catégories de Faq',
            'hierarchical' => true, // true = comme les catégories classiques
            'public' => true,
            'rewrite' => ['slug' => 'categorie-faq'],
            'show_admin_column' => true,
            'show_ui' => true,
            'show_in_rest' => true, // ← Obligatoire pour Gutenberg !!!

        ]
    );
}


function only_search_posts($query)
{
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', ['post', 'blog']);
    }
}
add_action('pre_get_posts', 'only_search_posts');

// STYLE WYSIWYG
add_filter('mce_buttons_2', function ($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
});

add_filter('tiny_mce_before_init', function ($settings) {

    $style_formats = [
        [
            'title' => 'Bloc blanc',
            'block' => 'div',
            'classes' => 'white-block',
            'wrapper' => true,
        ],
        [
            'title' => 'Bloc beige',
            'block' => 'div',
            'classes' => 'beige-block',
            'wrapper' => true,
        ],
        [
            'title' => 'Tag',
            'block' => 'div',
            'classes' => 'tag-home',
            'wrapper' => true,
        ],
        [
            'title' => 'Liste Orange (Conteneur)',
            'block' => 'ul', // Cible spécifiquement la balise UL
            'classes' => 'orange-list-container', // La nouvelle classe
        ],
        [
            'title' => 'Transformer en Slides',
            'selector' => 'p > img',    // CIBLE chaque image individuellement
            'block' => 'div',       // REMPLACE ou ENVELOPPE par une div
            'classes' => 'swiper-wrapper',
        ],
    ];

    $settings['style_formats'] = json_encode($style_formats);

    return $settings;
});

/**
 * Méthode Standard pour charger le CSS dans l'éditeur TinyMCE
 */
function mon_theme_add_editor_styles()
{
    // On récupère la date de modification du fichier pour casser le cache à chaque changement
    add_editor_style('/dist/main.css');
}
add_action('admin_init', 'mon_theme_add_editor_styles');
// END STYLE WYSIWYG


// SWIPER

function enqueue_swiper_carousel()
{
    // CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css'
    );

    // JS module
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_carousel');


// END SWIPER

// AJAX
function ajax_scripts()
{
    if (is_page_template('page-blog.php') || is_page_template('page-projets.php')) {
        // Ajouter un paramètre post_type en fonction de la page
        if (is_page_template('page-blog.php')) {
            $post_type = 'blog';
            $template = 'template-parts/card-blog';
            $taxonomy = 'blog_category';
        } elseif (is_page_template('page-projets.php')) {
            $post_type = 'post';
            $template = 'template-parts/card-projet';
            $taxonomy = 'category';
        }

        wp_enqueue_script('ajax', get_template_directory_uri() . '/assets/js/ajax.js', ['jquery'], '1.0', true);
        wp_localize_script('ajax', 'ajax', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax_nonce'),
            'postType' => $post_type,
            'template' => $template,
            'taxonomy' => $taxonomy,
        ]);
    }
}
add_action('wp_enqueue_scripts', 'ajax_scripts');

// Handler AJAX
function load_posts()
{
    check_ajax_referer('ajax_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $post_type = isset($_POST['postType']) ? sanitize_text_field($_POST['postType']) : '';
    $template = isset($_POST['template']) ? sanitize_text_field($_POST['template']) : '';
    $taxonomy = isset($_POST['taxonomy']) ? sanitize_text_field($_POST['taxonomy']) : '';

    // nombre de post par page
    $per_page = 12;

    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'post_status' => 'publish'
    ];

    if (!empty($category)) {
        $args['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
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
            get_template_part($template, 'list');
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
add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');

// END AJAX BLOG

// calendly
/* * Ajout d'un endpoint AJAX pour sécuriser l'appel Calendly 
 */

// On autorise l'appel pour les visiteurs non connectés (nopriv) et connectés
add_action('wp_ajax_nopriv_get_calendly_slots', 'get_calendly_spots');
add_action('wp_ajax_get_calendly_slots', 'get_calendly_spots');

function enqueue_calendly_script()
{
    // Assurez-vous que ce script est chargé là où vous en avez besoin
    if (is_page_template('page-contact.php') || is_front_page()) {
        wp_enqueue_script('calendly-proxy', get_template_directory_uri() . '/assets/js/contact.js', ['jquery'], 1.0, true);
        // Passe la variable ajaxurl au JavaScript
        wp_localize_script('calendly-proxy', 'calendly_vars', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('calendly_nonce_action'),
        ]);
    }
}
// Assurez-vous d'appeler cette fonction au bon moment (par exemple, wp_enqueue_scripts)
add_action('wp_enqueue_scripts', 'enqueue_calendly_script');

function get_calendly_spots()
{
    // 1. TA CONFIGURATION SECRÈTE
    $api_token = CALENDLY_API_TOKEN; // Lire la constante définie dans wp-config.php
    $event_uuid = CALENDLY_EVENT_UUID; // Lire la constante définie dans wp-config.php

    // 2. Récupération des dates envoyées par le JS
    $start_time = sanitize_text_field($_GET['start_time']);
    $end_time = sanitize_text_field($_GET['end_time']);

    if (empty($start_time) || empty($end_time)) {
        wp_send_json_error('Dates manquantes');
    }

    // 3. Appel vers Calendly (C'est WordPress qui appelle, pas le navigateur du client)
    $url = "https://api.calendly.com/event_type_available_times?event_type=https://api.calendly.com/event_types/{$event_uuid}&start_time={$start_time}&end_time={$end_time}";

    $args = [
        'headers' => [
            'Authorization' => 'Bearer ' . $api_token,
            'Content-Type' => 'application/json'
        ]
    ];

    $response = wp_remote_get($url, $args);

    // 4. Gestion des erreurs et renvoi au JS
    if (is_wp_error($response)) {
        wp_send_json_error('Erreur de connexion à Calendly');
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    wp_send_json_success($data); // Renvoie le JSON propre au Javascript
}

function get_calendly_form()
{
    // 1. TA CONFIGURATION SECRÈTE
    $api_token = CALENDLY_API_TOKEN; // Lire la constante définie dans wp-config.php
    $event_uuid = CALENDLY_EVENT_UUID; // Lire la constante définie dans wp-config.php

    // 3. Appel vers Calendly (C'est WordPress qui appelle, pas le navigateur du client)
    $url = "https://api.calendly.com/event_types/{$event_uuid}";

    $args = [
        'headers' => [
            'Authorization' => 'Bearer ' . $api_token,
            'Content-Type' => 'application/json'
        ]
    ];

    $response = wp_remote_get($url, $args);

    // 4. Gestion des erreurs et renvoi au JS
    if (is_wp_error($response)) {
        wp_send_json_error('Erreur de connexion à Calendly');
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    wp_send_json_success($data); // Renvoie le JSON propre au Javascript
}
add_action('wp_ajax_nopriv_get_calendly_form', 'get_calendly_form');
add_action('wp_ajax_get_calendly_form', 'get_calendly_form');

function post_calendly_invitee()
{
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'calendly_nonce_action')) {
        wp_send_json_error('Nonce invalide');
    }

    $api_token = CALENDLY_API_TOKEN; // Lire la constante définie dans wp-config.php
    $url = "https://api.calendly.com/invitees";


    if (empty($_POST['datas'])) {
        wp_send_json_error('Données invitee manquantes.');
    }

    $datas = wp_unslash($_POST['datas']);

    $args = [
        'method' => 'POST',
        'headers' => [
            'Authorization' => 'Bearer ' . $api_token,
            'Content-Type' => 'application/json'
        ],
        'body' => $datas
    ];
    $response = wp_remote_post($url, $args);

    // 4. Traiter la réponse et la renvoyer au JavaScript
    if (is_wp_error($response)) {
        wp_send_json_error($response->get_error_message());
    } else {
        // Obtenir le corps de la réponse de Calendly
        $body = wp_remote_retrieve_body($response);

        // Gérer les codes de statut HTTP de Calendly (ex: 400, 401, etc.)
        $status_code = wp_remote_retrieve_response_code($response);

        if ($status_code >= 400) {
            // Si Calendly renvoie une erreur (4xx ou 5xx), on la renvoie au client.
            $error_details = json_decode($body);
            wp_send_json_error(['status' => $status_code, 'message' => 'Erreur API Calendly', 'details' => $error_details]);
        } else {
            // Succès (généralement 201 Created pour Calendly)
            wp_send_json_success(json_decode($body));
        }
    }

    // Termine la requête AJAX
    wp_die();
}

add_action('wp_ajax_nopriv_post_calendly_invitee', 'post_calendly_invitee');
add_action('wp_ajax_post_calendly_invitee', 'post_calendly_invitee');


// end calendly

// Formulaire de contact

add_action('init', 'handle_contact_form');

function handle_contact_form()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }

    if (
        !isset($_POST['contact_nonce']) ||
        !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_action')
    ) {
        return;
    }

    // 🛑 Honeypot anti-spam
    if (!empty($_POST['website'])) {
        return;
    }

    // 🧼 Champs simples
    $lastname = sanitize_text_field($_POST['lastname'] ?? '');
    $firstname = sanitize_text_field($_POST['firstname'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');

    if (empty($lastname) || empty($firstname) || empty($email)) {
        return;
    }

    // 🧾 Récupération dynamique des champs complexes
    $body = "NOUVELLE DEMANDE DE CONTACT\n\n";
    $body .= "Nom : $lastname\n";
    $body .= "Prénom : $firstname\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $phone\n\n";

    foreach ($_POST as $key => $value) {
        if (in_array($key, ['contact_nonce', '_wp_http_referer', 'lastname', 'firstname', 'email', 'phone', 'website'])) {
            continue;
        }

        is_array($value) ? implode(', ', array_map('sanitize_text_field', $value)) : sanitize_textarea_field($value);

        $body .= ucfirst($key) . " : " . $value . "\n";
    }

    $to = "contact@marieheuman.com";
    $subject = 'Nouveau message – fichiers joints';
    $message = 'Un nouveau formulaire a été envoyé avec des fichiers joints.';
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: Site Web <contact@marieheuman.com>', // OBLIGATOIRE IONOS
        'Reply-To: ' . $email,
    ];

    $attachments = [];

    // Tes inputs file
    $file_inputs = ['photos', 'plans', 'otherFiles'];

    // Extensions autorisées
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];

    foreach ($file_inputs as $input) {

        if (!isset($_FILES[$input])) {
            continue;
        }

        $files = $_FILES[$input];

        // Normalisation si un seul fichier
        if (!is_array($files['name'])) {
            foreach ($files as $key => $value) {
                $files[$key] = [$value];
            }
        }

        foreach ($files['name'] as $index => $filename) {

            if ($files['error'][$index] !== UPLOAD_ERR_OK) {
                continue;
            }

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (!in_array($extension, $allowed_extensions)) {
                continue;
            }

            if (!is_uploaded_file($files['tmp_name'][$index])) {
                continue;
            }

            // ✅ Upload WordPress SAFE
            $upload = wp_upload_bits(
                sanitize_file_name($filename),
                null,
                file_get_contents($files['tmp_name'][$index])
            );

            if (!$upload['error']) {
                $attachments[] = $upload['file'];
            }
        }
    }


    // Envoi du mail
    wp_mail($to, $subject, $body, $headers, $attachments);

    // Nettoyage des fichiers uploadés
    foreach ($attachments as $file) {
        @unlink($file);
    }
}

// END Formulaire de contact

add_action('init', 'register_categories');
add_action('wp_enqueue_scripts', 'theme_enqueue_dashicons');
add_action('wp_enqueue_scripts', 'add_fontawesome');
add_action('after_setup_theme', 'marieheuman_setup');
add_action('wp_enqueue_scripts', 'marieheuman_enqueue_scripts');
add_action('wp_enqueue_scripts', 'marieheuman_js');
add_action('after_setup_theme', 'marieheuman_supports');