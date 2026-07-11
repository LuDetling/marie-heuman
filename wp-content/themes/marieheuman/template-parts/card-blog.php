<?php
$blog = get_field('contenu_page_blog');
?>

<a href="<?= the_permalink(); ?>" class="block card-article">
    <div class="flex gap-4 justify-between">
        <div class="text-card">
            <div class="blog-meta flex gap-5">
                <ul class="flex flex-wrap gap-2 categories-blog">
                    <?php $categories = get_the_terms(get_the_ID(), 'blog_category');

                    foreach ($categories as $cat):
                        $categoryClasses = $cat->slug;
                        ?>
                        <li class="<?= $categoryClasses ?>">
                            <?= $cat->name ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <span class="date flex items-center gap-1 flex-wrap">
                    <div class="flex items-center gap-2">
                        <span>
                            <?= get_the_date('F o'); ?>
                        </span>
                    </div>
                    <div>·</div>
                    <?php if (!empty($blog['temps_de_lecture'])): ?>
                        <div class="flex items-center gap-2">
                            <?= $blog['temps_de_lecture'] ?> de lecture
                        </div>
                    <?php endif; ?>
                </span>
            </div>

            <h3>
                <?php the_title(); ?>
            </h3>
            <div class="flex items-end justify-between">
                <div class="description">
                    <?= $blog['description'] ?>
                </div>
                <div class="read">Lire →</div>
            </div>
        </div>
        <div class="img-link">
            <?php if (!empty($blog['image'])): ?>
                <img src="<?= esc_url($blog['image']['url']); ?>" alt="<?= esc_attr($blog['image']['alt']); ?>"
                    width="<?= esc_attr($blog['image']['width']); ?>" height="<?= esc_attr($blog['image']['height']); ?>">
            <?php else: ?>
                <img src="<?= esc_url(IMAGE_DEFAULT) ?>" alt="Image par défaut">
            <?php endif; ?>
        </div>
    </div>
</a>