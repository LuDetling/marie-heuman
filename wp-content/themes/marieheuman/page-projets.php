<?php
/* Template Name: Page Projets */
get_header();
?>
<main id="list-projets">
    <section class="header-content">
        <?php
        $header = get_field("header_content");
        ?>
        <div class="container-header">
            <?= $header['titre'] ?>
        </div>
    </section>
    <section class="portfolio section-floral">
        <!-- Filtres par catégorie -->
        <div class="blog-filters">
            <div class="tag-home">01. — LA SÉLECTION </div>
            <ul class="flex items-center gap-4 overflow-x-auto">
                <div>Filtre</div>
                <li class="min-w-max">
                    <button class="filter-btn active" data-category="">Tous</button>
                </li>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => true
                ]);
                if ($categories && !is_wp_error($categories)):
                    foreach ($categories as $cat):
                        if ($cat->slug !== 'identite-visuelle'):
                            echo '<li class="min-w-max"><button class="filter-btn" data-category="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</button></li>';
                        endif;
                    endforeach;
                endif;
                ?>
            </ul>
        </div>

        <!-- Grille des projes -->
        <div class="grid 2xl:grid-cols-3 xl:grid-cols-2 gap-10 md:gap-20 projets" id="ajax-grid">
            <!-- Projets chargés en AJAX -->
        </div>

        <!-- Loader -->
        <div class="ajax-loader" id="ajax-loader" style="display:none;">
            <span class="spinner"></span>
        </div>

        <!-- Pagination -->
        <div class="pagination" id="ajax-pagination"></div>
        <!-- ajax list des projets -->
    </section>
    <section class="section-floral projet">
        <?php $projet = get_field('parlons_projet'); ?>
        <div class="section-cadriage-desert max-w-[720px] mx-auto">
            <div class="tag-home">
                <?= $projet['tag'] ?>
            </div>
            <div class="content">
                <?= $projet['content'] ?>
            </div>
            <div class="flex items-center justify-center gap-6 flex-wrap">
                <a href="<?= $projet['lien_1']['url'] ?>" class="button marron-button">
                    <?= $projet['lien_1']['title'] ?>
                </a>
                <a href="<?= $projet['lien_2']['url'] ?>" class="secondary-button">
                    <?= $projet['lien_2']['title'] ?>
                </a>
            </div>
        </div>
        <div class="cadriage"></div>
    </section>
</main>

<?php get_footer(); ?>