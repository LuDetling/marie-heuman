<?php get_header(); ?>

<div class="container">

    <h1 class="page-title">Nos Blogs</h1>

    <?php
    // --- RÉCUPÉRATION DES PARAMÈTRES ---

    // Recherche
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    // Tri
    $order = isset($_GET['order']) && $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';

    // Catégorie (si tu as une taxonomy "blog_category")
    $category = isset($_GET['cat']) ? intval($_GET['cat']) : '';

    // --- REQUÊTE PERSONNALISÉE ---
    $args = [
        'post_type'      => 'blog',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => $order,
        's'              => $search,
    ];

    if ($category) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'blog_category',
                'field'    => 'term_id',
                'terms'    => $category,
            ],
        ];
    }

    $blogs = new WP_Query($args);
    ?>

    <!-- BARRE DE FILTRES -->
    <form method="GET" class="blog-filters">

        <!-- Recherche -->
        <input type="text" name="s" placeholder="Rechercher..." value="<?php echo esc_attr($search); ?>">

        <!-- Tri -->
        <select name="order">
            <option value="DESC" <?php selected($order, 'DESC'); ?>>Plus récents</option>
            <option value="ASC" <?php selected($order, 'ASC'); ?>>Plus anciens</option>
        </select>

        <!-- Catégories (si taxonomy active) -->
        <?php 
        if (taxonomy_exists('blog_category')) :
            $terms = get_terms('blog_category'); 
        ?>
            <select name="cat">
                <option value="">Toutes les catégories</option>
                <?php foreach ($terms as $t) : ?>
                    <option value="<?php echo $t->term_id; ?>" <?php selected($category, $t->term_id); ?>>
                        <?php echo $t->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>

        <button type="submit">Filtrer</button>

    </form>

    <!-- LISTE DES BLOGS -->
    <?php if ($blogs->have_posts()) : ?>
        <div class="blog-grid">

            <?php while ($blogs->have_posts()) : $blogs->the_post(); ?>

                <article class="blog-card">

                    <!-- Image mise en avant -->
                    <a href="<?php the_permalink(); ?>" class="thumb">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <img src="https://via.placeholder.com/400x250?text=Pas+d%27image">
                        <?php endif; ?>
                    </a>

                    <div class="content">

                        <!-- Catégorie -->
                        <?php 
                        if (taxonomy_exists('blog_category')) :
                            $cats = get_the_terms(get_the_ID(), 'blog_category');
                            if ($cats) :
                        ?>
                            <span class="category"><?php echo $cats[0]->name; ?></span>
                        <?php 
                            endif;
                        endif; 
                        ?>

                        <!-- Titre -->
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <!-- Infos -->
                        <p class="meta">
                            Publié le <?php echo get_the_date(); ?>
                            • 
                            <?php 
                            $temps = get_field('temps_lecture');
                            echo $temps ? $temps . " min de lecture" : "—";
                            ?>
                        </p>

                        <!-- Extrait -->
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                        <!-- Lire plus -->
                        <a class="read-more" href="<?php the_permalink(); ?>">Lire l’article</a>

                    </div>

                </article>

            <?php endwhile; ?>

        </div>

        <!-- PAGINATION -->
        <div class="pagination">
            <?php
                echo paginate_links([
                    'total'        => $blogs->max_num_pages,
                    'current'      => max(1, get_query_var('paged')),
                    'prev_text'    => '« Précédent',
                    'next_text'    => 'Suivant »',
                ]);
            ?>
        </div>

    <?php else : ?>

        <p>Aucun blog trouvé.</p>

    <?php endif; wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>
