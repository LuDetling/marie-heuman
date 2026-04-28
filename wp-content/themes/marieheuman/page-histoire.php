<?php
/* Template Name: Page Histoire */
get_header();
?>
<main class="md:ml-20" id="histoire">
    <section class="header-content section-white">
        <?php
        $header = get_field("header_content");
        ?>
        <div class="titre">
            <?= $header['titre'] ?>
        </div>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center mt-8">
            <a href="<?= $header['lien_1']['url'] ?>" target="<?= $header['lien_1']['target'] ?>"
                class="orange-button"><?= $header['lien_1']['title'] ?></a>
            <a href="<?= $header['lien_2']['url'] ?>" target="<?= $header['lien_2']['target'] ?>"
                class="second-link-orange"><?= $header['lien_2']['title'] ?></a>
        </div>
    </section>
    <div class="img-under-header"></div>
    <section class="perso section-beige">
        <?php
        $perso = get_field("page_histoire")['perso']
            ?>
        <span class="tag-home"><?= $perso['tag'] ?></span>
        <h2>
            <?= $perso['titre'] ?>
        </h2>
        <div class="flex gap-10 md:gap-20 flex-wrap lg:flex-nowrap mt-8">
            <div class=" lg:w-5/10 mx-auto perso-card">
                <?php if (!empty($perso['gauche']['image'])): ?>
                    <img src="<?= $perso['gauche']['image']['url'] ?>" alt="<?= $perso['gauche']['image']['alt'] ?>"
                        class="w-full" />
                    <h3><?= $perso['gauche']['nom'] ?></h3>
                    <span class="block"><?= $perso['gauche']['role'] ?></span>
                    <?= $perso['gauche']['text'] ?>
                <?php endif; ?>
            </div>
            <div class=" lg:w-5/10 mx-auto perso-card">
                <?php if (!empty($perso['droite']['image'])): ?>
                    <img src="<?= $perso['droite']['image']['url'] ?>" alt="<?= $perso['droite']['image']['alt'] ?>"
                        class="w-full" />
                    <h3><?= $perso['droite']['nom'] ?></h3>
                    <span class="block"><?= $perso['droite']['role'] ?></span>
                    <?= $perso['droite']['text'] ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="philosophie section-white">
        <?php
        $philosophie = get_field("page_histoire")['philosophie']
            ?>
        <span class="tag-home"><?= $philosophie['tag'] ?></span>
        <h2>
            <?= $philosophie['titre'] ?>
        </h2>
        <div class="flex gap-10 md:gap-20 flex-wrap lg:flex-nowrap mt-8">
            <div class="texte lg:w-6/10 lg:order-1 order-2">
                <?= $philosophie['description'] ?>
                <a href="<?= $philosophie['lien']['url'] ?>" class="more"><?= $philosophie['lien']['title'] ?></a>
            </div>
            <div class="mx-auto lg:w-4/10 lg:order-2 order-1">
                <img src="<?= $philosophie['image']['url'] ?>" alt="<?= $philosophie['image']['alt'] ?>" />
            </div>
        </div>
    </section>
    <section class="univers section-beige">
        <?php
        $univers = get_field("page_histoire")['univers']
            ?>
        <span class="tag-home"><?= $univers['tag'] ?></span>
        <?= $univers['titre'] ?>
        <div class="swiper-navigation">
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper universSwiper">
            <div class="swiper-wrapper">
                <?php
                for ($i = 1; $i <= 6; $i++):
                    $bloc = $univers['bloc_' . $i];
                    ?>
                    <div class="swiper-slide section-white">
                        <div class="dashicons">
                            <?php
                            $icon_path = get_attached_file($bloc['icone']);
                            // Vérifie si le fichier existe et l'affiche
                            if (file_exists($icon_path)) {
                                echo file_get_contents($icon_path);
                            }
                            ?>
                        </div>
                        <h4><?= $bloc['titre'] ?></h4>
                        <div class="texte"><?= $bloc['description'] ?></div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

    </section>
    <section class="contrib section-white">
        <div class="content-contrib">

            <?php
            $contrib = get_field("page_histoire")['contrib']
                ?>
            <h2>
                <?= $contrib['titre'] ?>
            </h2>
            <div class="description">
                <?= $contrib['description'] ?>
            </div>
        </div>
    </section>
    <section class="accompagnement">
        <?php $accompagnement = get_field("page_histoire")['accompagnement'] ?>
        <?= $accompagnement['titre_description'] ?>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center mt-8">
            <a href="<?= $accompagnement['lien_1']['url'] ?>" target="<?= $accompagnement['lien_1']['target'] ?>"
                class="orange-button"><?= $accompagnement['lien_1']['title'] ?></a>
            <a href="<?= $accompagnement['lien_2']['url'] ?>" target="<?= $accompagnement['lien_2']['target'] ?>"
                class="second-link"><?= $accompagnement['lien_2']['title'] ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>