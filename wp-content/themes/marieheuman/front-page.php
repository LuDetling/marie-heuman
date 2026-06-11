<?php get_header(); ?>

<main class="">
    <?php
    $accueil_header = get_field('accueil_header');
    ?>
    <section class="home-header">
        <div class="content-home-header">
            <?= $accueil_header['content'] ?>
            <div class="flex gap-6 items-center justify-center flex-wrap">
                <a href="<?= $accueil_header['lien_1']['url'] ?>"
                    class="button marron-button"><?= $accueil_header['lien_1']['title'] ?></a>
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
</main>

<?php get_footer(); ?>