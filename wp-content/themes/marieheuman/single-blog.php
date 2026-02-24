<?php
/* Template Name: Article Blog */
get_header();
?>
<main class="md:ml-20 pb-10 flex gap-10 md:gap-20 flex-wrap lg:flex-nowrap items-stretch section-white">
    <!-- HEADER -->
    <section class="left-content lg:w-6/8">
        <div class="header-content-blog">
            <?php
            $content = get_field('contenu_page_blog');
            ?>
            <h1><?= the_title() ?></h1>
            <?php if (!empty($content['description'])): ?>
                <div class="description">
                    <?= $content['description'] ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($content['temps_de_lecture'])): ?>
                <div class="blog-meta">
                    <span class="date flex items-center gap-2 flex-wrap">
                        <div class="flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                viewBox="0 0 256 256">
                                <path
                                    d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-68-76a12,12,0,1,1-12-12A12,12,0,0,1,140,132Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,132ZM96,172a12,12,0,1,1-12-12A12,12,0,0,1,96,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,140,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,172Z">
                                </path>
                            </svg>
                            <?= get_the_date('F o'); ?>
                        </div>
                        <div class="flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                viewBox="0 0 256 256">
                                <path
                                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z">
                                </path>
                            </svg>
                            <?= $content['temps_de_lecture'] ?> de lecture
                        </div>

                    </span>
                </div>
            <?php endif; ?>
            <?php if (!empty($content['image'])): ?>
                <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
            <?php endif; ?>
        </div>
        <!-- END HEADER -->
        <?php if (!empty($content['contenu'])): ?>
            <div class="content">
                <?= $content['contenu'] ?>
            </div>
        <?php endif; ?>

        <?php
        $blogs = [
            'post_type' => 'blog',
            'posts_per_page' => 3,
            'post__not_in' => [get_the_ID()]
        ];
        $blog_query = new WP_Query($blogs);
        if ($blog_query->have_posts()): ?>
            <div class="related-articles mt-20">
                <h2>Derniers blogs</h2>
                <div class="swiper swiperSingleBlog">
                    <div class="swiper-wrapper">
                        <?php while ($blog_query->have_posts()):
                            $blog_query->the_post();
                            $content = get_field('contenu_page_blog');
                            ?>
                            <div class="swiper-slide section-beige">
                                <a href="<?= get_permalink() ?>" class="">
                                    <div class="article-image">
                                        <?php if (!empty($content['image'])): ?>
                                            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="article-info">
                                        <h3>
                                            <?= get_the_title() ?>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="flex gap-8 swiper-navigation justify-center items-center">
                    <div class="swiper-button-prev-single-blog swiper-button-prev"></div>
                    <div class="swiper-pagination-single-blog swiper-pagination"></div>
                    <div class="swiper-button-next-single-blog swiper-button-next"></div>
                </div>
            </div>
        <?php endif; ?>
    </section>


    <aside class="sidebar lg:w-2/8 section-beige">
        <?php
        $sidebar = get_field("sidebar_page_blog");
        ?>
        <div>
            <img src="<?= get_template_directory_uri() ?>/assets/images/histoires-interieurs.png"
                alt="logo histoires intérieurs" class="sidebar-decorative-img mb-8">
        </div>
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
        <div class="informations">
            <h3>
                Bonjour, Je suis Marie Heuman
            </h3>
            <img src="<?= get_template_directory_uri() ?>/assets/images/Marie-Heuman.webp" alt="Photo de Marie Heuman">
            <p>Architecte d’intérieur & designer global depuis 2021.</p>
            <p>À travers ce blog, Histoires d’intérieurs, je partage mes conseils, inspirations et réflexions autour de
                l’architecture intérieure et du design.</p>
            <p>C’est aussi un espace plus personnel, où je vous ouvre les coulisses de mon métier, mes découvertes, mes
                doutes parfois, et surtout la passion qui m’anime.</p>
            <p>Ici, on parle autant de technique que de sensibilité, de matières que de vécu, parce qu’un intérieur bien
                pensé, c’est avant tout une rencontre entre esthétique et humanité.</p>
        </div>

        <!-- END INFORMATIONS -->

        <!-- HISTOIRE -->
        <div class="histoire">
            <h3>
                Envie d’en savoir plus sur mon parcours ?
            </h3>
            <a href="mon-histoire-architecte-interieur-tours-blois" class="more">Découvrez mon histoire</a>
        </div>

        <!-- END HISTOIRE -->

        <!-- ACCOMPAGNEMENTS -->
        <div class="accompagnements">
            <h3>
                Découvrez mes accompagnements
            </h3>
            <p>Vous avez un projet d’aménagement, de rénovation ou de création d’identité ?</p>
            <p>Mes accompagnements sont pensés pour s’adapter à votre rythme, vos besoins et votre univers.</p>
            <p>De la première idée à la concrétisation, je vous guide à chaque étape.</p>
            <a href="expertise-accompagnement-architecture-interieure-tours-blois" class="more">Découvrez mes
                services</a>
        </div>

        <!-- END ACCOMPAGNEMENTS -->

        <!-- RESERVATION -->
        <div class="reservation">
            <h3>
                Réservez votre appel découverte offert
            </h3>
            <p>Vous avez un projet en tête, une question ou simplement envie d’échanger ?</p>
            <p>Prenons le temps d’en parler ensemble.</p>
            <p>Cet appel gratuit et sans engagement me permet de comprendre vos besoins, de vous guider sur la bonne
                formule et de poser les premières bases d’un projet réfléchi et serein.</p>
            <a href="contact-architecte-interieur-tours-blois/#custom-booking-app" class="more">Réservez votre
                créneau</a>
        </div>

        <!-- END RESERVATION -->

        <!-- GUIDES -->
        <?php if (!empty($sidebar['guides']['lien'])): ?>
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