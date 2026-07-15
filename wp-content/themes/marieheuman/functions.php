<?php
function marieheuman_supports()
{
    add_theme_support('title-tag');
}

function marieheuman_js()
{
    wp_enqueue_script('menu-js', get_template_directory_uri() . '/assets/js/menu.js', [], false, true);
    wp_enqueue_script('home-js', get_template_directory_uri() . '/assets/js/home.js', [], false, true);
    wp_enqueue_script('carousel-js', get_template_directory_uri() . '/assets/js/carousel.js', [], false, true);
    wp_enqueue_script('single-js', get_template_directory_uri() . '/assets/js/projet.js', [], false, true);
    if (is_page_template('page-faq.php')) {
        wp_enqueue_script('faq-js', get_template_directory_uri() . '/assets/js/faq.js', [], false, true);
    }
    if (is_page_template('page-presses.php')) {
        wp_enqueue_script('presses-js', get_template_directory_uri() . '/assets/js/presses.js', [], false, true);
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
        'for_who' => 'Pour qui',
    ]);
}

define('IMAGE_DEFAULT', get_template_directory_uri() . '/assets/images/image-default.jpg');
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

// Autoriser l'upload de fichiers SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);


add_filter('nav_menu_item_title', 'injecter_svg_depuis_fichier_acf', 10, 4);

