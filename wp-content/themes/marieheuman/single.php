<?php get_header(); ?>


<?php
$projet = get_field("projet");
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
<main class="sm:ml-20 page-projet">
    <section class="header-content">
        <h1><?php the_title() ?></h1>
        <h2>
            <?= $projet['description'] ?>
        </h2>
    </section>
    <section class="section-white">
        <?php $informations = $projet['informations'] ?>
        <div class="lg:flex lg:flex-nowrap gap-16">

            <div class="">
                <div class="left-projet">
                    <div class="tag-home"><?= $informations['tag'] ?></div>
                    <ul>
                        <li class="localisation"><?= $informations['localisation'] ?></li>
                        <li class="type"><?= $informations['tag'] ?></li>
                        <li class="surface"><?= $informations['surface'] ?></li>
                        <li class="tarifs"><?= $informations['tarifs'] ?></li>
                        <li class="date"><?= $informations['date'] ?></li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 lg:mt-0 mt-8">
                <div class="swiper swiperProjectPage">
                    <?= transformer_en_swiper_slides($informations['images']) ?>
                </div>
                <div class="flex gap-8 swiper-navigation justify-center items-center">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="parti-pris">
            <?php $partiPris = $projet['parti_pris'] ?>
            <div class="tag-home"><?= $partiPris['tag'] ?></div>
            <div>
                <?= $partiPris['description'] ?>
            </div>
        </div>
    </section>
    <section class="avant-apres">
        <div class="container">

            <?php $avantApres = $projet['avant_apres'] ?>
            <div class="selectors flex gap-8 mb-8 justify-center w-full">
                <?php $indexSelector = 0;
                foreach ($avantApres as $selector):
                    ?>
                    <button
                        class="avant-apres-button border-marron-button <?= $indexSelector === 0 ? 'active-border-marron-button' : '' ?>"
                        data-index="<?= $indexSelector ?>">
                        <?= $selector['tag'] ?>
                    </button>
                    <?php
                    $indexSelector++;
                endforeach ?>
            </div>
            <?php $indexAvantApres = 0;
            foreach ($avantApres as $selector):
                ?>
                <div id="content-avant-apres-<?= $indexAvantApres ?>"
                    class="content-avant-apres <?= $indexAvantApres === 0 ? 'active-avant-apres' : '' ?>">
                    <div class="swiper swiperProjectAvantApres-<?= $indexAvantApres ?>">
                        <?= transformer_en_swiper_slides($selector['images']) ?>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center">
                        <div class="swiper-button-prev swiper-button-prev-<?= $indexAvantApres ?>"></div>
                        <div class="swiper-pagination swiper-pagination-<?= $indexAvantApres ?>"></div>
                        <div class="swiper-button-next swiper-button-next-<?= $indexAvantApres ?>"></div>
                    </div>
                </div>
                <?php
                $indexAvantApres++;
            endforeach ?>
        </div>
    </section>
    <section class="votre-projet">
        <?php $votreProjet = $projet['votre_projet'] ?>
        <div class="container">
            <?= $votreProjet['titre'] ?>
            <div class="flex gap-8">
                <a href="<?= $votreProjet['lien_1']['url'] ?>" class="orange-button"><?= $votreProjet['lien_1']['title'] ?></a>
                <a href="<?= $votreProjet['lien_2']['url'] ?>" class="border-beige-button"><?= $votreProjet['lien_2']['title'] ?></a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>