<?php
/* Template Name: Artcicle Blog */
get_header();
?>
<main class="sm:ml-20 flex gap-12 pb-20 flex-wrap lg:flex-nowrap items-start">
    <!-- HEADER -->
    <section class="left-content lg:w-6/8">
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
    <aside class="sidebar lg:w-2/8">
        <?php
        $sidebar = get_field("sidebar_page_blog");
        ?>
        <h2>Histoires d'interieurs</h2>
        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <label for="s"> Recherchez un sujet, un mot-clé ou une inspiration parmi les
                articles du blog.
            </label>
            <div class="flex gap-2 items-center">
                <input id="s" type="search" class="search-field" placeholder="Rechercher"
                    value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
                <button type="submit" class="search-submit">

                </button>
            </div>
        </form>
        <!-- INFORMATIONS -->
        <?php if (!empty($sidebar['informations'])): ?>
            <div class="informations">
                <h3>
                    <?= $sidebar['informations']['titre'] ?>
                </h3>
                <img src="<?= $sidebar['informations']['image']['url'] ?>"
                    alt="<?= $sidebar['informations']['image']['alt'] ?>">
                <?= $sidebar['informations']['description'] ?>
            </div>
        <?php endif; ?>

        <!-- END INFORMATIONS -->

        <!-- HISTOIRE -->
        <?php if (!empty($sidebar['histoire'])): ?>
            <div class="histoire">
                <h3>
                    <?= $sidebar['histoire']['titre'] ?>
                </h3>
                <a href="<?= $sidebar['histoire']['lien']['url'] ?>"
                    class="more"><?= $sidebar['histoire']['lien']['title'] ?></a>
            </div>
        <?php endif; ?>

        <!-- END HISTOIRE -->

        <!-- ACCOMPAGNEMENTS -->
        <?php if (!empty($sidebar['accompagnements'])): ?>
            <div class="accompagnements">
                <h3>
                    <?= $sidebar['accompagnements']['titre'] ?>
                </h3>
                <?= $sidebar['accompagnements']['description'] ?>
                <a href="<?= $sidebar['accompagnements']['lien']['url'] ?>"
                    class="more"><?= $sidebar['accompagnements']['lien']['title'] ?></a>
            </div>
        <?php endif; ?>

        <!-- END ACCOMPAGNEMENTS -->

        <!-- RESERVATION -->
        <?php if (!empty($sidebar['reservation'])): ?>
            <div class="reservation">
                <h3>
                    <?= $sidebar['reservation']['titre'] ?>
                </h3>
                <?= $sidebar['reservation']['description'] ?>
                <a href="<?= $sidebar['reservation']['lien']['url'] ?>"
                    class="more"><?= $sidebar['reservation']['lien']['title'] ?></a>
            </div>
        <?php endif; ?>

        <!-- END RESERVATION -->

        <!-- GUIDES -->
        <?php if (!empty($sidebar['guides'])): ?>
            <div class="guides">
                <h3>
                    <?= $sidebar['guides']['titre'] ?>
                </h3>
                <a href="<?= $sidebar['guides']['lien']['url'] ?>"
                    class="more"><?= $sidebar['guides']['lien']['title'] ?></a>
            </div>
        <?php endif; ?>
        <!-- END GUIDES -->
    </aside>
</main>
<?php
get_footer();
?>