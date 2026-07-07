<?php
/* Template Name: Page Approche */
get_header();
?>

<section class="header-content">
    <?php
    $header = get_field("header_content");
    ?>
    <div class="container-header">
        <?= $header['titre'] ?>
    </div>
</section>

<main id="professionnel">
    <section class="section-marron enjeux">
        <?php $professionnel_enjeux = get_field("professionnel_enjeux"); ?>
        <div class="tag-home"><?= $professionnel_enjeux['tag'] ?></div>
        <div class="content"><?= $professionnel_enjeux['content'] ?></div>
        <div class="grid lg:grid-cols-3 gap-0">
            <?php $liste = $professionnel_enjeux['liste'];
            $index = 1;
            ?>
            <?php foreach ($liste as $item): ?>
                <div class="grid-item p-10 lg:border-r last:border-r-0">
                    <div class="index mb-5"><?= str_pad($index, 2, "0", STR_PAD_LEFT) ?></div>
                    <?= $item['content'] ?>
                </div>
                <?php $index++; endforeach; ?>
        </div>
    </section>

    <section class="section-floral lieux">
        <?php $lieux = get_field('professionnel_lieux'); ?>
        <div class="grid xl:grid-cols-12 gap-12 mb-14">
            <div class="col-span-4">
                <div class="tag-home"><?= $lieux['tag'] ?></div>
                <div class="content"><?= $lieux['content'] ?></div>
            </div>
            <div class="col-span-8">
                <div class="grid lg:grid-cols-3 gap-0">
                    <?php $cards = $lieux['cards'];
                    foreach ($cards as $card): ?>
                        <div class="card lg:border-r last:border-r-0">
                            <img src="<?= $card['image']['url'] ?>" alt="<?= $card['image']['alt'] ?>">
                            <div class="p-6">
                                <?= $card['content'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-between items-end bottom-lieux pt-10 gap-8">
            <div class="content">
                <?= $lieux['content_2'] ?>
            </div>
            <a href="<?= $lieux['lien']['url'] ?>" class="secondary-button"><?= $lieux['lien']['title'] ?></a>
        </div>
    </section>

    <section class="section-floral offre">
        <?php $offre = get_field('professionnel_offre') ?>
        <div class="top-offre">
            <div class="tag-home"><?= $offre['tag'] ?></div>
            <div class="content">
                <?= $offre['content'] ?>
            </div>
        </div>
        <div class="section-blue">
            <?php $temps_01 = $offre['temps_01'] ?>
            <div class="tag-home"><?= $temps_01['tag'] ?></div>
            <div class="content"><?= $temps_01['content'] ?></div>
            <div class="grid grid-cols-12 gap-12">
                <div class="col-span-7">
                    <div class="description">
                        <?= $temps_01['description'] ?>
                    </div>
                </div>
                <div class="col-span-5">
                    <?php $card = $temps_01['card'] ?>
                    <div class="card p-10 sticky top-8">
                        <div class="tag"><?= $card['tag'] ?></div>
                        <div class="content"><?= $card['content'] ?></div>
                        <a href="<?= $card['lien']['url'] ?>"
                            class="button white-rose-button"><?= $card['lien']['title'] ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-floral">
            <?php $temps_02 = $offre['temps_02'] ?>
            <div class="grid grid-cols-12 gap-12">
                <div class="col-span-5 col-start-8">
                    <div class="tag-home"><?= $temps_02['tag'] ?></div>
                    <div class="content"><?= $temps_02['content'] ?></div>
                </div>
                <div class="xl:col-span-7 xl:col-start-1 xl:row-start-1 space-y-0 accordions">
                    <?php $accordions = $temps_02['accordions'];
                    $i = 1;

                    foreach ($accordions as $accordion):
                        $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                        ?>
                        <div class="flex items-start gap-6 py-8 accordion-content">
                            <div class="hidden md:block circle"></div>
                            <details class="collapse" name="accordion-methode-home">
                                <summary class="collapse-title mb-2">
                                    <span class="index">
                                        <?= $numero ?>
                                    </span>
                                    <div class="title">
                                        <?= $accordion['titre'] ?>
                                    </div>
                                </summary>
                                <div class="collapse-content mt-4">
                                    <div class="mt-6 grid grid-cols-2 gap-8">
                                        <?php $listes = $accordion['listes'];
                                        foreach ($listes as $liste): ?>
                                            <div><?= $liste['content'] ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </details>
                        </div>
                        <?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>