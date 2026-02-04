<?php
/* Template Name: Page Projets */
get_header();
?>
<main class="md:ml-20" id="list-projets">
    <section class="header-content section-white">
        <?php
        $header = get_field("header_content");
        ?>
        <div class="titre">
            <?= $header['titre'] ?>
        </div>
        <div class="flex items-center gap-8 flex-wrap lg:flex-nowrap mt-8">
            <a href="<?= $header['lien_1']['url'] ?>" <?= $header['lien_1']['target'] ?>
                class="orange-button"><?= $header['lien_1']['title'] ?></a>
            <a href="<?= $header['lien_2']['url'] ?>" <?= $header['lien_2']['target'] ?>
                class="second-link-orange"><?= $header['lien_2']['title'] ?></a>
        </div>
    </section>
    <div class="img-under-header"></div>
    <?php
    $content = get_field("page_projets")
        ?>
    <section class="portfolio section-beige">
        <span class="tag-home"><?= $content['portfolio']['tag'] ?></span>
        <div class="titre">
            <?= $content['portfolio']['titre'] ?>
        </div>

        <!-- Filtres par catégorie -->
        <div class="blog-filters">
            <ul class="flex gap-4 flex-wrap">
                <li>
                    <button class="filter-btn active" data-category="">Tous les projets</button>
                </li>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => true
                ]);
                if ($categories && !is_wp_error($categories)) {
                    foreach ($categories as $cat) {
                        ?>
                        <?php
                        echo '<li><button class="filter-btn" data-category="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</button></li>';
                    }
                }
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
    <section class="temoignages section-white">
        <span class="tag-home"><?= $content['temoignages']['tag'] ?></span>
        <div class="titre">
            <?= $content['temoignages']['titre'] ?>
        </div>
        <div class="swiper swiperAvis">
            <div class="swiper-wrapper">
                <?php
                $avis = new WP_Query([
                    'post_type' => 'avis',
                    'posts_per_page' => -1,
                ]);
                if ($avis->have_posts()):
                    while ($avis->have_posts()):
                        $avis->the_post();
                        $avi = get_field("avis_contenu");
                        ?>

                        <div class="swiper-slide">
                            <div class="rating">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= intval($avi['note'])) {
                                        echo '<span class="star full">★</span>';
                                    } else {
                                        echo '<span class="star empty">☆</span>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="description"><?= $avi['description'] ?></div>
                            <div class="nom"><?= the_title() ?></div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
        <div class="flex gap-8 swiper-navigation justify-center items-center">
            <div class="swiper-button-prev swiper-button-prev-avis"></div>
            <div class="swiper-pagination swiper-pagination-avis"></div>
            <div class="swiper-button-next swiper-button-next-avis"></div>
        </div>
    </section>
    <section class="accompagnements section-beige">
        <div class="titre">
            <?= $content['accompagnements']['titre'] ?>
            <div class="flex gap-8 mt-12 items-center flex-wrap">
                <a href="<?= $content['accompagnements']['lien_1']['url'] ?>"
                    target="<?= $content['accompagnements']['lien_1']['target'] ?>"
                    class="orange-button"><?= $content['accompagnements']['lien_1']['title'] ?></a>
                <a href="<?= $content['accompagnements']['lien_2']['url'] ?>"
                    target="<?= $content['accompagnements']['lien_2']['target'] ?>"
                    class="second-link"><?= $content['accompagnements']['lien_2']['title'] ?></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>