<?php get_header();


$projet = get_field("projet");
$categories = get_the_category();
$indexSection = 0;
function changeIndexSection($i)
{
    return str_pad($i, 2, "0", STR_PAD_LEFT) . '. —';
}

function transformer_en_swiper_slides($content)
{
    if (empty($content))
        return $content;

    // On cherche les images (dans des <p> ou seules)
    $pattern = '/<p[^>]*>\s*(<a[^>]*>)?\s*(<img[^>]*>)\s*(<\/a>)?\s*<\/p>|(<img[^>]*>)/i';
    return preg_replace_callback($pattern, function ($matches) {
        $image_html = !empty($matches[4]) ? $matches[4] : $matches[1] . $matches[2] . $matches[3];
        return '<div class="swiper-slide">' . $image_html . '</div>';
    }, $content);
}
?>
<main class="page-projet">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    <section class="header-projet grid xl:grid-cols-12 items-end">
        <div class="xl:col-span-7">
            <img src="<?= $projet['image']['url'] ?>" alt="<?= $projet['image']['alt'] ?>">
        </div>
        <div class="xl:col-span-5 p-16">
            <div class="titre">
                <h1><?= wp_title() ?></h1>
                <?= $projet['description'] ?>
            </div>
            <ul class="flex flex-wrap gap-2 categories">
                <?php foreach ($categories as $cat):
                    $categoryClasses = $cat->slug;
                    ?>
                    <li class="<?= $categoryClasses ?>"><?= $cat->name ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <?php $contexte = get_field('projet_contexte');
    if (!empty($contexte['tag'])): ?>
        <section class="section-floral contexte">
            <div class="tag-home"><?php $indexSection++;
            echo (changeIndexSection($indexSection)); ?>
                <?= $contexte['tag'] ?>
            </div>
            <div class="content"><?= $contexte['titre'] ?></div>
            <div class="grid xl:grid-cols-2 gap-16">
                <div><?= $contexte['colonne_gauche'] ?></div>
                <div><?= $contexte['colonne_droite'] ?></div>
            </div>
        </section>
    <?php endif; ?>

    <?php $images = get_field('projet_images');
    if (!empty($images['tag'])): ?>
        <section class="section-projet-images images">
            <div class="tag-home"><?php $indexSection++;
            echo (changeIndexSection($indexSection)); ?>     <?= $images['tag'] ?>
            </div>
            <?php if (!empty($images['images'])): ?>
                <div class="lg:mt-0 mt-8">
                    <div class="swiper swiper-project-page">
                        <?= transformer_en_swiper_slides($images['images']) ?>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-swiper-project-page"></div>
                        <div class="swiper-button-next swiper-button-next-swiper-project-page"></div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <?php $demarche = get_field('projet_demarche');
    if (!empty($images['tag'])): ?>

        <section class="section-floral demarche">
            <div class="grid xl:grid-cols-12 gap-12">
                <div class="xl:col-span-4">
                    <div class="tag-home">
                        <?php $indexSection++;
                        echo (changeIndexSection($indexSection)); ?>     <?= $demarche['tag'] ?>
                    </div>
                    <div class="titre"><?= $demarche['titre'] ?></div>
                </div>
                <div class="xl:col-span-7 xl:col-start-6">
                    <div class="content"><?= $demarche['content'] ?></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $identite = get_field('projet_identite');
    if (!empty($images['tag'])): ?>

        <section class="section-desert identite">
            <div class="top-identite">
                <div class="tag-home">
                    <?php $indexSection++;
                    echo (changeIndexSection($indexSection)); ?>     <?= $identite['tag'] ?>
                </div>
                <div class="content"><?= $identite['content'] ?></div>
            </div>
            <?php
            if (!empty($identite['images'])): ?>
                <div class="lg:mt-0 mt-8">
                    <div class="swiper swiper-identite-page">
                        <?= transformer_en_swiper_slides($identite['images']) ?>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-swiper-identite-page"></div>
                        <div class="swiper-button-next swiper-button-next-swiper-identite-page"></div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <?php $resultat = get_field('projet_resultat');
    if (!empty($images['tag'])): ?>

        <section class="section-floral demarche">
            <div class="grid xl:grid-cols-12 gap-12">
                <div class="xl:col-span-4">
                    <div class="tag-home"><?php $indexSection++;
                    echo (changeIndexSection($indexSection)); ?>
                        <?= $resultat['tag'] ?>
                    </div>
                    <div class="titre">
                        <?= $resultat['titre'] ?>
                    </div>
                </div>
                <div class="xl:col-span-7 xl:col-start-6">
                    <div class="content">
                        <?= $resultat['content'] ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $technique = get_field('projet_technique');
    if (!empty($images['tag'])): ?>

        <section class="section-blue technique">
            <div class="tag-home"><?php $indexSection++;
            echo (changeIndexSection($indexSection)); ?>     <?= $technique['tag'] ?>
            </div>
            <div class="content"><?= $technique['content'] ?></div>
            <ul class="grid lg:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-0">
                <?php $listes = $technique['listes'];
                foreach ($listes as $item): ?>
                    <li>
                        <div class="tag"><?= $item['tag'] ?></div>
                        <div class="content"><?= $item['content'] ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php $projet = get_field('parlons_projet');
    if (!empty($images['tag'])): ?>

        <section class="section-floral projet">
            <div class="section-cadriage-desert max-w-[720px] mx-auto">
                <div class="tag-home"><?php $indexSection++;
                echo (changeIndexSection($indexSection)); ?>
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


    <?php $accueil_projets = get_field('accueil_projets'); ?>
    <section class="home-section section-cadriage home-projets relative decouvrir">
        <div class="tag-home"><?php $indexSection++;
        echo (changeIndexSection($indexSection)); ?> À DÉCOUVRIR AUSSI
        </div>
        <div class="cadriage"></div>
        <div class="content-section-cadriage">
            <!-- <div class="header-home-projets">
                <div class="tag-home"><?php $indexSection++;
                echo (changeIndexSection($indexSection)); ?> 
                    <?= $accueil_projets['tag'] ?>
                </div>
                <div class="content">
                    <?= $accueil_projets['content'] ?>
                </div>
            </div> -->
            <?php
            $args = [
                'post_type' => 'post', // Le slug de ta catégorie
                'posts_per_page' => 10,      // Nombre d'articles à récupérer
                'post__not_in' => [get_the_ID()], // Optionnel : exclure l'article actuel pour éviter les doublons
            ];
            $recent_posts_query = new WP_Query($args);
            if ($recent_posts_query->have_posts()): ?>
                <div class="marquee-gallery">
                    <div class="marquee-track">

                        <?php $i = 0;
                        while ($recent_posts_query->have_posts()):
                            $recent_posts_query->the_post();
                            $projet = get_field('projet');
                            $img_class = ($i % 2 === 0) ? 'img-short' : 'img-tall';
                            $i++; ?>
                            <div class="marquee-item <?= $img_class; ?>">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (!empty($projet['image']['url'])): ?>
                                        <div class="content-img">
                                            <img src="<?= esc_url($projet['image']['url']) ?>"
                                                alt="<?= esc_attr($projet['image']['alt']) ?>">
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="mb-2 mt-4">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p>A changer</p>
                                </a>
                            </div>
                        <?php endwhile; ?>

                        <?php rewind_posts(); // On remet le curseur au début ?>
                        <?php $i = 0;
                        while ($recent_posts_query->have_posts()):
                            $recent_posts_query->the_post();
                            $projet = get_field('projet');
                            $img_class = ($i % 2 === 0) ? 'img-short' : 'img-tall';
                            $i++; ?>
                            <div class="marquee-item <?= $img_class; ?>" aria-hidden="true">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (!empty($projet['image']['url'])): ?>
                                        <div class="content-img">
                                            <img src="<?= esc_url($projet['image']['url']) ?>"
                                                alt="<?= esc_attr($projet['image']['alt']) ?>">
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="mb-2 mt-4">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p>Résidentiel · Blois</p>
                                </a>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>
<?php get_footer(); ?>