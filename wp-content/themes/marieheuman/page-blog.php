<?php
/* Template Name: Page Blog */
get_header();
?>
<main class="page-journal">
    <!-- HEADER -->
    <section class="header-content">
        <?php
        $header = get_field("header_content");
        ?>
        <div class="container-header">
            <?= $header['titre'] ?>
        </div>
    </section>
    <!-- END HEADER -->

    <!-- ARTICLES -->
    <section class="blog-section articles section-floral">

        <!-- Filtres par catégorie -->
        <div class="filters">
            <?php
            $categories = get_terms([
                'taxonomy' => 'blog_category',
                'hide_empty' => true
            ]);
            $totalProjects = 0;
            foreach ($categories as $cat):
                $totalProjects += $cat->count;
            endforeach;
            ?>
            <ul class="flex items-center gap-12 overflow-x-auto">
                <li><span>Filtre</span></li>
                <li class="min-w-max flex ">
                    <button class="filter-btn active flex items-center gap-2.5 transition-colors duration-200 group"
                        data-category=""><span
                            class="w-3.5 h-3.5 rounded-full border flex items-center justify-center flex-shrink-0 transition-all duration-200"><span
                                class="w-2 h-2 rounded-full"></span></span>
                        Tous<span class="total">(
                            <?= $totalProjects ?>)
                        </span></button>
                </li>

                <?php
                if ($categories && !is_wp_error($categories)):
                    foreach ($categories as $cat):
                        if ($cat->slug !== 'identite-visuelle'):
                            echo '<li class="min-w-max"><button class="filter-btn flex items-center gap-2.5 transition-colors duration-200 group" data-category="' . esc_attr($cat->slug) . '"><span
                            class="w-3.5 h-3.5 rounded-full border flex items-center justify-center flex-shrink-0 transition-all duration-200"><span
                                class="w-2 h-2 rounded-full"></span></span>' . esc_html($cat->name) . '<span class="total">(' . $cat->count . ')</span></button></li>';
                        endif;
                    endforeach;
                endif;
                ?>
            </ul>
        </div>

        <!-- Grille des articles -->
        <div class="blog" id="ajax-grid">
            <!-- Articles chargés en AJAX -->
        </div>

        <!-- Loader -->
        <div class="ajax-loader" id="ajax-loader" style="display:none;">
            <span class="spinner"></span>
        </div>

        <!-- Pagination -->
        <div class="pagination" id="ajax-pagination"></div>

        <div class="newsletter-block guide-newsletter">
            <h2>Entrez dans les coulisses du studio et restez informé des nouveautés</h2>
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