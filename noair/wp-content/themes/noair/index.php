<?php get_header() ?>
    <main class="layout">
    <section class="layout__intro intro">
        <div class="intro__background">
            <div class="intro__gradient"></div>
            <figure class="intro__fig">
                <?= get_the_post_thumbnail(null, 'large', [
                    'class' => 'intro__img',
                ]) ?>
                <?= wp_get_attachment_image(89, 'large') ?>
            </figure>
        </div>
        <div class="intro__container big-screen">
            <h2 class="intro__title hidden"><?= __('Qu’est-ce que NoAir ?', 'noair') ?></h2>
            <p class="intro__content hidden">Un enjeu de santé publique : créer des capteurs pour surveiller la pollution
                atmosphérique</p>
            <div class="intro__link hidden">
                <a href="<?= get_permalink(noair_get_template_page('about')) ?>" class="intro__button button">
                    <?= __('En savoir plus sur NOAir', 'noair') ?>
                </a>
            </div>
        </div>
    </section>

    <section class="layout__best-product best-product">
        <div class="big-screen">
            <div class="wrapper">
                <h2 class="best-product__title section_title--decoration"><?= __('Notre produit le plus utilisé', 'noair') ?></h2>
                <a href="<?= get_post_type_archive_link('product') ?>"
                   class="best-product__button products__all button"><?= __('Voir tous nous produits', 'noair') ?>
                </a>
            </div>
            <?php
            $products = noair_get_products(1);
            if (($products)->have_posts()) : while ($products->have_posts()) : $products->the_post();
                noair_include('product-index', ['modifier' => 'index']); ?>
            <?php endwhile; else : ?>
                <p class="best-product__empty empty"><?= __('Il n’y a pas encore de produit pour le moment', 'noair') ?></p>
            <?php endif; ?>

        </div>
    </section>

    <section class="layout__partners partners big-screen">
        <h2 class="partners__title--intro section_title--decoration-103">Nos partenaires</h2>
        <div class="partners__wrapper">
            <?php
            $partners = noair_get_partners(3);
            if (($partners)->have_posts()) : while ($partners->have_posts()) : $partners->the_post();
                noair_include('partners', ['modifier' => 'index']); ?>
            <?php endwhile; else : ?>
                <p class="best-product__empty empty"><?= __('Nous n’avons pas de partenaires', 'noair') ?></p>
            <?php endif; ?>

        </div>
        <div class="partners__actions">
            <a href="<?= get_permalink(noair_get_template_page('about')) ?>" class="partners__link button">
                <?= __('En savoir plus sur nos partenaires', 'noair') ?>
            </a>

        </div>
    </section>

<?php get_footer() ?>