function injecter_svg_depuis_fichier_acf($title, $item, $args, $depth)
{
    // 1. On récupère le champ ACF (qui doit être un type "Image" ou "Fichier")
    // 'icones_menu' est le nom de ton champ sur l'élément de menu
    $icone_data = get_field('icones_menu', $item);

    if ($icone_data) {
        // 2. On récupère le chemin physique sur le serveur
        // Si ton champ retourne un Array, on prend l'ID : $icone_data['ID']
        $icon_path = get_attached_file($icone_data['icone']);

        if ($icon_path && file_exists($icon_path)) {
            // 3. On lit le contenu du SVG
            $svg_content = file_get_contents($icon_path);

            // On retourne le SVG + le titre (caché pour l'accessibilité)
            return '<span class="menu-icon">' . $svg_content . '</span>' .
                '<span class="screen-reader-text">' . $title . '</span>';
        }
    }

    return $title;
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('wp_generate_attachment_metadata', 'generate_pdf_thumbnail_from_upload', 10, 2);

add_filter('wpseo_breadcrumb_links', 'marieheuman_yoast_breadcrumb');

function marieheuman_yoast_breadcrumb($links)
{
    // Si on est sur un article seul (post)
    if (is_single() && get_post_type() === 'post') {
        // On crée manuellement le tableau pour ta page projets
        $projets_link = [
            'url' => home_url('/architecte-interieur-renovation-tours-realisations/'), // L'URL de ta page
            'text' => 'Projets',                // Le texte à afficher
        ];

        // array_splice permet d'injecter notre lien à la position 1 (juste après "Accueil" qui est à la position 0)
        array_splice($links, 1, 0, [$projets_link]);
    } else if (get_post_type() === 'blog') {
        $projets_link = [
            'url' => home_url('/blog-architecture-interieure-tours-blois/'), // L'URL de ta page
            'text' => 'Journal',                // Le texte à afficher
        ];

        array_splice($links, 1, 0, [$projets_link]);
    }

    return $links;
}


// STYLE WYSIWYG
add_filter('mce_buttons_2', function ($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
});

add_filter('tiny_mce_before_init', function ($settings) {

    $style_formats = [
        [
            'title' => 'span',
            'inline' => 'span',
            'classes' => 'span',
        ],
        [
            'title' => 'à la ligne',
            'inline' => 'span',
            'classes' => 'inline-block',
        ],
        [
            'title' => 'uppercase',
            'inline' => 'span',
            'classes' => 'uppercase',
        ],
        [
            'title' => 'Badge desert',
            'inline' => 'span',
            'classes' => 'badge badge-desert',
        ],
        [
            'title' => 'Badge rose',
            'inline' => 'span',
            'classes' => 'badge badge-rose',
        ],
        [
            'title' => 'Badge coperwood',
            'inline' => 'span',
            'classes' => 'badge badge-coperwood',
        ],
        // [
        //     'title' => 'Bloc blanc',
        //     'block' => 'div',
        //     'classes' => 'white-block',
        //     'wrapper' => true,
        // ],
        [
            'title' => 'bordure rose',
            'block' => 'div',
            'classes' => 'border-rose',
            'wrapper' => true,
        ],
        // [
        //     'title' => 'Bloc beige',
        //     'block' => 'div',
        //     'classes' => 'beige-block',
        //     'wrapper' => true,
        // ],
        [
            'title' => 'Bloc desert',
            'block' => 'div',
            'classes' => 'block-desert',
            'wrapper' => true,
        ],
        [
            'title' => 'Citation',
            'block' => 'div',
            'classes' => 'citation',
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
            'title' => 'Liste green',
            'selector' => 'ul, ol', // Cible spécifiquement la balise UL
            'classes' => 'green-list-container', // La nouvelle classe
        ],
        [
            'title' => 'Liste coperwood',
            'selector' => 'ul, ol', // Cible spécifiquement la balise UL
            'classes' => 'coperwood-list-container', // La nouvelle classe
        ],
        [
            'title' => 'Transformer en Slides',
            'selector' => 'p > img',    // CIBLE chaque image individuellement
            'block' => 'div',       // REMPLACE ou ENVELOPPE par une div
            'classes' => 'swiper-wrapper',
        ],
        [
            'title' => 'Newsreader italic',
            'block' => 'p',
            'classes' => 'newsreader-italic',
        ],
    ];

    $settings['style_formats'] = json_encode($style_formats);

    return $settings;
}, 999);

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
        $counter = 0;
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();

            if ($counter === 0 && $post_type === 'blog'):
                get_template_part('template-parts/first-card-blog');
            else:
                get_template_part($template, 'list');
            endif;
            $counter++;
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

/**
 * Supprime les espaces insécables (&nbsp;) des titres
 */
function mh_clean_title_nbsp($title)
{
    // On remplace l'entité HTML et le caractère hexadécimal correspondant
    $title = str_replace(array('&nbsp;', "\xc2\xa0"), ' ', $title);
    return trim($title);
}
add_filter('the_title', 'mh_clean_title_nbsp');

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
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['lastname'])) {
        return;
    }

    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_action')) {
        return;
    }

    if (!empty($_POST['website'])) {
        return;
    }

    $lastname = sanitize_text_field($_POST['lastname'] ?? '');
    $firstname = sanitize_text_field($_POST['firstname'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');

    if (empty($lastname) || empty($firstname) || empty($email)) {
        return;
    }

    $body = "NOUVELLE DEMANDE DE CONTACT\n\n";
    $body .= "Nom : $lastname\n";
    $body .= "Prénom : $firstname\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $phone\n\n";

    // 🧾 Récupération des champs dynamiques
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['contact_nonce', '_wp_http_referer', 'lastname', 'firstname', 'email', 'phone', 'website'])) {
            continue;
        }

        // On traite la valeur correctement
        if (is_array($value)) {
            $display_value = implode(', ', array_map('sanitize_text_field', $value));
        } else {
            $display_value = sanitize_textarea_field($value);
        }

        $body .= ucfirst(str_replace('_', ' ', $key)) . " : " . $display_value . "\n";
    }

    // 📎 Gestion des pièces jointes
    $attachments = [];
    $file_inputs = ['photos', 'plans', 'otherFiles'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];

    foreach ($file_inputs as $input) {
        if (!isset($_FILES[$input]) || empty($_FILES[$input]['name'][0]))
            continue;

        $files = $_FILES[$input];
        if (!is_array($files['name'])) {
            foreach ($files as $k => $v) {
                $files[$k] = [$v];
            }
        }

        foreach ($files['name'] as $index => $filename) {
            if ($files['error'][$index] !== UPLOAD_ERR_OK)
                continue;

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (!in_array($extension, $allowed_extensions))
                continue;

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

    // 📧 ENVOI FINAL
    $to = "contact@marieheuman.com";
    $subject = 'Contact - ' . $firstname . ' ' . $lastname;
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: Marie Heuman <contact@marieheuman.com>',
        'Reply-To: ' . $email,
    ];

    $sent = wp_mail($to, $subject, $body, $headers, $attachments);

    if ($sent) {
        // Optionnel : supprimer les fichiers du dossier upload après envoi pour ne pas encombrer le serveur
        foreach ($attachments as $file) {
            @unlink($file);
        }

        // Redirection pour éviter le renvoi du formulaire au rafraîchissement (F5)
        wp_redirect(add_query_arg('sent', 'success', $_SERVER['REQUEST_URI']) . '#form-calendly');
        exit;
    }
}

