<?php get_header(); ?>


<?php
$projet = get_field("projet");
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
<main class="md:ml-20 page-projet">
    <section class="header-content section-white">
        <h1><?php the_title() ?></h1>
        <?php
        if ($projet['description']) {

            ?>
            <h2>
                <?= $projet['description'] ?>
            </h2>
            <?php
        }
        ?>
    </section>
    <div class="img-under-header"></div>
    <section class="section-beige">
        <?php $informations = $projet['informations'] ?>
        <div class="lg:flex lg:flex-nowrap gap-10 md:gap-20">

            <div class="">
                <div class="left-projet section-white">
                    <div class="tag-home"><?= $informations['tag'] ?></div>
                    <ul>
                        <?php if ($informations['localisation']) { ?>
                            <li class="localisation"><?= $informations['localisation'] ?></li>
                        <?php } ?>
                        <?php if ($informations['tag']) { ?>
                            <li class="type"><?= $informations['tag'] ?></li>
                        <?php } ?>
                        <?php if ($informations['surface']) { ?>
                            <li class="type"><?= $informations['surface'] ?></li>
                        <?php } ?>
                        <?php if ($informations['tarifs']) { ?>
                            <li class="type"><?= $informations['tarifs'] ?></li>
                        <?php } ?>
                        <?php if ($informations['date']) { ?>
                            <li class="type"><?= $informations['date'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <?php
            if ($informations['images']) { ?>
                <div class="flex-1 lg:mt-0 mt-8">
                    <div class="swiper swiperProjectPage">
                        <?= transformer_en_swiper_slides($informations['images']) ?>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-projet"></div>
                        <div class="swiper-pagination swiper-pagination-projet"></div>
                        <div class="swiper-button-next swiper-button-next-projet"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="section-white">
        <div class="parti-pris section-beige">
            <?php $partiPris = $projet['parti_pris'] ?>
            <div class="tag-home"><?= $partiPris['tag'] ?></div>
            <?php if ($partiPris['description']) { ?>
                <div>
                    <?= $partiPris['description'] ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <?php

    if (has_category('identite-visuelle')) {
        // Charge un template spécifique pour le portfolio
        get_template_part('template-parts/content/identite');
    } else {
        // Charge le design par défaut
        get_template_part('template-parts/content/avant-apres');
    }
    ?>

    <?php $votreProjet = $projet['votre_projet'];
    if ($votreProjet['lien_1']) {
        ?>
        <section class="votre-projet">
            <?= $votreProjet['titre'] ?>
            <div class="flex gap-8 items-center">
                <a href="<?= $votreProjet['lien_1']['url'] ?>"
                    class="orange-button"><?= $votreProjet['lien_1']['title'] ?></a>
                <a href="<?= $votreProjet['lien_2']['url'] ?>"
                    class="second-link"><?= $votreProjet['lien_2']['title'] ?></a>
            </div>
        </section>
    <?php } ?>


    <section class="section-white projets-recents">
        <div class="tag-home">Découvrez d'autres projets</div>
        <a href="conceptions-realisations-architecture-tours-blois" class="more">Voir tous les projets</a>
        <?php
        $args = [
            'post_type' => 'post', // Le slug de ta catégorie
            'posts_per_page' => 5,          // Nombre d'articles à récupérer
            // 'post__not_in' => [get_the_ID()], // Optionnel : exclure l'article actuel pour éviter les doublons
        ];
        $recent_posts_query = new WP_Query($args);
        if ($recent_posts_query->have_posts()): ?>
            <div class="mt-16 swiper swiperProjetsRecents">
                <div class="swiper-wrapper">
                    <?php while ($recent_posts_query->have_posts()):
                        $recent_posts_query->the_post();
                        $projet = get_field('projet'); ?>
                        <div class="swiper-slide">
                            <a href="<?php the_permalink(); ?>">
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                                <img src="<?= $projet['image']['url'] ?>" alt="">
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="flex gap-8 swiper-navigation justify-center items-center">
                <div class="swiper-button-prev swiper-button-prev-projet-recents"></div>
                <div class="swiper-pagination swiper-pagination-projet-recents"></div>
                <div class="swiper-button-next swiper-button-next-projet-recents"></div>
            </div>
            <?php
            // 4. RÉINITIALISER les données globales de post (CRUCIAL)
            wp_reset_postdata();
        endif; ?>

    </section>
</main>
<?php get_footer(); ?>