<?php
/**
 * Template Name: Expertise
 */
get_header();
?>
<main id="expertise" class="md:ml-20">
    <!-- HEADER -->
    <section class="header-content section-white">
        <?php
        $header_expertise_accompagnement = get_field("header_expertise_accompagnement");
        ?>
        <?= $header_expertise_accompagnement['titre'] ?>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center">
            <a href="<?= esc_url($header_expertise_accompagnement['lien_1']['url']) ?>"
                class="orange-button"><?= esc_html($header_expertise_accompagnement['lien_1']['title']) ?>
            </a>
            <a href="<?= esc_url($header_expertise_accompagnement['lien_2']['url']) ?>"
                class="second-link-orange"><?= esc_html($header_expertise_accompagnement['lien_2']['title']) ?>
            </a>
        </div>
    </section>
    <div class="img-under-header"></div>
    <!-- <img src="<?= get_template_directory_uri() ?>/assets/images/rayure-1.jpeg" alt="" class="img-under-header"> -->
    <!-- END HEADER -->

    <!-- ACCOMPAGNEMENTS -->
    <section class="accompagnements section-beige">
        <?php
        $cinq_champs_expertise_accompagnement = get_field("cinq_champs_expertise_accompagnement");
        ?>
        <span class="tag-page"><?= $cinq_champs_expertise_accompagnement['tag'] ?></span>
        <div class="titre-description titre-description-top">
            <?= $cinq_champs_expertise_accompagnement['titre_&_description'] ?>
        </div>
        <?php
        for ($i = 1; $i < 6; $i++) {
            $champ = $cinq_champs_expertise_accompagnement['champ_' . $i . '_accompagnement'];
            // $champ = $cinq_champs_expertise_accompagnement['champ_2_accompagnement'];
            if ($champ) {
                ?>
                <div class="flex gap-10 md:gap-20 accompagnement flex-wrap lg:flex-nowrap items-center">
                    <!-- <?= var_dump($champ) ?> -->
                    <div class="lg:w-5/10 left-accompagnement">
                        <span class="index"><?= $i ?></span>
                        <img src="<?= esc_url($champ['image']['url']) ?>" alt="">
                    </div>
                    <div class="lg:w-5/10 right-accompagnement">
                        <span class="tag-champ">
                            <?= $champ['tag'] ?>
                        </span>
                        <div class="titre-description">
                            <?= $champ['titre_&_description'] ?>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </section>
    <!-- END ACCOMPAGNEMENTS -->

    <!-- ENGAGEMENTS -->
    <section class="engagements section-white">
        <?php
        $engagements_methode_expertise_accompagnement = get_field('engagements_methode_expertise_accompagnement')
            ?>
        <span class="tag-page"><?= $engagements_methode_expertise_accompagnement['tag'] ?></span>
        <div class="titre-description"><?= $engagements_methode_expertise_accompagnement['titre'] ?></div>
        <div class="grid lg:grid-cols-2 gap-10 md:gap-20">
            <?php
            for ($i = 1; $i < 5; $i++) {
                // $engagement = $engagements_methode_expertise_accompagnement['engagement_2'];
                $engagement = $engagements_methode_expertise_accompagnement['engagement_' . $i];
                if ($engagement['titre_description']) {
                    ?>
                    <div class="card-engagement section-beige">
                        <div class="dashicons">
                            <?php
                            $icon_path = get_attached_file($engagement['icone']);
                            // Vérifie si le fichier existe et l'affiche
                            if (file_exists($icon_path)) {
                                echo file_get_contents($icon_path);
                            }
                            ?>
                        </div>
                        <div class="titre-description">
                            <?= $engagement['titre_description'] ?>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>
    </section>
    <!-- END ENGAGEMENTS -->

    <!-- COLLABORATION -->
    <section class="collaboration section-beige">
        <?php
        $collaboration_expertise_accompagnement = get_field("collaboration_expertise_accompagnement");
        ?>
        <span class="tag-page"><?= $collaboration_expertise_accompagnement["tag"] ?></span>
        <?= $collaboration_expertise_accompagnement["titre_description"] ?>
        <div class="flex gap-5 md:gap-10 justify-center selectors items-center">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <button class="selector-slide<?= $i == 1 ? ' active-border-marron-button' : '' ?>"><?= $i ?></button>
                <?php
                if ($i < 3) { ?>
                    <div class="point"></div>
                <?php }
                ?>
            <?php } ?>
        </div>
        <?php for ($i = 1; $i < 4; $i++) {
            $collaboration = $collaboration_expertise_accompagnement['slide_' . $i]
                ?>
            <div id="card-collaboration-<?= $i ?>"
                class="section-white card-collaboration<?= $i == 1 ? ' active-collaboration' : '' ?>">
                <div class="flex flex-wrap md:flex-nowrap gap-5 md:gap-10">
                    <span class="dashicons <?= $collaboration['icone']; ?>"></span>
                    <div>
                        <h4><?= $collaboration['titre']; ?></h4>
                        <span class="offre"><?= $collaboration['offre']; ?></span>
                        <?= $collaboration['description']; ?>
                    </div>
                </div>

            </div>
        <?php } ?>
        <div class="reservation">
            <?php $reservation = $collaboration_expertise_accompagnement['reservation'] ?>
            <?= $reservation['titre_descrpition'] ?>
            <a href="<?= $reservation['lien']['url'] ?>" target="<?= $reservation['lien']['target'] ?>"
                class="orange-button"><?= $reservation['lien']['title'] ?></a>
        </div>
    </section>
    <!-- END COLLABORATION -->

    <!-- RESSOURCES -->
    <section class="ressources section-white">
        <?php
        $ressources_expertise_accompagnement = get_field("ressources_expertise_accompagnement");
        ?>
        <span class="tag-page"><?= $ressources_expertise_accompagnement['tag'] ?></span>
        <?= $ressources_expertise_accompagnement['titre'] ?>
        <div class="grid lg:grid-cols-2 gap-10 md:gap-20">
            <?php
            for ($i = 1; $i < 3; $i++) {
                $ressource = $ressources_expertise_accompagnement['ressource_' . $i];
                ?>
                <!-- //new -->
                <div class="card-ro-accueil gap-4 sm:gap-8 flex w-full section-beige flex-wrap sm:flex-nowrap">
                    <div class="icone">
                        <?= file_get_contents(get_template_directory() . '/assets/images/icones/file-arrow-down.svg');
                        ?>
                    </div>
                    <div class="content-card-ro-accueil">

                        <div class="flex gap-4 title-icon">
                            <h4><?= $ressource['fichier']['title'] ?></h4>
                        </div>

                        <div class="pages">
                            <?php
                            $pdf_path = get_attached_file($ressource['fichier']['ID']); // Récupère le chemin du fichier sur le serveur
                        
                            // Lire le contenu du PDF
                            $content = file_get_contents($pdf_path);

                            // Compter les occurrences de '/Page' dans le fichier
                            if ($content && $ressource['fichier']['subtype'] === 'pdf') {
                                preg_match_all("/\/Page\W/", $content, $matches);
                                $page_count = count($matches[0]);
                                ?>
                                <span><?= $page_count ?> pages</span>
                                <?php
                            }
                            ?>
                            <span class="type-file">
                                <?= $ressource['fichier']['subtype'] ?>
                            </span>
                        </div>
                        <p>
                            <?= $ressource['fichier']['description'] ?>
                        </p>
                        <a href="<?= $ressource['fichier']['url'] ?>" class="more">
                            Téléchargez</a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </section>
    <!-- END RESSOURCES -->
</main>
<?php get_footer(); ?>