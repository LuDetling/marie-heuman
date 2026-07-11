<?php $blog = get_field('contenu_page_blog'); ?>

<a href="<?= the_permalink(); ?>" class="first-card-article grid xl:grid-cols-2">
    <div class="content-img">
        <?php if (!empty($blog['image'])): ?>
            <img src="<?= esc_url($blog['image']['url']); ?>" alt="<?= esc_attr($blog['image']['alt']); ?>"
                width="<?= esc_attr($blog['image']['width']); ?>" height="<?= esc_attr($blog['image']['height']); ?>">
        <?php else: ?>
            <img src="<?= esc_url(IMAGE_DEFAULT) ?>" alt="Image par défaut">
        <?php endif; ?>
    </div>
    <div class="text-card">
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
        <h3>
            <?php the_title(); ?>
        </h3>
        <div class="blog-meta">
            <span class="date flex items-center gap-2 flex-wrap">
                <div class="flex items-center gap-2">
                    <span>
                        <?= get_the_date('F o'); ?>
                    </span>
                </div>
                <?php if (!empty($blog['temps_de_lecture'])): ?>
                    <div class="flex items-center gap-2">
                        <?= $blog['temps_de_lecture'] ?> de lecture
                    </div>
                <?php endif; ?>
            </span>
        </div>
        <?= $blog['description'] ?>
        <div class="secondary-button mt-8">Lire l'article</div>

    </div>
</a>