<?php get_header(); ?>
<!--<h1 class="publications__title">Publications liées à NOAir, créateur de modules visant à mesurer la qualité de l'air</h1>-->

<main class="publications">
  <h2 class="publications__title page__title"><?= __('Toutes nos publications', 'noair'); ?></h2>
    <div class="publications__container big-screen">
        <?php
        $publications = noair_get_publications(9);
        if (($publications)->have_posts()) : while ($publications->have_posts()) : $publications->the_post();
            noair_include('publication', ['modifier' => 'archive']); ?>
        <?php endwhile; else : ?>
            <p class="publications__empty empty"><?= __('Il n’y a pas encore de publication pour le moment', 'noair') ?></p>
        <?php endif; ?>
    </div>

<?php get_footer() ?>