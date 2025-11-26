<?php
$projet = get_field('projet');
?>
<div class="card-article">
    <?php if ($projet['image']): ?>
        <img src="<?= esc_url($projet['image']['url']); ?>" alt="<?= esc_attr($projet['image']['alt']); ?>"
            width="<?= esc_attr($projet['image']['width']); ?>" height="<?= esc_attr($projet['image']['height']); ?>">
    <?php endif; ?>
    <div class="text-card">
        <h4><?php the_title(); ?></h4>
        <?= $projet['description'] ?>
        <a href="<?php the_permalink(); ?>" class="more mt-4">Découvrir le projet</a>
    </div>
</div>