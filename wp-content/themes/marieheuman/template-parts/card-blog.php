<?php
$blog = get_field('contenu_page_blog');
?>
<div class="card-article">
    <?php if ($blog['image']): ?>
        <img src="<?= esc_url($blog['image']['url']); ?>" alt="<?= esc_attr($blog['image']['alt']); ?>"
            width="<?= esc_attr($blog['image']['width']); ?>" height="<?= esc_attr($blog['image']['height']); ?>">
    <?php endif; ?>
    <div class="text-card">
        <h4><?php the_title(); ?></h4>
        <p class="blog-meta">
            <span class="date">
                <?php echo get_the_date('F o'); ?> •
            </span>
            <?= $blog['temps_de_lecture'] ?> de lecture
        </p>
        <?= $blog['description'] ?>
        <a href="<?php the_permalink(); ?>" class="more mt-4">Lire l'article</a>
    </div>
</div>