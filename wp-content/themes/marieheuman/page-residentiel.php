<?php
/* Template Name: Page Residentiel */
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
            <div class="xl:col-span-4">
                <div class="tag-home"><?= $lieux['tag'] ?></div>
                <div class="content"><?= $lieux['content'] ?></div>
            </div>
            <div class="xl:col-span-8">
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
        <section class="section-blue temps1">
            <?php $temps1 = $offre['temps_01'] ?>
            <div class="tag-home"><?= $temps1['tag'] ?></div>
            <div class="content"><?= $temps1['content'] ?></div>
            <div class="grid xl:grid-cols-12 gap-12">
                <div class="xl:col-span-7">
                    <div class="description">
                        <?= $temps1['description'] ?>
                    </div>
                </div>
                <div class="xl:col-span-5">
                    <?php $card = $temps1['card'] ?>
                    <div class="card p-10 sticky top-8">
                        <div class="tag"><?= $card['tag'] ?></div>
                        <div class="content"><?= $card['content'] ?></div>
                        <a href="<?= $card['lien']['url'] ?>"
                            class="button white-rose-button"><?= $card['lien']['title'] ?></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-floral temps2">
            <?php $temps2 = $offre['temps_02'] ?>
            <div class="grid xl:grid-cols-12 gap-12">
                <div class="xl:col-span-5 xl:col-start-8">
                    <div class="tag-home"><?= $temps2['tag'] ?></div>
                    <div class="content"><?= $temps2['content'] ?></div>
                </div>
                <div class="xl:col-span-7 xl:col-start-1 xl:row-start-1 space-y-0 accordions">
                    <?php $accordions = $temps2['accordions'];
                    $i = 1;

                    foreach ($accordions as $accordion):
                        $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                        if (!empty($accordion['titre'])): ?>
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
                                        <div class="mt-6 grid lg:grid-cols-2 gap-8">
                                            <?php $listes = $accordion['listes'];
                                            foreach ($listes as $liste): ?>
                                                <div><?= $liste['content'] ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </details>
                            </div>
                            <?php $i++; endif; endforeach; ?>
                </div>
            </div>
        </section>
        <section class="section-blue temps3">
            <?php $temps3 = $offre['temps_03'] ?>
            <div class="grid xl:grid-cols-12 gap-12">
                <div class="xl:col-span-5">
                    <div class="tag-home">
                        <?= $temps3['tag'] ?>
                    </div>
                    <div class="content">
                        <?= $temps3['content'] ?>
                    </div>
                    <div class="mt-14">
                        <a href="<?= $temps3['lien']['url'] ?>"
                            class="secondary-button"><?= $temps3['lien']['title'] ?></a>
                    </div>
                </div>
                <div class="xl:col-span-7 accordions">
                    <?php $accordions = $temps3['accordions'];
                    $i = 1;

                    foreach ($accordions as $accordion):
                        $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                        if (!empty($accordion['titre'])): ?>
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
                                        <?= $accordion['content'] ?>
                                    </div>
                                </details>
                            </div>
                            <?php $i++; endif; endforeach; ?>
                </div>
            </div>
        </section>
    </section>

    <section class="section-floral questions">
        <?php $questions = get_field('professionnel_questions'); ?>
        <div class="max-w-[900px] mx-auto">
            <div class="tag-home"><?= $questions['tag'] ?></div>
            <div class="content"><?= $questions['content'] ?></div>
        </div>
        <div class="accordions max-w-[800px] mx-auto">
            <?php $accordions = $questions['accordions'];
            foreach ($accordions as $accordion):
                if (!empty($accordion['titre'])): ?>
                    <div class="flex items-start gap-6 py-8 accordion-content">
                        <div class="hidden md:block circle"></div>
                        <details class="collapse" name="accordion-methode-home">
                            <summary class="collapse-title mb-2">
                                <h3 class="title">
                                    <?= $accordion['titre'] ?>
                                </h3>
                            </summary>
                            <div class="collapse-content mt-4">
                                <?= $accordion['content'] ?>
                            </div>
                        </details>
                    </div>
                <?php endif; endforeach; ?>
        </div>
    </section>
    <section class="section-floral projet">
        <?php $projet = get_field('parlons_projet'); ?>
        <div class="section-cadriage-desert max-w-[720px] mx-auto">
            <div class="tag-home">
                <?= $projet['tag'] ?>
            </div>
            <div class="content">
                <?= $projet['content'] ?>
            </div>
            <div class="flex items-center justify-center gap-6 flex-wrap">
                <a href="<?= $projet['lien_1']['url'] ?>" class="button marron-button">
                    <?= $projet['lien_1']['title'] ?>
                </a>
                <a href="<?= $projet['lien_2']['url'] ?>" class="secondary-button">
                    <?= $projet['lien_2']['title'] ?>
                </a>
            </div>
        </div>
        <div class="cadriage"></div>
    </section>
</main>


<?php get_footer(); ?>