<?php
/* Template Name: Article Blog */
get_header();

// $categories = get_the_category();
$blog = get_field("contenu_page_blog");
$indexSection = 0;
function changeIndexSection($i)
{
    return str_pad($i, 2, "0", STR_PAD_LEFT) . '. —';
}
?>
<main class="page-blog">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    <section class="header-content">
        <div class="header-container">

            <ul class="flex flex-wrap gap-2 categories-blog">
                <?php $categories = get_the_terms(get_the_ID(), 'blog_category');

                foreach ($categories as $cat):
                    $categoryClasses = $cat->slug;
                    ?>
                    <li class="<?= $categoryClasses ?>">
                        <?= $cat->name ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="titre">
                <h1> <?= the_title(); ?> </h1>
            </div>
            <div class="blog-meta flex gap-5">
                <span class="date flex items-center gap-1 flex-wrap">
                    <div class="flex items-center gap-2">
                        <span>
                            <?= get_the_date('F o'); ?>
                        </span>
                    </div>
                    <div>·</div>
                    <?php if (!empty($blog['temps_de_lecture'])): ?>
                        <div class="flex items-center gap-2">
                            <?= $blog['temps_de_lecture'] ?> de lecture
                        </div>
                    <?php endif; ?>
                </span>
            </div>
            <div class="description">
                <?= $blog['description'] ?>
            </div>
        </div>
        <img src="<?= $blog['image']['url'] ?>" alt="<?= $blog['image']['alt'] ?>">
    </section>


    <section class="section-floral">
        <div class="content">
            <?= $blog['contenu'] ?>
        </div>
    </section>



    <?php $faq = get_field('blog_faq');
    if (!empty($faq['tag'])): ?>
        <section class="section-floral faq">
            <div class="tag-home">
                <?= $faq['tag'] ?>
            </div>
            <div class="content">
                <?= $faq['content'] ?>
            </div>
            <div class="accordions">
                <?php foreach ($faq['accordions'] as $accordion): ?>
                    <div class="flex items-start gap-6 py-8 accordion-content">
                        <div class="block circle"></div>
                        <details class="collapse " name="accordion-methode-home">
                            <summary class="collapse-title mb-2 items-center">
                                <div class="title">
                                    <?= $accordion['titre'] ?>
                                </div>
                            </summary>
                            <div class="collapse-content mt-4 ">
                                <?= $accordion['content'] ?>
                            </div>
                        </details>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>


    <?php $lettre = get_field('blog_lettre'); ?>
    <section class="section-blue lettre">
        <div class="content-lettre">
            <div class="">
                <div class="tag-home">
                    — La lettre </div>
                <div class="content">
                    <h2>Vous avez aimé cette lecture ?</h2>
                    <p>Recevez les nouveaux articles du journal, les projets récemment livrés et les réflexions inédites
                        du studio. Sans spam.</p>
                </div>
            </div>
            <div class="">
                <div class="newsletter">
                    <?= do_shortcode("[sibwp_form id=3]") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section section-cadriage home-projets relative lire">
        <div class="cadriage"></div>
        <?php $accueil_projets = get_field('accueil_projets'); ?>

        <div class="content-section-cadriage">
            <div class="tag-home">— À lire aussi </div>
            <?php
            $args = [
                'post_type' => 'blog',
                'posts_per_page' => 10,
                'post__not_in' => [get_the_ID()],
            ];
            $recent_posts_query = new WP_Query($args);

            if ($recent_posts_query->have_posts()): ?>
                <div class="content-swiper">
                    <div id="swiperDefilement" class="swiper swiperDefilement">
                        <div class="swiper-wrapper">
                            <?php while ($recent_posts_query->have_posts()):
                                $recent_posts_query->the_post();
                                $item = get_field('contenu_page_blog');
                                ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (!empty($item['image']['url'])): ?>
                                            <div class="content-img">
                                                <img src="<?= esc_url($item['image']['url']) ?>"
                                                    alt="<?= esc_attr($item['image']['alt']) ?>">
                                            </div>
                                        <?php endif; ?>

                                        <h3 class="mb-2 mt-4">
                                            <?php the_title(); ?>
                                        </h3>

                                        <div class="blog-meta flex gap-5">
                                            <span class="date flex items-center gap-1 flex-wrap">
                                                <div class="flex items-center gap-2">
                                                    <span><?= get_the_date('F o'); ?></span>
                                                </div>
                                                <div>·</div>
                                                <?php if (!empty($item['temps_de_lecture'])): ?>
                                                    <div class="flex items-center gap-2">
                                                        <?= $item['temps_de_lecture'] ?> de lecture
                                                    </div>
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); // <-- Déplacé ici, HORS de la boucle while ?>
                        </div>
                    </div>

                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-swiperDefilement"></div>
                        <div class="swiper-button-next swiper-button-next-swiperDefilement"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php $projet = get_field('parlons_projet');
    if (!empty($projet['tag'])):
        ?>
        <section class="section-floral projet">
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
    <?php endif; ?>
</main>
<?php
get_footer();
?>