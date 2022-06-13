<?php /* Template Name: Policies */ ?>
<?php get_header() ?>
<main class="policies">
    <h1 class="policies__title page__title"><?= __('Mentions légales', 'noair') ?></h1>
    <section class="policies__wrapper big-screen">
        <div class="policies__content">
            <?= get_the_content() ?>
        </div>
    </section>

    <?php get_footer() ?>


