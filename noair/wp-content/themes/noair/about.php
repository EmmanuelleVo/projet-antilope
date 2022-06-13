<?php /* Template Name: About */ ?>
<?php get_header() ?>
<?php
$about = noair_get_about();
if (($about)->have_posts()) : while ($about->have_posts()) :
$about->the_post(); ?>
<!--<h1 class="about__title">A propos de NOAir <span class="sro">, constructeur de modules mesurant la qualité de l'air et la pollution</span></h1>-->
<main class="layout about">
    <h2 class="about__title page__title"><?= __('À propos de NOAir') ?></h2>
    <div class="margin big-screen">
        <section class="about__noair noair hidden">
            <div class="noair__container">
                <h2 class="noair__title section_title--decoration-105">Qu'est-ce que NOAir ?</h2>
                <p class="noair__content">
                    <?= get_the_content() ?>
                </p>

                <a href="<?= get_post_type_archive_link('product') ?>"
                   class="noair__button button"><?= __('Découvrez nos produits', 'noair') ?></a>
            </div>
            <figure class="noair__fig">
                <?= get_the_post_thumbnail(null, 'medium', [
                    'class' => 'noair__img image',
                ]) ?>
            </figure>
        </section>

        <section class="about__partners hidden">
            <h2 class="partners__title section_title--decoration-103">Nos partenaires</h2>
            <div class="partners__wrapper">
                <?php
                $partners = noair_get_partners(3);
                if (($partners)->have_posts()) : while ($partners->have_posts()) : $partners->the_post();
                    noair_include('partners', ['modifier' => 'index']); ?>
                <?php endwhile; else : ?>
                    <p class="best-product__empty empty"><?= __('Nous n’avons pas de partenaires', 'noair') ?></p>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <?php endwhile;endif; ?>

    <?php get_footer() ?>
