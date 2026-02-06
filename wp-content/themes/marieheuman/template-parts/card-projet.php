<?php
$projet = get_field('projet');
?>
<div class="card-article">
    <?php if ($projet['image']): ?>
        <img src="<?= esc_url($projet['image']['url']); ?>" alt="<?= esc_attr($projet['image']['alt']); ?>"
            width="<?= esc_attr($projet['image']['width']); ?>" height="<?= esc_attr($projet['image']['height']); ?>">
        <a href="<?php the_permalink(); ?>" class="over-img-link"></a>
    <?php endif; ?>
    <div class="show-hide">
        <button class="show">+</button>
        <button class="hide">-</button>
    </div>
    <div class="text-card section-white">
        <h4><?php the_title(); ?></h4>
        <?= $projet['description'] ?>
        <a href="<?php the_permalink(); ?>" class="more mt-4">Découvrez le projet</a>
    </div>
</div>