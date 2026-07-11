<?php
$projet = get_field('projet');
?>
<a href="<?php the_permalink(); ?>" class="card-article grid xl:grid-cols-2">

    <div class="content-img">
        <img src="<?= esc_url($projet['image']['url']); ?>" alt="<?= esc_attr($projet['image']['alt']); ?>"
            width="<?= esc_attr($projet['image']['width']); ?>" height="<?= esc_attr($projet['image']['height']); ?>">
    </div>

    <div class="text-card">
        <h3><?php the_title(); ?></h3>
        <?= $projet['description'] ?>
        <ul class="flex flex-wrap gap-2 categories-projets">
            <?php $categories = get_the_category();
            foreach ($categories as $cat):
                $categoryClasses = $cat->slug;
                ?>
                <li class="<?= $categoryClasses ?>">
                    <?= $cat->name ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="secondary-button">Découvrir le projet →</div>
    </div>
</a>