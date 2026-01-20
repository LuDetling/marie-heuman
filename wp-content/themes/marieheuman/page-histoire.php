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
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center">
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
            <div class=" lg:w-4/10">
                <img src="<?= $perso['image']['url'] ?>" alt="<?= $perso['image']['alt'] ?>" />
            </div>
            <div class="texte lg:w-6/10">
                <?= $perso['description'] ?>
                <a href="<?= $perso['lien']['url'] ?>" class="more"><?= $perso['lien']['title'] ?></a>

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
            <div class="texte lg:w-6/10">
                <?= $philosophie['description'] ?>
                <a href="<?= $philosophie['lien']['url'] ?>" class="more"><?= $philosophie['lien']['title'] ?></a>
            </div>
            <div class=" lg:w-4/10">
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
                        <span class="dashicons <?= $bloc['icone']; ?>"></span>
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
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center">
            <a href="<?= $accompagnement['lien_1']['url'] ?>" target="<?= $accompagnement['lien_1']['target'] ?>"
                class="orange-button"><?= $accompagnement['lien_1']['title'] ?></a>
            <a href="<?= $accompagnement['lien_2']['url'] ?>" target="<?= $accompagnement['lien_2']['target'] ?>"
                class="second-link"><?= $accompagnement['lien_2']['title'] ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>