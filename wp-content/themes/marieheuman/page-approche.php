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
<section class="convictions section-desert">
    <?php
    $convictions = get_field('approche_convictions');
    ?>
    <div class="grid xl:grid-cols-12 gap-12 items-center">
        <div class=" xl:col-span-5">
            <img src="<?= $convictions['image']['url'] ?>" alt="<?= $convictions['image']['alt'] ?>">
        </div>
        <div class="xl:col-span-7">
            <div class="tag-home"><?= $convictions['tag'] ?></div>
            <div class="content"><?= $convictions['content'] ?></div>
        </div>
    </div>
</section>

<section class="parti-pris section-floral">
    <?php
    $partiPris = get_field('approche_parti-pris');
    ?>
    <div class="grid xl:grid-cols-12 gap-12">
        <div class="xl:col-span-5 xl:col-start-8 right-content">
            <div class="tag-home"><?= $partiPris['tag'] ?></div>
            <div class="content">
                <?= $partiPris['content'] ?>
            </div>
        </div>
        <div class="xl:col-span-7 xl:col-start-1 xl:row-start-1 space-y-0 accordions">
            <?php $accordions = $partiPris['accordions'];
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
                        <div class="collapse-content mt-4"><?= $accordion['content'] ?></div>
                    </details>
                </div>
                <?php $i++; endforeach; ?>
        </div>
    </div>
</section>

<section class="section-cadriage-page vision">
    <?php $vision = get_field('approche_vision'); ?>
    <div class="tag-home"><?= $vision['tag'] ?></div>
    <div class="content"><?= $vision['content'] ?></div>
    <div class="cards flex flex-wrap gap-6 justify-center">
        <?php
        $cards = $vision['cards'];
        $i = 1;

        foreach ($cards as $card):
            $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
            ?>
            <div class="card p-8 border lg:w-[calc(50%-1.5rem)] xl:w-[calc(33.333%-1rem)]">
                <div class="index"><?= $numero ?></div>
                <div class="content-card">
                    <?= $card['content'] ?>
                </div>
            </div>
            <?php $i++; endforeach; ?>
    </div>
</section>

<section class="section-floral demarche">
    <?php $demarche = get_field('approche_demarche'); ?>
    <div class="grid xl:grid-cols-12 gap-12 mb-16">
        <div class="xl:col-span-5">
            <div class="tag-home"><?= $demarche['tag'] ?></div>
            <div class="content"><?= $demarche['content'] ?></div>
        </div>
        <div class="xl:col-span-7 space-y-0">
            <?php
            $liste = $demarche['liste'];
            $i = 1;

            foreach ($liste as $item):
                $numero = str_pad($i, 2, "0", STR_PAD_LEFT);
                ?>
                <div class="flex gap-6 item">
                    <div class="index"><?= $numero ?></div>
                    <div class="content-item">
                        <h3><?= $item['titre'] ?></h3>
                        <?= $item['content'] ?>
                    </div>
                </div>

                <?php $i++; endforeach; ?>
        </div>
    </div>
    <div class="grid lg:grid-cols-2 gap-6 mt-20">
        <img src="<?= $demarche['image_0']['url'] ?>" alt="<?= $demarche['image_0']['alt'] ?>" class="w-full">
        <img src="<?= $demarche['image_1']['url'] ?>" alt="<?= $demarche['image_1']['alt'] ?>" class="w-full">
    </div>
</section>

<section class="section-blue studio">
    <?php $studio = get_field('approche_studio'); ?>
    <div class="grid xl:grid-cols-12 gap-12 items-center">
        <div class="xl:col-span-5 h-full">
            <img src="<?= $studio['image']['url'] ?>" alt="<?= $studio['image']['alt'] ?>" class="h-full">
        </div>
        <div class="xl:col-span-7 py-4">
            <div class="tag-home"><?= $studio['tag'] ?></div>
            <div class="content"><?= $studio['content'] ?></div>
        </div>
    </div>
</section>

<section class="section-floral questions">
    <?php $questions = get_field('approche_questions'); ?>
    <div class="container-questions">

        <div class="tag-home">
            <?= $questions['tag'] ?>
        </div>
        <div class="content">
            <?= $questions['content'] ?>
        </div>
        <div class="accordions">
            <?php $accordions = $questions['accordions'];
            foreach ($accordions as $accordion):
                ?>
                <div class="flex items-start gap-6 py-8 accordion-content">
                    <div class="hidden md:block circle"></div>
                    <details class="collapse" name="accordion-methode-home">
                        <summary class="collapse-title mb-2">
                            <div class="title">
                                <?= $accordion['titre'] ?>
                            </div>
                        </summary>
                        <div class="collapse-content mt-4">
                            <?= $accordion['content'] ?>
                        </div>
                    </details>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-floral projet">
    <?php $projet = get_field('approche_projet'); ?>
    <div class="section-cadriage-desert max-w-[720px] mx-auto">
        <div class="tag-home"><?= $projet['tag'] ?></div>
        <div class="content"><?= $projet['content'] ?></div>
        <div class="flex items-center justify-center gap-6 flex-wrap">
            <a href="<?= $projet['lien_0']['url'] ?>" class="button marron-button"><?= $projet['lien_0']['title'] ?></a>
            <a href="<?= $projet['lien_1']['url'] ?>" class="secondary-button"><?= $projet['lien_1']['title'] ?></a>
        </div>
    </div>
    <div class="cadriage"></div>
</section>

<?php get_footer(); ?>