<?php
$blog = get_field('contenu_page_blog');
?>
<div class="card-article section-white">
    <div class="img-link">
        <?php if (!empty($blog['image'])): ?>
            <img src="<?= esc_url($blog['image']['url']); ?>" alt="<?= esc_attr($blog['image']['alt']); ?>"
                width="<?= esc_attr($blog['image']['width']); ?>" height="<?= esc_attr($blog['image']['height']); ?>">
        <?php else: ?>
            <img src="<?= esc_url(IMAGE_DEFAULT) ?>" alt="Image par défaut">
        <?php endif; ?>
        <a href="<?= the_permalink(); ?>"></a>
    </div>
    <div class="text-card">
        <h4><?php the_title(); ?></h4>
        <div class="blog-meta">
            <span class="date flex items-center gap-2 flex-wrap">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-68-76a12,12,0,1,1-12-12A12,12,0,0,1,140,132Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,132ZM96,172a12,12,0,1,1-12-12A12,12,0,0,1,96,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,140,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,172Z">
                        </path>
                    </svg>
                    <span>
                        <?= get_the_date('F o'); ?>
                    </span>
                </div>
                <?php if (!empty($blog['temps_de_lecture'])): ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                            <path
                                d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z">
                            </path>
                        </svg>
                        <?= $blog['temps_de_lecture'] ?> de lecture
                    </div>
                <?php endif; ?>
            </span>
        </div>
        <a href="<?= the_permalink(); ?>" class="more mt-4">Lire l'article</a>
    </div>
</div>