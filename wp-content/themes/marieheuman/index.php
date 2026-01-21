<?php get_header(); ?>
<main class="md:ml-20">
    <?php $header = get_field('header_content'); ?>
    <section class="header-content section-white <?= $header['lien_1'] ? ' ' : 'header-content-without-link'?>">
        <?= $header['titre'] ?>
    </section>
    <div class="img-under-header"></div>


    <?php $contenu = get_field('page_contenu'); ?>
    <section class="section-beige content">
        <?= $contenu['contenu'] ?>
    </section>
</main>
<?php get_footer(); ?>