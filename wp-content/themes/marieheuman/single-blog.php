<?php
/* Template Name: Article Blog */
get_header();

// $categories = get_the_category();
$blog = get_field("contenu_page_blog");
$indexSection = 0;
function changeIndexSection($i)
{
    return str_pad($i, 2, "0", STR_PAD_LEFT) . '. —';
}
?>
<main class="page-blog">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    <section class="header-blog">
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
        <div class="">
            <div class="titre">
                <h1>
                    <?= wp_title() ?>
                </h1>
            </div>

        </div>
    </section>
</main>
<?php
get_footer();
?>