<?php get_header(); ?>

<main class="ml-20 front-page">
    <!-- IMAGE HEADER -->
    <?php
    $image_header = get_field('image_header');
    $text_image_header = get_field('text_image_header');
    $lien_1_image_header = get_field('lien_1_image_header');
    $lien_2_image_header = get_field('lien_2_image_header');
    $logo_header = get_field('logo_header');

    if ($image_header): ?>
        <section class="content-img-header relative">
            <img src="<?= esc_url($image_header['url']); ?>" alt="<?= esc_attr($image_header['alt']); ?>"
                width="<?= esc_attr($image_header['width']); ?>" height="<?= esc_attr($image_header['height']); ?>">
            <img src="<?= esc_url($logo_header['url']); ?>" alt="<?= esc_attr($logo_header['alt']); ?>"
                width="<?= esc_attr($logo_header['width']); ?>" height="<?= esc_attr($logo_header['height']); ?>"
                class="logo-header absolute top-4 left-30 z-2">
            <div class="absolute bottom-30 left-30 z-2">
                <div class="text-img-header">
                    <?= $text_image_header; ?>
                    <div class="flex gap-8 mt-12">
                        <a href="<?= esc_url($lien_1_image_header['url']) ?>"
                            class="orange-button"><?= esc_html($lien_1_image_header['title']) ?></a>
                        <a href="<?= esc_url($lien_2_image_header['url']) ?>"
                            class="border-orange-button"><?= esc_html($lien_2_image_header['title']) ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- END IMAGE HEADER -->

    <!-- MA VISION -->

    <?php
    $tag_ma_vision = get_field('tag_ma_vision');
    $titres_ma_vision = get_field('titres_ma_vision');
    $image_ma_vision = get_field('image_ma_vision');
    $texte_ma_vision = get_field('texte_ma_vision');
    $plus_ma_vision = get_field('plus_ma_vision');
    ?>

    <section class="content-ma-vision">
        <span class="tag-home"><?= $tag_ma_vision ?></span>
        <?= $titres_ma_vision ?>
        <div class="flex flex-wrap lg:flex-nowrap items-stretch gap-16">
            <div class="image-ma-vision lg:w-4/10">
                <img src="<?= esc_url($image_ma_vision['url']); ?>" alt="<?= esc_attr($image_ma_vision['alt']); ?>"
                    width="<?= esc_attr($image_ma_vision['width']); ?>"
                    height="<?= esc_attr($image_ma_vision['height']); ?>">
            </div>
            <div class="texte-ma-vision lg:w-6/10">
                <?= $texte_ma_vision ?>
                <div class="mt-8">
                    <a href="<?= esc_url($plus_ma_vision['url']) ?>"
                        class="more"><?= esc_html($plus_ma_vision['title']) ?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- END MA VISION -->



    <!-- SERIVCES -->
    <?php
    $tag_services_accueil = get_field('tag_services_accueil');
    $titres_services_accueil = get_field('titres_services_accueil');
    $lien_1_services_accueil = get_field('lien_1_services_accueil');
    $lien_2_services_accueil = get_field('lien_2_services_accueil');
    ?>
    <section class="content-services-accueil">
        <span class="tag-home"><?= $tag_services_accueil ?></span>
        <?= $titres_services_accueil ?>
        <div class="flex gap-4 justify-center selector-services">
            <?php
            for ($i = 1; $i <= 3; $i++) {

                $titre_service = get_field('titre_service_' . $i);
                ?>
                <div class="point">
                    <button
                        class="service-button border-marron-button<?= $i == 1 ? ' active-border-marron-button' : '' ?>"><?= $titre_service ?></button>
                </div>
            <?php } ?>
        </div>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            $image_service = get_field('image_service_' . $i);
            $tag_service = get_field('tag_service_' . $i);
            $texte_service = get_field('texte_service_' . $i);
            $plus_service = get_field('plus_service_' . $i);
            ?>
            <div id="<?= "content-service-{$i}" ?>"
                class="flex flex-wrap lg:flex-nowrap item-service gap-16<?= $i == 1 ? ' active-service' : '' ?>">
                <div class="lg:w-4/10 left-service">
                    <img src="<?= esc_url($image_service['url']); ?>" alt="<?= esc_attr($image_service['alt']); ?>"
                        width="<?= esc_attr($image_service['width']); ?>"
                        height="<?= esc_attr($image_service['height']); ?>">
                </div>
                <div class="lg:w-6/10 right-service">
                    <span class="tag"><?= $tag_service ?></span>
                    <?= $texte_service ?>
                    <div class="mt-8">
                        <a href="<?= esc_url($plus_service['url']) ?>"
                            class="more"><?= esc_html($plus_service['title']) ?></a>
                    </div>
                </div>
            </div>


        <?php } ?>

        <div class="flex justify-end gap-4 mt-12">
            <a href="<?= esc_url($lien_1_services_accueil['url']) ?>"
                class="orange-button"><?= esc_html($lien_1_services_accueil['title']) ?></a>
            <a href="<?= esc_url($lien_2_services_accueil['url']) ?>"
                class="border-orange-button"><?= esc_html($lien_2_services_accueil['title']) ?></a>
        </div>
    </section>
    <!-- END SERIVCES -->


    <!-- APPROCHE & PHILOSOPHIE -->
    <section class="content-approche">
        <?php
        $tag_approche_accueil = get_field('tag_approche_accueil');
        $titre_approche_accueil = get_field('titre_approche_accueil');
        $card_1_approche_accueil = get_field('card_1_approche_accueil');
        $card_2_approche_accueil = get_field('card_2_approche_accueil');
        $card_3_approche_accueil = get_field('card_3_approche_accueil');
        $card_4_approche_accueil = get_field('card_4_approche_accueil');
        ?>

        <span class="tag-home"><?= $tag_approche_accueil ?></span>
        <?= $titre_approche_accueil ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-20 gap-y-12 items-start">
            <?php
            for ($i = 1; $i <= 4; $i++) {
                $card_approche_accueil = get_field('card_' . $i . '_approche_accueil');
                ?>
                <div class="card-approche">
                    <h4><?= $card_approche_accueil['titre_card_approche_accueil'] ?></h4>
                    <div class="tag-card"><?= $card_approche_accueil['tag_card_approche_accueil'] ?></div>
                    <div class="text-card">
                        <?= $card_approche_accueil['texte_card_approche_accueil'] ?>
                    </div>
                    <div class="list-hide-approche">
                        <?= $card_approche_accueil['liste_card_approche_accueil'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="content-question-conception-accueil">
            <?php
            $question_conception_accueil = get_field("question_conception_accueil")
                ?>
            <h4><?= $question_conception_accueil['titre'] ?></h4>
            <div class="texte-question-conception">
                <?= $question_conception_accueil['texte'] ?>
            </div>
            <a href="<?= esc_url($question_conception_accueil['boutton']['url']) ?>"
                class="orange-button"><?= esc_html($question_conception_accueil['boutton']['title']) ?></a>
        </div>
    </section>
    <!-- END APPROCHE & PHILOSOPHIE -->


    <!-- BLOG -->
    <section class="content-blog-accueil">
        <?php
        $tag_blog_accueil = get_field("tag_blog_accueil");
        $titre_blog_accueil = get_field("titre_blog_accueil");
        ?>

        <span class="tag-home"><?= $tag_blog_accueil ?></span>
        <?= $titre_blog_accueil ?>


        <?php
        $args = [
            'post_type' => 'blog', // <-- le slug de ton CPT
            'posts_per_page' => 10,    // nombre d'éléments à afficher
            'post_status' => 'publish'
        ];
        $query = new WP_Query($args);

        if ($query->have_posts()):
            $index = 0;
            $index_btn = 0;
            ?>
            <div class="projets-grid carousel space-x-16">
                <?php while ($query->have_posts()):
                    $query->the_post();
                    $blog = get_field("contenu_page_blog");
                    $index++;
                    ?>
                    <article id="card-blog<?= $index ?>"
                        class="projet-card carousel-item<?= $index == 1 ? ' active-card' : '' ?>">
                        <div>
                            <?php if ($blog['image']): ?>
                                <img src="<?= esc_url($blog['image']['url']); ?>" alt="<?= esc_attr($blog['image']['alt']); ?>"
                                    width="<?= esc_attr($blog['image']['width']); ?>"
                                    height="<?= esc_attr($blog['image']['height']); ?>">
                            <?php endif; ?>
                            <div class="text-card">
                                <h4><?php the_title(); ?></h4>
                                <p class="blog-meta">
                                    <?php echo get_the_date('F o'); ?> •
                                    <?= $blog['temps_de_lecture']?> de lecture
                                </p>

                                <a href="<?php the_permalink(); ?>" class="more mt-4">Lire l'article</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="flex w-full items-center justify-center gap-2 py-2 mt-4 next-prev">
                <a href="#card-blog1" class="btn-next-prev btn-prev mr-8">❮</a>
                <div class="content-indicator">
                    <!-- au click l'id change sur le précédent si il existe -->
                    <?php while ($query->have_posts()):
                        $query->the_post();
                        $blog['image'] = get_field("image_principale_blog");
                        $index_btn++;
                        ?>
                        <a href="#card-blog<?= $index_btn ?>"
                            class="indicator<?= $index_btn == 1 ? ' active-card-indicator' : '' ?>"></a>
                    <?php endwhile; ?>
                </div>
                <!-- au click l'id change sur le prochain si il exite -->
                <a href="" class="btn-next-prev btn-next ml-8">❯</a>
            </div>
            <?php
        endif;
        wp_reset_postdata();
        ?>
    </section>
    <!-- END BLOG -->

    <!-- RESSOURCES OFFERTES -->
    <section class="content-ro-accueil">
        <?php
        $tag_ressources_offertes_accueil = get_field('tag_ressources_offertes_accueil');
        $titre_ressources_offertes_accueil = get_field('titre_ressources_offertes_accueil');
        ?>
        <span class="tag-home"><?= $tag_ressources_offertes_accueil ?></span>
        <?= $titre_ressources_offertes_accueil ?>
        <div class="flex gap-20 justify-between">
            <?php for ($i = 0; $i < 2; $i++) {
                // $fichier_ressources_offertes_accueil = get_field('fichier_1_ressources_offertes_accueil');
                $fichier_ressources_offertes_accueil = get_field('fichier_' . $i . '_ressources_offertes_accueil');
                ?>
                <?php if ($fichier_ressources_offertes_accueil) {
                    ?>
                    <div class="card-ro-accueil flex gap-8">
                        <div class="content-card-ro-accueil">

                            <div class="flex gap-4 title-icon">
                                <h4><?= $fichier_ressources_offertes_accueil['titre'] ?></h4>
                            </div>


                            <div class="pages">
                                <?php
                                $pdf_path = get_attached_file($fichier_ressources_offertes_accueil['fichier']['ID']); // Récupère le chemin du fichier sur le serveur
                        
                                // Lire le contenu du PDF
                                $content = file_get_contents($pdf_path);

                                // Compter les occurrences de '/Page' dans le fichier
                                if ($content && $fichier_ressources_offertes_accueil['fichier']['subtype'] === 'pdf') {
                                    preg_match_all("/\/Page\W/", $content, $matches);
                                    $page_count = count($matches[0]);
                                    ?>
                                    <span><?= $page_count ?> pages</span>
                                    <?php
                                }
                                ?>
                                <span class="type-file">
                                    <?= $fichier_ressources_offertes_accueil['fichier']['subtype'] ?>
                                </span>
                            </div>
                            <p>
                                <?= $fichier_ressources_offertes_accueil['description'] ?>
                            </p>
                            <div class="download">
                                <a href="<?= $fichier_ressources_offertes_accueil['fichier']['url'] ?>"> Téléchargez</a>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </section>
    <!-- END RESSOURCES OFFERTES -->
    <!-- CONTACT -->

    <section class="contact-accueil">
        <?php
        $tag_contact_accueil = get_field("tag_contact_accueil");
        $titre_contact_accueil = get_field("titre_contact_accueil");
        ?>
        <span class="tag-home"><?= $tag_contact_accueil ?></span>
        <?= $titre_contact_accueil ?>
        <div class="flex flex-wrap gap-16 justify-center">
            <?php
            for ($i = 1; $i < 4; $i++) {
                $groupe_contact_accueil = get_field('groupe_' . $i . '_contact_accueil');
                ?>
                <div class="content-groupe-contact-accueil">
                    <?php if (!empty($groupe_contact_accueil['icone'])): ?>
                        <span class="dashicons <?= $groupe_contact_accueil['icone']; ?>"></span>
                    <?php endif; ?>
                    <h4>
                        <?= $groupe_contact_accueil['titre'] ?>
                    </h4>
                    <p class="description">
                        <?= $groupe_contact_accueil['description'] ?>
                    </p>
                </div>
            <?php }
            ?>
        </div>
    </section>

    <!-- END CONTACT -->

</main>

<?php get_footer(); ?>