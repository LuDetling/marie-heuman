<?php get_header(); ?>

<main class="ml-20">
    <!-- IMAGE HEADER -->
    <?php
    $image_header = get_field('image_header'); // nom du champ
    $text_image_header = get_field('text_image_header'); // nom du champ
    $lien_1_image_header = get_field('lien_1_image_header'); // nom du champ
    $lien_2_image_header = get_field('lien_2_image_header'); // nom du champ
    
    if ($image_header): ?>
        <section class="content-img-header relative">
            <img src="<?= esc_url($image_header['url']); ?>" alt="<?= esc_attr($image_header['alt']); ?>"
                width="<?= esc_attr($image_header['width']); ?>" height="<?= esc_attr($image_header['height']); ?>">
            <div class="absolute bottom-30 left-30 z-2">
                <div class="text-img-header">
                    <?= $text_image_header; ?>
                    <div class="flex gap-8 mt-12">
                        <a href="<?= esc_url($lien_1_image_header['url']) ?>"
                            class="orange-button"><?= esc_html($lien_1_image_header['title']) ?></a>
                        <a href="<?= esc_url($lien_2_image_header['url']) ?>"
                            class="border-orange-button"><?= esc_html($lien_2_image_header['title']) ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- END IMAGE HEADER -->

    <!-- MA VISION -->

    <?php
    $tag_ma_vision = get_field('tag_ma_vision');
    $titres_ma_vision = get_field('titres_ma_vision');
    $image_ma_vision = get_field('image_ma_vision');
    $texte_ma_vision = get_field('texte_ma_vision');
    $plus_ma_vision = get_field('plus_ma_vision');
    ?>

    <section class="content-ma-vision">
        <span class="tag-home"><?= $tag_ma_vision ?></span>
        <?= $titres_ma_vision ?>
        <div class="flex items-stretch gap-16">
            <div class="image-ma-vision md:w-4/10">
                <img src="<?= esc_url($image_ma_vision['url']); ?>" alt="<?= esc_attr($image_ma_vision['alt']); ?>"
                    width="<?= esc_attr($image_ma_vision['width']); ?>"
                    height="<?= esc_attr($image_ma_vision['height']); ?>">
            </div>
            <div class="texte-ma-vision md:w-6/10">
                <?= $texte_ma_vision ?>
                <div class="mt-8">
                    <a href="<?= esc_url($plus_ma_vision['url']) ?>"
                        class="more"><?= esc_html($plus_ma_vision['title']) ?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- END MA VISION -->



    <!-- SERIVCES -->
    <?php
    $tag_services_accueil = get_field('tag_services_accueil');
    $titres_services_accueil = get_field('titres_services_accueil');
    $lien_1_services_accueil = get_field('lien_1_services_accueil');
    $lien_2_services_accueil = get_field('lien_2_services_accueil');
    ?>
    <section class="content-services-accueil">
        <span class="tag-home"><?= $tag_services_accueil ?></span>
        <?= $titres_services_accueil ?>
        <div class="flex gap-4 justify-center selector-services">
            <?php
            for ($i = 1; $i <= 3; $i++) {

                $titre_service = get_field('titre_service_' . $i);
                ?>
                <div class="point">
                    <button
                        class="service-button border-marron-button<?= $i == 1 ? ' active-border-marron-button' : '' ?>"><?= $titre_service ?></button>
                </div>
            <?php } ?>
        </div>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            $image_service = get_field('image_service_' . $i);
            $tag_service = get_field('tag_service_' . $i);
            $texte_service = get_field('texte_service_' . $i);
            $plus_service = get_field('plus_service_' . $i);
            ?>
            <div id="<?= "content-service-{$i}" ?>" class="flex item-service gap-16<?= $i == 1 ? ' active-service' : '' ?>">
                <div class="md:w-4/10 left-service">
                    <img src="<?= esc_url($image_service['url']); ?>" alt="<?= esc_attr($image_service['alt']); ?>"
                        width="<?= esc_attr($image_service['width']); ?>"
                        height="<?= esc_attr($image_service['height']); ?>">
                </div>
                <div class="md:w-6/10 right-service">
                    <span class="tag"><?= $tag_service ?></span>
                    <?= $texte_service ?>
                    <div class="mt-8">
                        <a href="<?= esc_url($plus_service['url']) ?>"
                            class="more"><?= esc_html($plus_service['title']) ?></a>
                    </div>
                </div>
            </div>


        <?php } ?>

        <div class="flex justify-end gap-4 mt-12">
            <a href="<?= esc_url($lien_1_services_accueil['url']) ?>"
                class="orange-button"><?= esc_html($lien_1_services_accueil['title']) ?></a>
            <a href="<?= esc_url($lien_2_services_accueil['url']) ?>"
                class="border-orange-button"><?= esc_html($lien_2_services_accueil['title']) ?></a>
        </div>
    </section>
    <!-- END SERIVCES -->



    <!-- CONTENT LINKS -->
    <div class="content-links py-25 px-50">
        <?php
        $content = get_field('content');
        $content_button1 = get_field('lien_1');
        $content_button2 = get_field('lien_2');
        ?>
        <div class="content">
            <?= $content; ?>
            <div class="flex gap-4 mt-12">
                <a href="<?= esc_url($content_button1['url']) ?>"
                    class="marron-button"><?= esc_html($content_button1['title']) ?></a>
                <a href="<?= esc_url($content_button2['url']) ?>"
                    class="secondary-button"><?= esc_html($content_button2['title']) ?></a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>