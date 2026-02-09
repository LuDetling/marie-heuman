<?php get_header();


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
        <?php if (!empty($projet['description'])):
            ?>
            <h2>
                <?= $projet['description'] ?>
            </h2>
        <?php endif; ?>
    </section>
    <div class="img-under-header"></div>
    <section class="section-beige">
        <?php $informations = $projet['informations'] ?>
        <div class="lg:flex lg:flex-nowrap gap-10 md:gap-20">

            <div class="">
                <div class="left-projet section-white">
                    <div class="tag-home"><?= $informations['tag'] ?></div>
                    <ul>
                        <?php if (!empty($informations['localisation'])) { ?>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z">
                                    </path>
                                </svg><?= $informations['localisation'] ?></li>
                        <?php } ?>
                        <?php if (!empty($informations['type'])) { ?>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M216,56H176V48a24,24,0,0,0-24-24H104A24,24,0,0,0,80,48v8H40A16,16,0,0,0,24,72V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V72A16,16,0,0,0,216,56ZM96,48a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM216,72v72H40V72Zm0,128H40V160H216v40Z">
                                    </path>
                                </svg><?= $informations['type'] ?>
                            </li>
                        <?php } ?>
                        <?php if (!empty($informations['surface'])) { ?>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M216,48V96a8,8,0,0,1-16,0V67.31l-50.34,50.35a8,8,0,0,1-11.32-11.32L188.69,56H160a8,8,0,0,1,0-16h48A8,8,0,0,1,216,48ZM106.34,138.34,56,188.69V160a8,8,0,0,0-16,0v48a8,8,0,0,0,8,8H96a8,8,0,0,0,0-16H67.31l50.35-50.34a8,8,0,0,0-11.32-11.32Z">
                                    </path>
                                </svg><?= $informations['surface'] ?></li>
                        <?php } ?>
                        <?php if (!empty($informations['tarifs'])) { ?>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M190,192.33a8,8,0,0,1-.63,11.3A80,80,0,0,1,56.4,152H40a8,8,0,0,1,0-16H56V120H40a8,8,0,0,1,0-16H56.4A80,80,0,0,1,189.34,52.37,8,8,0,0,1,178.66,64.3,64,64,0,0,0,72.52,104H136a8,8,0,0,1,0,16H72v16h48a8,8,0,0,1,0,16H72.52a64,64,0,0,0,106.14,39.71A8,8,0,0,1,190,192.33Z">
                                    </path>
                                </svg><?= $informations['tarifs'] ?></li>
                        <?php } ?>
                        <?php if (!empty($informations['date'])) { ?>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-38.34-85.66a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35A8,8,0,0,1,169.66,122.34Z">
                                    </path>
                                </svg><?= $informations['date'] ?></li>
                        <?php } ?>
                        <?php if (!empty($informations['credit'])) { ?>
                            <li>
                                Crédit : <?= $informations['credit'] ?>
                            </li>
                        <?php } ?>
                        <?php if (!empty($informations['identite_visuelle'])) { ?>
                            <li>
                                <?php
                                $categories = get_the_category();
                                $has_identite_visuelle = false;

                                // 1. On scanne le tableau pour vérifier la présence de la catégorie
                                if (!empty($categories)) {
                                    foreach ($categories as $category) {
                                        if ($category->slug === 'identite-visuelle') {
                                            $has_identite_visuelle = true;
                                            break; // On a trouvé, on peut arrêter de chercher
                                        }
                                    }
                                }

                                // 2. On affiche le texte en fonction du résultat
                                if ($has_identite_visuelle) { ?>
                                    <a href="<?= $informations['identite_visuelle']['url'] ?>"
                                        class="second-link-secondary">Découvrez la conception intérieure</a>
                                    <?php
                                } else { ?>
                                    <a href="<?= $informations['identite_visuelle']['url'] ?>"
                                        class="second-link-secondary">Découvrez l'identité visuelle</a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <?php
            if (!empty($informations['images'])) { ?>
                <div class="lg:mt-0 mt-8">
                    <div class="swiper swiperProjectPage">
                        <?= transformer_en_swiper_slides($informations['images']) ?>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-swiperProjectPage"></div>
                        <div class="swiper-pagination swiper-pagination-swiperProjectPage"></div>
                        <div class="swiper-button-next swiper-button-next-swiperProjectPage"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="section-white">
        <div class="parti-pris section-beige">
            <?php $partiPris = $projet['parti_pris'] ?>
            <?php if (!empty($partiPris['tag'])) { ?>
                <div class="tag-home"><?= $partiPris['tag'] ?></div>
            <?php } ?>
            <?php if (!empty($partiPris['description'])) { ?>
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

    <section class="votre-projet">
        <h2>Un projet similaire en tête ?</h2>
        <p>Chaque espace raconte une histoire unique.<br>
            Ensemble, créons la vôtre avec une approche sur-mesure, humaine et structurée.</p>
        <div class="flex gap-8 items-center flex-wrap">
            <a href="contact-architecte-interieur-tours-blois/" class="orange-button">Echangeons sur votre projet</a>
            <a href="expertise-accompagnement-architecture-interieure-tours-blois/" class="second-link">Découvrez mes
                accompagnements</a>
        </div>
    </section>


    <section class="section-white projets-recents">
        <div class="tag-home">Découvrez d'autres projets</div>
        <a href="conceptions-realisations-architecture-tours-blois" class="more">Voir tous les projets</a>
        <?php
        $args = [
            'post_type' => 'post', // Le slug de ta catégorie
            'posts_per_page' => 5,          // Nombre d'articles à récupérer
            'post__not_in' => [get_the_ID()], // Optionnel : exclure l'article actuel pour éviter les doublons
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
                                <div class="on-img">
                                    <h2>
                                        <?php the_title(); ?>
                                    </h2>
                                </div>
                                <?php if (!empty($projet['image']['url'])): ?>
                                    <img src="<?= $projet['image']['url'] ?>" alt="<?= $projet['image']['alt'] ?>">
                                <?php endif; ?>
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