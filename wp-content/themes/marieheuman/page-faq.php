<?php
/* Template Name: Page FAQ */
get_header();
?>
<main class="md:ml-20">
    <section class="header-content section-white">
        <?php
        $header = get_field('header_content');
        ?>
        <?= $header['titre'] ?>

        <!-- Search -->
        <div class="search">
            <input type="text" id="faq-search" placeholder="Rechercher une question..." />
        </div>
    </section>
    <div class="img-under-header"></div>

    <section class="faq-wrapper section-beige">


        <!-- FILTRES -->
        <ul id="faq-categories" class="flex gap-4 flex-wrap justify-center">
            <li><button data-category="all" class="border-marron-button active">Toutes</button></li>
            <?php
            $terms = get_terms([
                'taxonomy' => 'faq_category',
                'hide_empty' => false,
            ]);
            foreach ($terms as $term):
                if ($term->count > 0):
                    ?>
                    <li>
                        <button data-category="<?= esc_attr($term->slug); ?>"
                            class="border-marron-button"><?= esc_html($term->name); ?></button>
                    </li>
                <?php endif; endforeach; ?>

        </ul>


        <!-- LISTE DES FAQ -->
        <div id="faq-list">
            <?php
            foreach ($terms as $term):

                // Récupération des FAQs par catégorie
                $faqs = new WP_Query([
                    'post_type' => 'faq',
                    'posts_per_page' => -1,
                    'tax_query' => [
                        [
                            'taxonomy' => 'faq_category',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ]
                    ]
                ]);

                if ($faqs->have_posts()):
                    ?>
                    <!-- <h3 class='faq-category-title'><?= $term->name ?></h3> -->
                    <div class='faq-category-block' data-category='<?= $term->slug ?>'>
                        <?php

                        while ($faqs->have_posts()):
                            $faqs->the_post();
                            $faq = get_field('faq') ?>

                            <div class="faq-item section-white" data-category="<?= $term->slug; ?>"
                                data-title="<?= strtolower(get_the_title()); ?>"
                                data-content="<?= strtolower(strip_tags(get_the_content())); ?>">
                                <details class="collapse" name="my-accordion-det-1">
                                    <summary class="collapse-title"><?= the_title() ?></summary>
                                    <div class="collapse-content"><?= $faq['description'] ?></div>
                                </details>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif;

                wp_reset_postdata();
            endforeach;
            ?>
        </div>

    </section>
</main>

<?php get_footer(); ?>