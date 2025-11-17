<?php
/**
 * Template Name: Expertise
 */
get_header();
?>
<main class="ml-20">
    <?php
    $header_expertise_accompagnement = get_field("header_expertise_accompagnement");
    ?>
    <section class="header-content">
        <?= $header_expertise_accompagnement['titre'] ?>
        <div class="flex gap-8">
            <a href="<?= esc_url($header_expertise_accompagnement['lien_1']['url']) ?>"
                class="orange-button"><?= esc_html($header_expertise_accompagnement['lien_1']['title']) ?>
            </a>
            <a href="<?= esc_url($header_expertise_accompagnement['lien_2']['url']) ?>"
                class="border-orange-button"><?= esc_html($header_expertise_accompagnement['lien_2']['title']) ?>
            </a>
        </div>
    </section>
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
            // $champ = $cinq_champs_expertise_accompagnement['champ_' . $i . '_accompagnement'];
            $champ = $cinq_champs_expertise_accompagnement['champ_1_accompagnement'];
            ?>
            <div class="flex gap-8 accompagnement">
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
        <?php } ?>
    </section>
</main>
<?php get_footer(); ?>