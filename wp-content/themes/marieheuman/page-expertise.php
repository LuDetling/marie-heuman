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
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center mt-8">
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
        <!-- <span class="tag-page"><?= $cinq_champs_expertise_accompagnement['tag'] ?></span> -->
        <span class="tag-page">Cinq champs d’accompagnement</span>
        <div class="titre-description">
            <h2>Du diagnostic à la réalisation, une approche sur mesure et globale</h2>
            <h3>Une méthode claire, adaptée à chaque étape de votre projet</h3>
        </div>
        <div class="flex gap-10 md:gap-20 flex-wrap lg:flex-nowrap items-center mb-20">
            <div class="lg:w-5/10 ">
                <p data-start="940" data-end="1152">J’interviens à chaque étape du projet, de la phase de <strong
                        data-start="998" data-end="1023">diagnostic et d’étude</strong> jusqu’à la <strong
                        data-start="1035" data-end="1052">mise en œuvre</strong>, en adaptant précisément mon
                    accompagnement à vos besoins, vos enjeux et vos objectifs.</p>
                <p data-start="1154" data-end="1497">J’aborde chaque projet comme un système cohérent, où l’<strong
                        data-start="1213" data-end="1223">espace</strong>, l’<strong data-start="1227"
                        data-end="1236">image</strong> et l’<strong data-start="1242" data-end="1251">usage</strong>
                    dialoguent harmonieusement. Cette vision globale s’appuie sur une <strong data-start="1318"
                        data-end="1353">approche transversale du design</strong>, mêlant <strong data-start="1362"
                        data-end="1387">réflexion stratégique</strong>, <strong data-start="1389"
                        data-end="1403">créativité</strong> et <strong data-start="1407" data-end="1429">exigence
                        technique.</strong></p>
                <p data-start="2379" data-end="2869">Cette <strong data-start="2385" data-end="2404">approche à
                        360°</strong> permet d’éviter les réponses fragmentées et d’assurer une cohérence réelle entre
                    ce que le lieu est, ce qu’il exprime et la manière dont il est vécu. Le projet se construit comme
                    une <strong data-start="2596" data-end="2624">collaboration sur mesure</strong>, nourrie par
                    l’échange, l’analyse des usages et une attention particulière portée aux <strong data-start="2719"
                        data-end="2730">détails</strong>, afin d’aboutir à un résultat <strong data-start="2761"
                        data-end="2771">aligné</strong>, <strong data-start="2773" data-end="2785">maîtrisé</strong> et
                    <strong data-start="2789" data-end="2800">durable</strong>, aussi pertinent dans son fonctionnement
                    que dans son image.</p>
            </div>
            <div class="lg:w-5/10 ">
                <div class="white-block">
                    <ul>
                        <li>Le <strong>design stratégique</strong> permet de clarifier les objectifs du projet, ses
                            contraintes, son positionnement et les priorités à mettre en œuvre. Il pose les bases d’un
                            projet pertinent, durable et aligné avec votre mode de vie ou votre activité.</li>
                        <li>Le&nbsp;<strong>design d’espace</strong>&nbsp;organise les volumes, les circulations, la
                            lumière et les ambiances afin de créer un lieu fonctionnel, fluide et agréable à vivre au
                            quotidien.</li>
                        <li>Le&nbsp;<strong>design de mobilier</strong>&nbsp;prolonge cette réflexion à l’échelle des
                            objets et des agencements sur mesure, en optimisant l’usage tout en renforçant le caractère
                            du lieu.</li>
                        <li>Le&nbsp;<strong>design d’identité</strong>&nbsp;assure la cohérence visuelle et émotionnelle
                            de l’ensemble. Il peut concerner l’image de marque pour les professionnels, ou l’univers
                            esthétique et sensible du lieu pour les particuliers.</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        for ($i = 1; $i < 6; $i++):
            $champ = $cinq_champs_expertise_accompagnement['champ_' . $i . '_accompagnement'];
            if ($champ):
                ?>
                <div class="flex gap-10 md:gap-20 accompagnement flex-wrap lg:flex-nowrap items-center">
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
            <?php endif; endfor; ?>
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
                        <div class="icone-white">
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
        <div class="swiper-navigation">
            <div class="swiper-pagination swiper-pagination-collaboration"></div>
        </div>
        <div class="swiper swiperCollaboration">
            <div class="swiper-wrapper">
                <?php for ($i = 1; $i < 4; $i++) {
                    $collaboration = $collaboration_expertise_accompagnement['slide_' . $i]
                        ?>
                    <div class="section-white swiper-slide card-collaboration">
                        <div class=" flex flex-wrap sm:flex-nowrap sm:gap-8">
                            <div class="icone-beige">
                                <?php
                                $icon_path = get_attached_file($collaboration['icone']);
                                // Vérifie si le fichier existe et l'affiche
                                if (file_exists($icon_path)) {
                                    echo file_get_contents($icon_path);
                                }
                                ?>
                            </div>
                            <div>
                                <h4>
                                    <?= $collaboration['titre']; ?>
                                </h4>
                                <span class="offre">
                                    <?= $collaboration['offre']; ?>
                                </span>
                                <?= $collaboration['description']; ?>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
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
                <div class="card-ro-accueil sm:gap-8 flex w-full section-beige flex-wrap sm:flex-nowrap">
                    <div class="icone-white">
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
                        <div class="mt-4">
                            <a href="<?= $ressource['fichier']['url'] ?>" class="more">
                                Téléchargez</a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </section>
    <!-- END RESSOURCES -->
</main>
<?php get_footer(); ?>