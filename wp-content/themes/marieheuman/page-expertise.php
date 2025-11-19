<?php
/**
 * Template Name: Expertise
 */
get_header();
?>
<main class="ml-20">
    <!-- HEADER -->
    <section class="header-content">
        <?php
        $header_expertise_accompagnement = get_field("header_expertise_accompagnement");
        ?>
        <?= $header_expertise_accompagnement['titre'] ?>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap">
            <a href="<?= esc_url($header_expertise_accompagnement['lien_1']['url']) ?>"
                class="orange-button"><?= esc_html($header_expertise_accompagnement['lien_1']['title']) ?>
            </a>
            <a href="<?= esc_url($header_expertise_accompagnement['lien_2']['url']) ?>"
                class="border-orange-button"><?= esc_html($header_expertise_accompagnement['lien_2']['title']) ?>
            </a>
        </div>
    </section>
    <!-- END HEADER -->

    <!-- ACCOMPAGNEMENTS -->
    <section class="accompagnements">
        <?php
        $cinq_champs_expertise_accompagnement = get_field("cinq_champs_expertise_accompagnement");
        ?>
        <span class="tag-page"><?= $cinq_champs_expertise_accompagnement['tag'] ?></span>
        <div class="titre-description">
            <?= $cinq_champs_expertise_accompagnement['titre_&_description'] ?>
        </div>
        <?php
        for ($i = 1; $i < 6; $i++) {
            $champ = $cinq_champs_expertise_accompagnement['champ_' . $i . '_accompagnement'];
            // $champ = $cinq_champs_expertise_accompagnement['champ_2_accompagnement'];
            if ($champ) {
                ?>
                <div class="flex gap-8 accompagnement flex-wrap lg:flex-nowrap">
                    <!-- <?= var_dump($champ) ?> -->
                    <div class="lg:w-5/12 left-accompagnement">
                        <span class="index"><?= $i ?></span>
                        <img src="<?= esc_url($champ['image']['url']) ?>" alt="">
                    </div>
                    <div class="lg:w-fit py-8 right-accompagnement">
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
    <section class="engagements">
        <?php
        $engagements_methode_expertise_accompagnement = get_field('engagements_methode_expertise_accompagnement')
            ?>
        <span class="tag-page"><?= $engagements_methode_expertise_accompagnement['tag'] ?></span>
        <div class="titre-description"><?= $engagements_methode_expertise_accompagnement['titre'] ?></div>
        <div class="grid lg:grid-cols-2 gap-24">
            <?php
            for ($i = 1; $i < 5; $i++) {
                // $engagement = $engagements_methode_expertise_accompagnement['engagement_2'];
                $engagement = $engagements_methode_expertise_accompagnement['engagement_' . $i];
                if ($engagement['titre_description']) {
                    ?>
                    <div class="card-engagement">
                        <span class="dashicons <?= $engagement['icone']; ?>"></span>
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
    <section class="collaboration">
        <?php
        $collaboration_expertise_accompagnement = get_field("collaboration_expertise_accompagnement");
        ?>
        <span class="tag-page"><?= $collaboration_expertise_accompagnement["tag"] ?></span>
        <?= $collaboration_expertise_accompagnement["titre_description"] ?>
        <div class="flex gap-16 justify-center">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <button class="selector-slide<?= $i == 1 ? ' active-border-marron-button' : '' ?>"><?= $i ?></button>
            <?php } ?>
        </div>
        <?php for ($i = 1; $i < 4; $i++) {
            $collaboration = $collaboration_expertise_accompagnement['slide_' . $i]
                ?>
            <div id="card-collaboration-<?= $i ?>" class="card-collaboration<?= $i == 1 ? ' active-collaboration' : '' ?>">
                <div class="flex gap-8">
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
    <section class="ressources">
        <?php
        $ressources_expertise_accompagnement = get_field("ressources_expertise_accompagnement");
        ?>
        <span class="tag-page"><?= $ressources_expertise_accompagnement['tag'] ?></span>
        <?= $ressources_expertise_accompagnement['titre'] ?>
        <div class="grid lg:grid-cols-2 gap-24">
            <?php
            for ($i = 1; $i < 3; $i++) {
                $ressource = $ressources_expertise_accompagnement['ressource_' . $i];
                ?>
                <div class="card-ressource">
                    <div class="flex gap-8">
                        <span class="dashicons <?= $ressource['icone']; ?>"></span>
                        <div>
                            <h4><?= $ressource['fichier']['title'] ?></h4>
                            <p><?= $ressource['fichier']['description'] ?></p>
                            <a href="<?= $ressource['fichier']['url'] ?>" target="_blank">Téléchargez ⮕</a>
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