<?php
/* Template Name: Page Ressources */
get_header();
?>
<main>
    <!-- HEADER -->
    <section class="header-content">
        <?php
        $header = get_field("header_content");
        ?>
        <div class="container-header">
            <?= $header['titre'] ?>
        </div>
        <img src="<?= get_template_directory_uri() ?>/assets/images/trèfle-marie-heuman-marron.png"
            alt="fleur décorative" class="absolute z-0 opacity-10">
    </section>
    <!-- END HEADER -->


    <section id="guides" class="section-floral">
        <?php if (have_rows('guides')):

            while (have_rows('guides')):
                the_row();

                $image = get_sub_field('image');
                $tag = get_sub_field('tag');
                $pages = get_sub_field('pages');
                $content = get_sub_field('content');
                $lien = get_sub_field('lien');

                ?>
                <div class="grid xl:grid-cols-12 py-15">
                    <?php if ($image): ?>
                        <div class="xl:col-span-5">
                            <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                        </div>
                    <?php endif; ?>
                    <?php if ($tag): ?>
                        <div class="xl:col-span-6 xl:col-start-7 ">
                            <div class="flex flex-wrap gap-4 items-center mb-4">
                                <div class="tag"><?= $tag ?></div>
                                <div class="badge-coperwood pages"><?= $pages ?></div>
                            </div>
                            <div class="content">
                                <?= $content ?>
                            </div>
                            <a href="<?= $lien['url'] ?>" class="button marron-button mt-8"><?= $lien['title'] ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile;

        else:
            echo 'Aucun guide trouvé.';
        endif;
        ?>
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
                <?php if (!empty($projet['lien_1']['title'])): ?>
                    <a href="<?= $projet['lien_1']['url'] ?>" class="button marron-button">
                        <?= $projet['lien_1']['title'] ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($projet['lien_2']['title'])): ?>
                    <a href="<?= $projet['lien_2']['url'] ?>" class="secondary-button">
                        <?= $projet['lien_2']['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="cadriage"></div>
    </section>



</main>
<?php
get_footer();
?>