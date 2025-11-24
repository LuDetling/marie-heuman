<?php
/* Template Name: Artcicle Blog */
get_header();
?>
<main class="ml-20 flex gap-12 pb-20">
    <!-- HEADER -->
    <section class="left-content lg:w-4/5">
        <div class="header-content-blog">
            <?php
            $content = get_field('contenu_page_blog');
            ?>
            <h1><?= the_title() ?></h1>
            <p class="blog-meta">
                <span class="date">
                    <?= get_the_date('F o'); ?> •
                    <?= $content['temps_de_lecture'] ?> de lecture
                </span>
            </p>
            <div class="description">
                <?= $content['description'] ?>
            </div>
            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
        </div>
        <!-- END HEADER -->
        <div class="content">
            <?= $content['contenu'] ?>
        </div>
    </section>
    <aside class="right-content lg:w-1/5">
        <h2>Histoires d'inrérieurs</h2>
    </aside>
</main>
<?php
get_footer();
?>