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
        <div class="tag-home">01. — LES ÉCRITS</div>

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

    </section>
    <?php $lettre = get_field('blog_lettre'); ?>
    <section class="section-blue lettre">
        <div class="grid xl:grid-cols-12 gap-12 items-center">
            <div class="xl:col-span-5">
                <div class="tag-home"><?= $lettre['tag'] ?></div>
                <div class="content"><?= $lettre['content'] ?></div>
            </div>
            <div class="xl:col-span-6 xl:col-start-7">
                <div class="newsletter">
                    <?= do_shortcode("[sibwp_form id=3]") ?>
                </div>
            </div>
        </div>
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
<?php
get_footer();
?>