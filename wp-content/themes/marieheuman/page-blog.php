<?php
/* Template Name: Page Blog */
get_header();
?>
<main class="ml-20">
    <!-- HEADER -->
    <section class="header-content">
        <?php
        $header_blog = get_field("header_blog");
        ?>
        <?= $header_blog['titre'] ?>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap">
            <a href="<?= $header_blog['lien_1']['url'] ?>" <?= $header_blog['lien_1']['target'] ?>
                class="orange-button"><?= $header_blog['lien_1']['title'] ?></a>
            <a href="<?= $header_blog['lien_2']['url'] ?>" <?= $header_blog['lien_2']['target'] ?>
                class="border-orange-button"><?= $header_blog['lien_2']['title'] ?></a>
        </div>
    </section>
    <!-- END HEADER -->
    <section class="articles">

        <?php
        // 🚨 CORRECTION 1 : Récupérer les termes de la taxonomie 'blog_category'
        $terms = get_terms([
            'taxonomy' => 'blog_category',
            'hide_empty' => true,
        ]);

        // 2. Définir le slug du filtre actuellement actif (lu depuis l'URL)
        // NOTE: Cette ligne n'est pas utilisée par AJAX, mais utile pour le style initial
        $current_filter_slug = isset($_GET['cat_slug']) ? sanitize_text_field($_GET['cat_slug']) : 'all';
        ?>

        <div class="blog-filters">
            <ul class="taxonomy-list">
                <li><a href="#" class="filter-item all <?= $current_filter_slug === 'all' ? 'active' : ''; ?>"
                        data-slug="all">Tous les Articles</a></li>

                <?php if (!is_wp_error($terms) && !empty($terms)): ?>
                    <?php foreach ($terms as $term): ?>
                        <li>
                            <a href="#" class="filter-item <?= $current_filter_slug === $term->slug ? 'active' : ''; ?>"
                                data-slug="<?= esc_attr($term->slug); ?>">
                                <?= esc_html($term->name); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="blog-list-container">
            <?php
            // Appelle la nouvelle fonction de rendu pour afficher la liste complète au chargement de la page
            if (function_exists('render_blog_posts')) {
                render_blog_posts('all'); // Affiche 'Tous les articles' au chargement initial
            } else {
                echo '<p>Erreur critique de configuration.</p>';
            }
            ?>
        </div>
    </section>

</main>
<?php
get_footer();
?>