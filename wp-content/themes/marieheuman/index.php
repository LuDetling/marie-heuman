<?php get_header(); ?>
<main class="page-index">
    <?php $header = get_field('header_content'); ?>
    <section class="header-content section-floral <?= $header['lien_1'] ? ' ' : 'header-content-without-link' ?>">
        <div class="container-header">
            <?= $header['titre'] ?>
        </div>
    </section>

    <?php $contenu = get_field('page_contenu'); ?>
    <section class="content">
        <?= $contenu['contenu'] ?>
    </section>
</main>
<?php get_footer(); ?>