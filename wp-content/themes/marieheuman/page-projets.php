<?php
/* Template Name: Page Projets */
get_header();
?>
<main class="ml-20" id="list-projets">
    <section class="header-content">
        <?php
        $header = get_field("header_content");
        ?>
        <div class="titre">
            <?= $header['titre'] ?>
        </div>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap">
            <a href="<?= $header['lien_1']['url'] ?>" <?= $header['lien_1']['target'] ?>
                class="orange-button"><?= $header['lien_1']['title'] ?></a>
            <a href="<?= $header['lien_2']['url'] ?>" <?= $header['lien_2']['target'] ?>
                class="border-orange-button"><?= $header['lien_2']['title'] ?></a>
        </div>
    </section>
    <?php
    $content = get_field("page_projets")
        ?>
    <section class="portfolio">
        <span class="tag-home"><?= $content['portfolio']['tag'] ?></span>
        <div class="titre">
            <?= $content['portfolio']['titre'] ?>
        </div>

        <!-- Filtres par catégorie -->
        <div class="blog-filters">
            <ul class="flex gap-4 flex-wrap justify-center">
                <li>
                    <button class="filter-btn active" data-category="">Tous</button>
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
        <div class="grid lg:grid-cols-2 gap-x-32 gap-y-12" id="ajax-grid">
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
    <section class="temoignages">
        <span class="tag-home"><?= $content['temoignages']['tag'] ?></span>
        <div class="titre">
            <?= $content['temoignages']['titre'] ?>
        </div>
    </section>
    <section class="accompagnements">
        <div class="titre">
            <?= $content['accompagnements']['titre'] ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>