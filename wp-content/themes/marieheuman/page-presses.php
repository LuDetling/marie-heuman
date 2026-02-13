<?php
/* Template Name: Page Presses */
get_header();

function transformer_en_swiper_slides($content)
{
    if (empty($content))
        return $content;

    // On cherche les images (dans des <p> ou seules)
    $pattern = '/<p[^>]*>\s*(<a[^>]*>)?\s*(<img[^>]*>)\s*(<\/a>)?\s*<\/p>|(<img[^>]*>)/i';

    return preg_replace_callback($pattern, function ($matches) {
        $image_html = !empty($matches[4]) ? $matches[4] : $matches[1] . $matches[2] . $matches[3];
        return '<div class="swiper-slide">' . $image_html . '</div>';
    }, $content);
}
?>
<main class="md:ml-20">
    <!-- HEADER -->
    <section class="header-content section-white">
        <?php
        $header = get_field("header_content");
        ?>
        <?= $header['titre'] ?>
        <div class="flex gap-8 flex-wrap lg:flex-nowrap items-center mt-16">
            <a href="<?= $header['lien_1']['url'] ?>" target="<?= $header['lien_1']['target'] ?>"
                class="orange-button"><?= $header['lien_1']['title'] ?></a>
            <a href="<?= $header['lien_2']['url'] ?>" target="<?= $header['lien_2']['target'] ?>"
                class="second-link-orange"><?= $header['lien_2']['title'] ?></a>
        </div>
    </section>
    <div class="img-under-header"></div>
    <!-- END HEADER -->
    <section class="section-beige">
        <div class="grid 2xl:grid-cols-3 md:grid-cols-2 gap-10 lg:gap-20">
            <?php $presses = new WP_Query([
                'post_type' => 'presse',
                'posts_per_page' => -1,
            ]);
            if ($presses->have_posts()):
                $index = 0;
                while ($presses->have_posts()):
                    $presses->the_post();
                    $presse = get_field('presse');
                    ?>
                    <div class="card-presse w-full">
                        <div class="img">
                            <img src="<?= $presse['image']['url'] ?>" alt="<?= $presse['image']['alt'] ?>">
                        </div>
                        <div class="on-card section-white">
                            <h2><?= the_title() ?></h2>
                            <div class="date">
                                <?= $presse['date'] ?>
                            </div>
                            <?php if ($presse['fichier']) { ?>
                                <a href="<?= $presse['fichier']['url'] ?>" target="_blank" class="second-link-secondary">Découvrez
                                    l'article</a>
                            <?php } else { ?>
                                <button class="show-images second-link-secondary cursor-pointer">Découvrez
                                    l'article</button>
                            <?php }
                            if ($presse['lien_externe']): ?>
                                <a href="<?= $presse['lien_externe']['url'] ?>" target="<?= $presse['lien_externe']['target'] ?>"
                                    class="second-link-orange mt-4">Lire l'article en ligne</a>
                            <?php endif; ?>


                        </div>
                    </div>
                    <dialog id="my_modal_<?= $index ?>" class="modal">
                        <div class="modal-box section-white">
                            <form method="dialog">
                                <button class="">✕</button>
                            </form>
                            <div class="swiper swiperPresses-<?= $index ?>">
                                <?= transformer_en_swiper_slides($presse['images']) ?>
                            </div>
                            <div class="flex gap-8 swiper-navigation justify-center items-center">
                                <div class="swiper-button-prev swiper-button-prev-presses-<?= $index ?>"></div>
                                <div class="swiper-pagination swiper-pagination-presses-<?= $index ?>"></div>
                                <div class="swiper-button-next swiper-button-next-presses-<?= $index ?>"></div>
                            </div>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>