function charger_composant_contact_vue()
{
    // On ne charge Vue que sur la page de contact pour ne pas alourdir tout le site (remplacez 'contact' par le slug de votre page)
    if (is_page('contact-architecte-interieur-tours-blois')) {

        // Charger le fichier CSS compilé par Vite
        wp_enqueue_style(
            'vue-contact-css',
            get_template_directory_uri() . '/assets-vue/contact-composant.css',
            [],
            '1.0.0'
        );

        // Charger le fichier JS compilé par Vite (pensez à l'injecter dans le footer avec "true")
        wp_enqueue_script(
            'vue-contact-js',
            get_template_directory_uri() . '/assets-vue/contact-composant.js',
            [],
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'charger_composant_contact_vue');

/**
 * Injection manuelle des données structurées JSON-LD pour Marie Heuman Studio
 */
// add_action('wp_head', function () {

//     if (is_front_page()) {

//         $schema = [
//             '@context' => 'https://schema.org',
//             '@type' => 'ProfessionalService',
//             '@id' => 'https://www.marieheuman.com/#studio',
//             'name' => 'Marie Heuman Studio',
//             'alternateName' => 'Marie Heuman EI',
//             'description' => 'Studio d\'architecture d\'intérieur et de design global à Tours et Blois. Conception de lieux professionnels et résidentiels en Val de Loire et en France.',
//             'url' => 'https://www.marieheuman.com',
//             'logo' => 'https://www.marieheuman.com/logo.svg',
//             'image' => 'https://www.marieheuman.com/marie-heuman-portrait.jpg',
//             'telephone' => '+33661650745',
//             'email' => 'contact@marieheuman.com',
//             'priceRange' => '€€€€',

//             'founder' => [
//                 '@type' => 'Person',
//                 'name' => 'Marie Heuman',
//                 'jobTitle' => 'Architecte d\'intérieur & Designer global',
//                 'image' => 'https://www.marieheuman.com/marie-heuman-portrait.jpg',
//                 'sameAs' => [
//                     'https://www.instagram.com/marieheuman',
//                     'https://www.linkedin.com/in/marie-heuman',
//                     'https://pinterest.com/marieheuman'
//                 ]
//             ],

//             'address' => [
//                 '@type' => 'PostalAddress',
//                 'addressLocality' => 'Tours',
//                 'postalCode' => '37000',
//                 'addressRegion' => 'Centre-Val de Loire',
//                 'addressCountry' => 'FR'
//             ],

//             'geo' => [
//                 '@type' => 'GeoCoordinates',
//                 'latitude' => 47.3941,
//                 'longitude' => 0.6848
//             ],

//             'areaServed' => [
//                 ['@type' => 'City', 'name' => 'Tours'],
//                 ['@type' => 'City', 'name' => 'Blois'],
//                 ['@type' => 'City', 'name' => 'Amboise'],
//                 ['@type' => 'City', 'name' => 'Chinon'],
//                 ['@type' => 'City', 'name' => 'Orléans'],
//                 ['@type' => 'State', 'name' => 'Centre-Val de Loire'],
//                 ['@type' => 'Country', 'name' => 'France']
//             ],

//             // --- CORRECTION ICI : On encapsule les services dans un OfferCatalog ---
//             'hasOfferCatalog' => [
//                 '@type' => 'OfferCatalog',
//                 'name' => 'Prestations de services',
//                 'itemListElement' => [
//                     ['@type' => 'Service', 'serviceType' => 'Architecture d\'intérieur'],
//                     ['@type' => 'Service', 'serviceType' => 'Design global'],
//                     ['@type' => 'Service', 'serviceType' => 'Identité visuelle'],
//                     ['@type' => 'Service', 'serviceType' => 'Direction artistique'],
//                     ['@type' => 'Service', 'serviceType' => 'Mobilier sur-mesure'],
//                     ['@type' => 'Service', 'serviceType' => 'Branding'],
//                     ['@type' => 'Service', 'serviceType' => 'Décoration d\'intérieur']
//                 ]
//             ],
//             // ---------------------------------------------------------------------

//             'openingHoursSpecification' => [
//                 [
//                     '@type' => 'OpeningHoursSpecification',
//                     'dayOfWeek' => [
//                         'Monday',
//                         'Tuesday',
//                         'Wednesday',
//                         'Thursday',
//                         'Friday',
//                         'Saturday',
//                         'Sunday'
//                     ],
//                     'opens' => '00:00',
//                     'closes' => '23:59'
//                 ]
//             ],

//             'sameAs' => [
//                 'https://www.instagram.com/marieheuman',
//                 'https://www.linkedin.com/in/marie-heuman',
//                 'https://pinterest.com/marieheuman'
//             ]
//         ];

//         echo "\n\n";
//         echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>' . "\n";
//     }
// });

// END Formulaire de contact

add_action('init', 'register_categories');
add_action('wp_enqueue_scripts', 'theme_enqueue_dashicons');
add_action('wp_enqueue_scripts', 'add_fontawesome');
add_action('after_setup_theme', 'marieheuman_setup');
add_action('wp_enqueue_scripts', 'marieheuman_enqueue_scripts');
add_action('wp_enqueue_scripts', 'marieheuman_js');
add_action('after_setup_theme', 'marieheuman_supports');