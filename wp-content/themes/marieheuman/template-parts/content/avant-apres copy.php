<?php
$projet = get_field("projet");
$avantApres = $projet['avant_apres']; ?>
<?php if (!empty($avantApres['avant']['images']) || !empty($avantApres['projection_3d']['images']) || !empty($avantApres['apres']['images'])): ?>
    <section class="avant-apres section-beige">
        <div class="container">
            <div class="selectors flex gap-8 justify-center w-full">
                <ul class="flex gap-4 overflow-x-auto">
                    <?php $indexSelector = 0;
                    foreach ($avantApres as $selector):
                        if (!empty($selector['images'] && str_contains($selector['images'], '<img'))): ?>
                            <li class="min-w-max">
                                <button
                                    class="avant-apres-button border-marron-button <?= $indexSelector === 0 ? 'active-border-marron-button' : '' ?>"
                                    data-index="<?= $indexSelector ?>">
                                    <?= $selector['tag'] ?>
                                </button>
                            </li>
                            <?php
                            $indexSelector++;
                        endif;
                    endforeach ?>
                </ul>
            </div>
            <div class="container-avant-apres">
                <?php $indexAvantApres = 0;
                foreach ($avantApres as $selector):
                    if (!empty($selector['images'] && str_contains($selector['images'], '<img'))): ?>
                        <div id="content-avant-apres-<?= $indexAvantApres ?>"
                            class="content-avant-apres <?= $indexAvantApres === 0 ? 'active-avant-apres' : '' ?>">
                            <div class="swiper swiperProjectAvantApres swiperProjectAvantApres-<?= $indexAvantApres ?>">
                                <?= transformer_en_swiper_slides($selector['images']) ?>
                            </div>
                        </div>
                        <?php
                        $indexAvantApres++;
                    endif;
                endforeach ?>
                <div class="flex gap-8 swiper-navigation justify-center items-center">
                    <div class="swiper-button-prev swiper-button-prev-avant-apres"></div>
                    <div class="swiper-pagination swiper-pagination-avant-apres"></div>
                    <div class="swiper-button-next swiper-button-next-avant-apres"></div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>