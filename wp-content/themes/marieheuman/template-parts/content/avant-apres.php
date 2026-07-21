<?php
$diff = get_field('projet_diff');
$avantApres = $diff['avant_apres'];
$indexSelector = 0;
$indexSelectorImages = 0;
$indexAvantApres = 0;
$classes = [
    'avant' => 'avant',
    'rendu' => 'rendu',
    'apres' => 'apres',
] ?>


<?php if (!empty($avantApres['avant']['images']) || !empty($avantApres['rendu']['images']) || !empty($avantApres['apres']['images'])): ?>
    <div class="container-avant-apres">
        <?php
        $cles = array_keys($avantApres);
        foreach ($avantApres as $selector):
            if (!empty($selector['images'] && str_contains($selector['images'], '<img'))): ?>
                <div id="content-avant-apres-<?= $indexAvantApres ?>"
                    class="content-avant-apres <?= $indexAvantApres === 0 ? 'active-avant-apres' : '' ?>">
                    <div class="relative swiper swiperProjectAvantApres swiperProjectAvantApres-<?= $indexAvantApres ?>">
                        <?= transformer_en_swiper_slides($selector['images']) ?>
                    </div>
                </div>
                <?php
                $indexAvantApres++;
            endif;
        endforeach ?>

    </div>


    <div class="selectors flex gap-8 justify-between w-full mt-4">
        <ul class="flex items-stretch overflow-x-auto">
            <li class="img-alt">Filtres</li>
            <?php
            foreach ($avantApres as $key => $selector):
                if (!empty($selector['images'] && str_contains($selector['images'], '<img'))): ?>
                    <li class="min-w-max ">
                        <button class="<?= $indexSelector === 0 ? 'active-filter ' : '' ?>avant-apres-button <?= $classes[$key] ?>"
                            data-index="<?= $indexSelector ?>">
                            <?= $selector['tag'] ?>
                        </button>
                    </li>
                    <?php
                    $indexSelector++;
                endif;
            endforeach ?>
        </ul>
        <div class="flex gap-8 swiper-navigation justify-center items-center">
            <div class="swiper-button-prev swiper-button-prev-avant-apres"></div>
            <div class="swiper-button-next swiper-button-next-avant-apres"></div>
        </div>
    </div>

<?php endif; ?>