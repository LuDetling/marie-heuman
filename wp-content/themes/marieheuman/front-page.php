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


    <!-- MA VISION -->

    <?php
    $tag_ma_vision = get_field('tag_ma_vision');
    $titres_ma_vision = get_field('titres_ma_vision');
    $image_ma_vision = get_field('image_ma_vision');
    $texte_ma_vision = get_field('texte_ma_vision');
    $plus_ma_vision = get_field('plus_ma_vision');
    ?>

    <section class="content-ma-vision">
        <span class="tag"><?= $tag_ma_vision ?></span>
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
                        class=""><?= esc_html($plus_ma_vision['title']) ?></a>
                </div>
            </div>
        </div>
    </section>



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
                    class="primary-button"><?= esc_html($content_button1['title']) ?></a>
                <a href="<?= esc_url($content_button2['url']) ?>"
                    class="secondary-button"><?= esc_html($content_button2['title']) ?></a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>