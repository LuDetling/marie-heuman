<?php
/* Template Name: Page Professionnel */
get_header();
?>

<section class="header-content">
    <?php
    $header = get_field("header_content");
    ?>
    <div class="container-header">
        <?= $header['titre'] ?>
    </div>
    <img src="<?= get_template_directory_uri() ?>/assets/images/trèfle-marie-heuman-marron.png" alt="fleur décorative"
        class="absolute z-0 opacity-10">
</section>

<main id="professionnel">
    <section class="section-blue enjeux">
        <?php $professionnel_enjeux = get_field("professionnel_enjeux"); ?>
        <div class="tag-home"><?= $professionnel_enjeux['tag'] ?></div>
        <div class="content"><?= $professionnel_enjeux['content'] ?></div>
        <div class="grid lg:grid-cols-3 gap-20">
            <?php $liste = $professionnel_enjeux['liste'];
            $index = 1;
            ?>
            <?php foreach ($liste as $item): ?>
                <div class="grid-item ">
                    <?= $item['content'] ?>
                </div>
                <?php $index++; endforeach; ?>
        </div>
    </section>

    <section class="section-floral lieux">
        <?php $lieux = get_field('professionnel_lieux'); ?>
        <div class="tag-home"><?= $lieux['tag'] ?></div>
        <div class="content"><?= $lieux['content'] ?></div>
        <div class="grid lg:grid-cols-3 gap-20">
            <?php $cards = $lieux['cards'];
            foreach ($cards as $card): ?>
                <div class="card">
                    <img src="<?= $card['image']['url'] ?>" alt="<?= $card['image']['alt'] ?>">
                    <div class="mt-6">
                        <?= $card['content'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex flex-wrap justify-between items-end bottom-lieux pt-10 gap-8">
            <div class="content">
                <?= $lieux['content_2'] ?>
            </div>
            <a href="<?= $lieux['lien']['url'] ?>" class="secondary-button"><?= $lieux['lien']['title'] ?></a>
        </div>
    </section>
    <section class="section-floral offre">
        <?php
        $offre = get_field('professionnel_offre');
        $temps1 = $offre['temps_01'];
        $temps2 = $offre['temps_02'];
        $temps3 = $offre['temps_03'];
        ?>
        <div class="mx-auto">

            <div class="top-offre">
                <div class="tag-home"><?= $offre['tag'] ?></div>
                <div class="content">
                    <?= $offre['content'] ?>
                </div>
            </div>

            <div id="tabs-offre" class="tabs tabs-lift justify-center tabs-vertical px-10 md:px-20">
                <label class="tab p-3">
                    <input type="radio" name="my_tabs_offre" checked aria-label="offre 1" />
                    <div class="title-tab">
                        <span class="index-tab">01</span>
                        <!-- <?= $temps1['tag'] ?> -->
                    </div>
                </label>
                <div class="tab-content p-10 xl:p-20 temps1">
                    <?= $temps1['content'] ?>
                    <div class="grid xl:grid-cols-12 gap-12 pt-8">
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
                </div>
                <label class="tab p-3">
                    <input type="radio" name="my_tabs_offre" aria-label="offre 2" />
                    <div class="title-tab">
                        <span class="index-tab">02</span>
                        <!-- <?= $temps2['tag'] ?> -->
                    </div>
                </label>
                <div class="tab-content p-10 xl:p-20 temps2">
                    <?= $temps2['title'] ?>
                    <div class="grid xl:grid-cols-12 gap-12">
                        <div class="xl:col-span-5">
                            <div class="content pt-8 content-description">
                                <?= $temps2['content'] ?>
                                <a href="<?= $temps2['lien']['url'] ?>"
                                    class="button white-rose-button mt-8"><?= $temps2['lien']['title'] ?></a>
                            </div>
                        </div>
                        <div class="xl:col-span-7 space-y-0 accordions">
                            <?php $accordions = $temps2['accordions'];
                            $i = 1;

                            foreach ($accordions as $accordion):
                                $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                                if (!empty($accordion['titre'])): ?>
                                    <div class="flex items-start gap-6 py-8 accordion-content">
                                        <details class="collapse" name="accordion-missions">
                                            <summary class="collapse-title mb-2 flex items-start justify-between gap-6">
                                                <div class="title">
                                                    <?= $accordion['titre'] ?>
                                                </div>
                                                <div class="block circle"></div>
                                            </summary>
                                            <div class="collapse-content mt-4">
                                                <div class="mt-6 grid lg:grid-cols-2 gap-8">
                                                    <?php $listes = $accordion['listes'];
                                                    foreach ($listes as $liste): ?>
                                                        <div>
                                                            <?= $liste['content'] ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </details>
                                    </div>
                                    <?php $i++; endif; endforeach; ?>
                        </div>
                    </div>
                </div>
                <label class="tab p-3">
                    <input type="radio" name="my_tabs_offre" aria-label="offre 2" />
                    <div class="title-tab">
                        <span class="index-tab">03</span>
                        <!-- <?= $temps3['tag'] ?> -->
                    </div>
                </label>
                <div class="tab-content p-10 xl:p-20 temps3">
                    <?= $temps3['title'] ?>
                    <div class="grid xl:grid-cols-12 gap-12">
                        <div class="xl:col-span-5 pt-8">
                            <div class="content">
                                <?= $temps3['content'] ?>
                            </div>
                            <div class="mt-14">
                                <a href="<?= $temps3['lien']['url'] ?>" class="secondary-button">
                                    <?= $temps3['lien']['title'] ?>
                                </a>
                            </div>
                        </div>
                        <div class="xl:col-span-7 accordions">
                            <?php $accordions = $temps3['accordions'];
                            $i = 1;

                            foreach ($accordions as $accordion):
                                $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                                if (!empty($accordion['titre'])): ?>
                                    <div class="flex items-start gap-6 py-8 accordion-content">
                                        <details class="collapse" name="accordion-modules">
                                            <summary class="collapse-title mb-2 flex items-start justify-between gap-6">
                                                <div class="md:flex gap-4">
                                                    <div class="title">
                                                        <?= $accordion['titre'] ?>
                                                    </div>
                                                </div>
                                                <div class="block circle"></div>
                                            </summary>
                                            <div class="collapse-content mt-4">
                                                <?= $accordion['content'] ?>
                                            </div>
                                        </details>
                                    </div>
                                    <?php $i++; endif; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="section-floral questions grid xl:grid-cols-12">
        <div class="xl:col-span-6">
            <?php $questions = get_field('professionnel_questions'); ?>
            <div class="max-w-[900px] mx-auto">
                <div class="tag-home"><?= $questions['tag'] ?></div>
                <div class="content"><?= $questions['content'] ?></div>
            </div>
            <div class="accordions accordions-faq max-w-[800px] mx-auto">
                <?php $accordions = $questions['accordions'];
                foreach ($accordions as $accordion):
                    if (!empty($accordion['titre'])): ?>
                        <div class=" py-8 accordion-content">
                            <details class="collapse" name="accordion-questions">
                                <summary class="collapse-title mb-2 flex items-start justify-between gap-6">
                                    <h3 class="title">
                                        <?= $accordion['titre'] ?>
                                    </h3>
                                    <div class="block circle"></div>
                                </summary>
                                <div class="collapse-content mt-4">
                                    <?= $accordion['content'] ?>
                                </div>
                            </details>
                        </div>
                    <?php endif; endforeach; ?>
            </div>
        </div>
        <?php if (!empty($questions['image']['url'])): ?>
            <div class="xl:col-span-5 xl:col-start-8">
                <img src="<?= $questions['image']['url'] ?>" alt="<?= $questions['image']['alt'] ?>"
                    class="xl:w-full object-cover">
            </div>
        <?php endif; ?>
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