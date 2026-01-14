<?php get_header(); ?>

<main class="sm:ml-20">
    <section>

        <h1>Résultats pour : "<?php the_search_query(); ?>"</h1>

        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>