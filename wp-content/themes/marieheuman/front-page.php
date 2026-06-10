<?php get_header(); ?>

<main class="md:ml-20 front-page">
    <?php
    $accueil_header = get_field('accueil_header');
    ?>
    <section class="home-header">
        <div class="content-home-header">
            <?= $accueil_header['content'] ?>
            <div class="flex gap-6 items-center justify-center flex-wrap">
                <a href="<?= $accueil_header['lien_1']['url'] ?>"
                    class="marron-button"><?= $accueil_header['lien_1']['title'] ?></a>
                <a href="<?= $accueil_header['lien_2']['url'] ?>"
                    class="secondary-button"><?= $accueil_header['lien_2']['title'] ?></a>
            </div>
        </div>
    </section>
    <div class="infinity-bar">
        <!-- <div class="content-infinity-bar"> -->
        <?= $accueil_header['infinity_bar'] ?>
        <?= $accueil_header['infinity_bar'] ?>
        <!-- </div> -->
    </div>

    <section class="home-section section-floral">
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
        <div class="grid grid-cols-3 gap-6">
            <?php
            foreach ($cards as $card): ?>
                <div class="card-enjeux p-10">
                    <span class="key"><?= $card['key'] ?></span>
                    <?= $card['content'] ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>