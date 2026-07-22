<?php get_header(); ?>

<main class="">
    <?php
    $accueil_header = get_field('accueil_header');
    ?>
    <section class="home-header relative">
        <div class="content-home-header">
            <?= $accueil_header['content'] ?>
            <div class="flex gap-6 items-center justify-center flex-wrap">
                <a href="<?= $accueil_header['lien_1']['url'] ?>"
                    class="button marron-button"><?= $accueil_header['lien_1']['title'] ?></a>
                <a href="<?= $accueil_header['lien_2']['url'] ?>"
                    class="secondary-button"><?= $accueil_header['lien_2']['title'] ?></a>
            </div>
        </div>
        <div class="images-header">
            <?= $accueil_header['images'] ?>
        </div>
    </section>
    <div class="infinity-bar header-infinity-bar">
        <!-- <div class="content-infinity-bar"> -->
        <?= $accueil_header['infinity_bar'] ?>
        <?= $accueil_header['infinity_bar'] ?>
        <!-- </div> -->
    </div>

    <section class="home-section section-floral home-enjeux">
        <?php
        $accueil_enjeux = get_field('accueil_enjeux');
        $cards = $accueil_enjeux['cards'];
        ?>
        <div class="tag-home">
            <?= $accueil_enjeux['tag'] ?>
        </div>
        <div class="content">
            <?= $accueil_enjeux['content'] ?>
        </div>
        <div class="grid xl:grid-cols-3 gap-6">
            <?php
            foreach ($cards as $card): ?>
                <div class="card-enjeux p-10">
                    <span class="key"><?= $card['key'] ?></span>
                    <?= $card['content'] ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="home-section section-desert home-approche">
        <?php
        $accueil_approche = get_field('accueil_approche');
        ?>
        <div class="grid xl:grid-cols-12 gap-12">
            <div class="left-approche xl:col-span-5">
                <div class="tag-home">
                    <?= $accueil_approche['tag'] ?>
                </div>
                <div class="content">
                    <?= $accueil_approche['content'] ?>
                </div>
            </div>
            <div class="right-approche xl:col-span-7">
                <?= $accueil_approche['right_content'] ?>
            </div>
        </div>
    </section>
    <section class="home-section section-floral home-pour-qui">
        <?php
        $accueil_pour_qui = get_field('accueil_pour_qui');
        ?>
        <div class="tag-home"><?= $accueil_pour_qui['tag'] ?></div>
        <div class="content"><?= $accueil_pour_qui['content'] ?></div>
        <div class="grid xl:grid-cols-2 gap-10 cards">
            <?php
            foreach ($accueil_pour_qui['cards'] as $card): ?>
                <div>
                    <img src="<?= $card['image']['url'] ?>" class="" />
                    <div class="container-card">
                        <div class="tag"><?= $card['tag'] ?></div>
                        <?= $card['content'] ?>
                        <a href="<?= $card['lien']['url'] ?>" class="secondary-button"><?= $card['lien']['title'] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="home-section section-cadriage home-projets relative">
        <div class="cadriage"></div>
        <?php
        $accueil_projets = get_field('accueil_projets');
        ?>
        <div class="content-section-cadriage">
            <div class="header-home-projets">
                <div class="tag-home"><?= $accueil_projets['tag'] ?></div>
                <div class="content"><?= $accueil_projets['content'] ?></div>
            </div>
            <?php
            $args = [
                'post_type' => 'post', // Le slug de ta catégorie
                'posts_per_page' => 10,          // Nombre d'articles à récupérer
                'post__not_in' => [get_the_ID()], // Optionnel : exclure l'article actuel pour éviter les doublons
            ];
            $recent_posts_query = new WP_Query($args);
            if ($recent_posts_query->have_posts()): ?>
                <div class="content-swipper">
                    <div id="swiperDefilement" class="swiper swiperDefilement">
                        <div class="swiper-wrapper">
                            <?php
                            while ($recent_posts_query->have_posts()):
                                $recent_posts_query->the_post();
                                $projet = get_field('projet');
                                ?>
                                <div class="swiper-slide">
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
                                        <ul class="flex flex-wrap gap-2 categories-projets">
                                            <?php $categories = get_the_category();
                                            foreach ($categories as $cat):
                                                $categoryClasses = $cat->slug;
                                                ?>
                                                <li class="<?= $categoryClasses ?>">
                                                    <?= $cat->name ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </a>
                                </div>
                            <?php endwhile; ?>

                            <?php wp_reset_postdata();  // On remet le curseur au début ?>
                        </div>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-swiperDefilement"></div>
                        <div class="swiper-button-next swiper-button-next-swiperDefilement"></div>
                    </div>
                </div>
            <?php endif; ?>
            <a href="<?= $accueil_projets['lien']['url'] ?>"
                class="secondary-button"><?= $accueil_projets['lien']['title'] ?></a>
        </div>
    </section>

    <section class="home-section section-floral home-methode">
        <?php
        $accueil_methode = get_field("accueil_methode");
        ?>
        <div class="grid xl:grid-cols-12 gap-12">
            <div class="xl:col-span-5 xl:col-start-8 right-methode">
                <div class="tag-home"><?= $accueil_methode['tag'] ?></div>
                <div class="content"><?= $accueil_methode['content'] ?></div>
            </div>
            <div class="xl:col-span-7 xl:col-start-1 xl:row-start-1 accordions">
                <?php $accordions = $accueil_methode['accordions'];
                $i = 1;

                foreach ($accordions as $accordion):
                    $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                    ?>
                    <div class="flex items-start gap-6 py-8 accordion-content">
                        <div class="block circle"></div>
                        <details class="collapse" name="accordion-methode-home">
                            <summary class="collapse-title mb-2">
                                <span class="index">
                                    <?= $numero ?>
                                </span>
                                <div class="title">
                                    <?= $accordion['title'] ?>
                                </div>
                            </summary>
                            <div class="collapse-content mt-4"><?= $accordion['content'] ?></div>
                        </details>
                    </div>
                    <?php $i++; endforeach; ?>
            </div>
        </div>
        <a href="<?= $accueil_methode['lien']['url'] ?>"
            class="secondary-button mt-12 inline-block"><?= $accueil_methode['lien']['title'] ?></a>
    </section>

    <section class="home-section section-rose section-avis">
        <?php $accueil_avis = get_field('accueil_avis'); ?>
        <div class="top-content-avis">
            <div class="tag-home">
                <?= $accueil_avis['tag'] ?>
            </div>
            <div class="title mb-16">
                <?= $accueil_avis['titre'] ?>
            </div>

            <div class="grid xl:grid-cols-3 gap-12 mb-20">
                <?php
                foreach ($accueil_avis['avis'] as $avi): ?>
                    <div>
                        <div class="description mb-6">
                            <?= $avi['description'] ?>
                        </div>
                        <div class="tag mb-1">
                            <?= $avi['tag'] ?>
                        </div>
                        <div class="date">
                            <?= $avi['date'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="confiance">
            <p> <?= $accueil_avis['titre_confiance'] ?></p>
            <div class="infinity-bar confiance-infinity-bar">
                <?= $accueil_avis['images_confiance'] ?>
                <?= $accueil_avis['images_confiance'] ?>
            </div>
        </div>
    </section>

    <section class="home-section section-demarrer section-floral">
        <?php $accueil_demarrer = get_field('accueil_demarrer'); ?>
        <div class="content-section-demarrer section-cadriage-desert">
            <div class="tag-content-button">
                <div class="tag-home">
                    <?= $accueil_demarrer['tag'] ?>
                </div>
                <div class="content">
                    <?= $accueil_demarrer['content'] ?>
                </div>
                <a href="<?= $accueil_demarrer['lien']['url'] ?>"
                    class="button marron-button"><?= $accueil_demarrer['lien']['title'] ?></a>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>