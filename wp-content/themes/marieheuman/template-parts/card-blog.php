<?php
$blog = get_field('contenu_page_blog');
?>
<div class="card-article section-white">
    <?php if ($blog['image']): ?>
        <div class="img-link">
            <img src="<?= esc_url($blog['image']['url']); ?>" alt="<?= esc_attr($blog['image']['alt']); ?>"
                width="<?= esc_attr($blog['image']['width']); ?>" height="<?= esc_attr($blog['image']['height']); ?>">
            <a href="<?= the_permalink(); ?>"></a>
        </div>
    <?php endif; ?>
    <div class="text-card">
        <h4><?php the_title(); ?></h4>
        <p class="blog-meta">
            <span class="date">
                <?= get_the_date('F o'); ?> •
            </span>
            <?= $blog['temps_de_lecture'] ?> de lecture
        </p>
        <a href="<?= the_permalink(); ?>" class="more mt-4">Lire l'article</a>
    </div>
</div>