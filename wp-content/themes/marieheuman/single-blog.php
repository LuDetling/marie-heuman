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
                <h1>
                    <?= wp_title() ?>
                </h1>
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


    <?php $lettre = get_field('blog_lettre'); ?>
    <section class="section-blue lettre">
        <div class="content-lettre">
            <div class="">
                <div class="tag-home">
                    <?= $lettre['tag'] ?>
                </div>
                <div class="content">
                    <?= $lettre['content'] ?>
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
        <?php
        $accueil_projets = get_field('accueil_projets');
        ?>
        <div class="content-section-cadriage">
            <div class="tag-home">— À lire aussi </div>
            <?php
            $args = [
                'post_type' => 'blog', // Le slug de ta catégorie
                'posts_per_page' => 10,          // Nombre d'articles à récupérer
                'post__not_in' => [get_the_ID()], // Optionnel : exclure l'article actuel pour éviter les doublons
            ];
            $recent_posts_query = new WP_Query($args);
            if ($recent_posts_query->have_posts()): ?>
                <div class="marquee-gallery">
                    <div class="marquee-track">

                        <?php $i = 0;
                        while ($recent_posts_query->have_posts()):
                            $recent_posts_query->the_post();
                            $item = get_field('contenu_page_blog');
                            $img_class = ($i % 2 === 0) ? 'img-short' : 'img-tall';
                            $i++; ?>
                            <div class="marquee-item <?= $img_class; ?>">
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
                                </a>
                            </div>
                        <?php endwhile; ?>

                        <?php rewind_posts(); // On remet le curseur au début ?>
                        <?php $i = 0;
                        while ($recent_posts_query->have_posts()):
                            $recent_posts_query->the_post();
                            $item = get_field('contenu_page_blog');
                            $img_class = ($i % 2 === 0) ? 'img-short' : 'img-tall';
                            $i++; ?>
                            <div class="marquee-item <?= $img_class; ?>" aria-hidden="true">
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
                                                <span>
                                                    <?= get_the_date('F o'); ?>
                                                </span>
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
                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </div>
                </div>
            <?php endif; ?>
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