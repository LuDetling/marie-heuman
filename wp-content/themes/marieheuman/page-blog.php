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

    <!-- ARTICLES -->
    <section class="blog-section articles">

        <!-- Filtres par catégorie -->
        <div class="blog-filters">
            <ul class="flex gap-8 flex-wrap justify-center">
                <li>
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
                        echo '<li><button class="filter-btn" data-category="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</button></li>';
                    }
                }
                ?>
            </ul>
        </div>

        <!-- Grille des articles -->
        <div class="grid lg:grid-cols-2 gap-x-32 gap-y-12" id="blog-grid">
            <!-- Articles chargés en AJAX -->
        </div>

        <!-- Loader -->
        <div class="blog-loader" id="blog-loader" style="display:none;">
            <span class="spinner"></span>
        </div>

        <!-- Pagination -->
        <div class="pagination" id="blog-pagination"></div>
    </section>
    <!-- END ARTICLES -->

</main>
<?php
get_footer();
?>