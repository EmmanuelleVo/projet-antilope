<?php get_header(); ?>
<main class="404">
    <h2 class="404__title page__title">404</h2>
    <p class="404__content">Page non trouvée</p>
    <a class="404__link" href="<?= get_home_url(); ?>"><?= __('Retourner sur la page d’accueil', 'pf') ?></a>
</main>
<?php get_footer(); ?>