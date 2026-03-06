<?php
/* Template Name: Page Blog */
get_header();
?>
<main class="md:ml-20">
    <!-- HEADER -->
    <section class="header-content section-white">
        <?php
        $header = get_field("header_content");
        ?>
        <?= $header['titre'] ?>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center mt-16">
            <a href="<?= $header['lien_1']['url'] ?>" <?= $header['lien_1']['target'] ?>
                class="orange-button"><?= $header['lien_1']['title'] ?></a>
            <a href="<?= $header['lien_2']['url'] ?>" <?= $header['lien_2']['target'] ?>
                class="second-link-orange"><?= $header['lien_2']['title'] ?></a>
        </div>
    </section>
    <div class="img-under-header"></div>
    <!-- END HEADER -->

    <!-- ARTICLES -->
    <section class="blog-section articles section-beige">

        <!-- Filtres par catégorie -->
        <div class="blog-filters">
            <ul class="flex gap-4 overflow-x-auto xl:flex-wrap">
                <li class="min-w-max">
                    <button class="filter-btn active" data-category="">Tous</button>
                </li>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'blog_category',
                    'hide_empty' => true
                ]);
                if ($categories && !is_wp_error($categories)) {
                    foreach ($categories as $cat) {
                        ?>

                        <?php
                        echo '<li class="min-w-max"><button class="filter-btn" data-category="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</button></li>';
                    }
                }
                ?>
            </ul>
        </div>

        <!-- Grille des articles -->
        <div class="grid lg:grid-cols-2 2xl:grid-cols-3 gap-x-20 gap-y-12" id="ajax-grid">
            <!-- Articles chargés en AJAX -->
        </div>

        <!-- Loader -->
        <div class="ajax-loader" id="ajax-loader" style="display:none;">
            <span class="spinner"></span>
        </div>

        <!-- Pagination -->
        <div class="pagination" id="ajax-pagination"></div>

        <div class="newsletter-block guide-newsletter">
            <h2>Entrez dans les coulisses du studio et restez informé des nouveautés.</h2>
            <p>Recevez directement dans votre boîte mail mes nouveaux projets, articles, inspirations, ressources
                utiles… ainsi que des offres et avantages proposés par mes partenaires.</p>
            <p class="beige">1 à 2 emails par mois • Pas de spam</p>
            <?= do_shortcode("[sibwp_form id=3]") ?>
        </div>
    </section>
    <!-- END ARTICLES -->

</main>
<?php
get_footer();
?>