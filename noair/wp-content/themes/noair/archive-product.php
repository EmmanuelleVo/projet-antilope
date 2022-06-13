<?php get_header(); ?>
    <main class="layout products">
        <h2 class="products__title page__title"><?= __('Nos produits', 'noair'); ?></h2>

        <section class="layout__products big-screen">
            <div class="products__container">
                <?php
                if (have_posts()): while (have_posts()): the_post();
                    noair_include('product', ['modifier' => 'archive']);
                endwhile;
                else: ?>
                    <p class="products__empty"><?= __('Il n’y a aucun produit pour le moment.', 'noair'); ?></p>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>