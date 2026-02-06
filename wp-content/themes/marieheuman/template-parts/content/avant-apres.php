<?php
$projet = get_field("projet");
$avantApres = $projet['avant_apres'];
if ($avantApres['avant']['images']) {
    ?>
    <section class="avant-apres section-beige">
        <div class="container">

            <div class="selectors flex gap-8 justify-center w-full">
                <ul class="flex gap-4 flex-wrap">
                    <?php $indexSelector = 0;
                    foreach ($avantApres as $selector):
                        ?>
                        <li>
                            <button
                                class="avant-apres-button border-marron-button <?= $indexSelector === 0 ? 'active-border-marron-button' : '' ?>"
                                data-index="<?= $indexSelector ?>">
                                <?= $selector['tag'] ?>
                            </button>
                        </li>
                        <?php
                        $indexSelector++;
                    endforeach ?>
                </ul>
            </div>
            <?php $indexAvantApres = 0;
            foreach ($avantApres as $selector): ?>
                <div id="content-avant-apres-<?= $indexAvantApres ?>"
                    class="content-avant-apres <?= $indexAvantApres === 0 ? 'active-avant-apres' : '' ?>">
                    <div class="swiper swiperProjectAvantApres swiperProjectAvantApres-<?= $indexAvantApres ?>">
                        <?= transformer_en_swiper_slides($selector['images']) ?>
                    </div>
                    <div class="flex gap-8 swiper-navigation justify-center items-center hidden">
                        <!-- <div class="swiper-button-prev swiper-button-prev-avant-apres-<?= $indexAvantApres ?>"></div>
                        <div class="swiper-pagination swiper-pagination-avant-apres-<?= $indexAvantApres ?>"></div>
                        <div class="swiper-button-next swiper-button-next-avant-apres-<?= $indexAvantApres ?>"></div> -->
                        <div class="swiper-button-prev swiper-button-prev-avant-apres"></div>
                        <div class="swiper-pagination swiper-pagination-avant-apres"></div>
                        <div class="swiper-button-next swiper-button-next-avant-apres"></div>
                    </div>
                </div>
                <?php
                $indexAvantApres++;
            endforeach ?>
        </div>
    </section>
<?php } ?>