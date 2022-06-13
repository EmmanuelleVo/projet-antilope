<?php /* Template Name: Single-Project */ ?>
<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <main class="layout single-product">
        <article class="single-product__article article">
            <div class="single-product__container hidden">
                <h2 class="article__title single-product__title page__title"><?= get_the_title() ?></h2>
                <div class="single-product__header">
                    <?php $logo = get_field('logo');
                    if (!empty($logo)):?>
                        <img width="250px" height="auto"
                             class="single-product__logo"
                             src="<?= $logo['sizes']['medium']; ?>" alt="<?= $logo['alt']; ?>"
                             srcset="<?= $logo['sizes']['medium']; ?> 300w,
                             <?= $logo['sizes']['medium_large']; ?> 768w">
                    <?php endif; ?>
                    <p class="single-product__fullName">
                        <?= get_field('full_name') ?>
                    </p>
                </div>

            </div>

            <section class="single-product__description description big-screen grid hidden">
                <figure class="description__fig">
                    <?= get_the_post_thumbnail(null, 'medium', [
                        'class' => 'single-product__img image',
                    ]) ?>
                </figure>
                <div class="description__container">
                    <h3 class="description__title"><?= __('Qu‘est-ce que ', 'noair') ?> <?= get_the_title() ?> ?</h3>
                    <?= get_field('presentation') ?>
                </div>
            </section>

            <section class="single-product__case-studies case-studies big-screen grid hidden">
                <div class="case-studies__container">
                    <h3 class="case-studies__title"><?= __('Case studies', 'noair') ?></h3>
                    <p class="case-studies__content">
                        <?= get_field('case_studies') ?>
                    </p>
                </div>
                <?php $image = get_field('img_case_studies');
                if (!empty($image)):?>
                    <img width="100%" height="auto"
                         class="case-studies__img"
                         src="<?= $image['sizes']['medium']; ?>" alt="<?= $image['alt']; ?>"
                         srcset="<?= $image['sizes']['medium']; ?> 300w,
                         <?= $image['sizes']['medium_large']; ?> 768w">
                <?php endif; ?>
            </section>

            <div id="tab" class="single-product__tab big-screen hidden">
                <div class="tab">
                    <a href="#tab" class="tab__link tab__link--active"
                       data-for-tab="1"><?= __('Caractéristiques', 'noair') ?></a>
                    <a href="#tab" class="tab__link" data-for-tab="2"><?= __('Mesures effectuées', 'noair') ?></a>
                    <?php if (get_field('dev-1')): ?>
                        <a href="#tab" class="tab__link" data-for-tab="3"><?= __('En développement', 'noair') ?></a>
                    <?php endif; ?>
                </div>

                <section id="characteristics" class="single-product__characteristics tab__content tab__content--active"
                         data-tab="1">
                    <h3 class="characteristics__title sro"><?= __('Caractéristiques', 'noair') ?></h3>
                    <ul class="characteristics__list">
                        <?php for ($i = 1; $i <= 10; $i++):
                            $characteristic = get_field('caracteristique-' . $i);
                            if (!empty($characteristic)):
                                ?>
                                <li class="characteristics__item"><?= $characteristic ?></li>
                            <?php endif; endfor; ?>
                    </ul>
                </section>

                <section id="mesures" class="single-product__mesures tab__content" data-tab="2">
                    <h3 class="mesures__title sro"><?= __('Mesures effectuées', 'noair') ?></h3>

                    <?php $field = get_field_object('mesures');
                    $mesures = $field['value']; //get_field('mesures');
                    if ($mesures): ?>
                        <ul class="mesures__list">
                            <?php foreach ($mesures as $mesure): ?>
                                <li class="mesure__item"><?= $mesure['value'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </section>
                <?php if (get_field('dev-1')): ?>
                    <section id="dev" class="single-product__dev tab__content" data-tab="3">
                        <h3 class="dev__title sro"><?= __('En développement', 'noair') ?></h3>
                        <ul class="dev__list">
                            <?php for ($i = 1; $i <= 10; $i++):
                                $dev = get_field('dev-' . $i);
                                if (!empty($dev)):
                                    ?>
                                    <li class="dev__item"><?= $dev ?></li>
                                <?php endif; endfor; ?>
                        </ul>
                    </section>
                <?php endif; ?>
            </div>

            <section class="single-product__collaboration collaboration hidden">
                <h3 class="collaboration__title">En collaboration avec</h3>
                <ul class="collaboration__list big-screen">
                    <?php for ($i = 1; $i <= 10; $i++):
                        $collab = get_field('collaboration-' . $i);
                        if (!empty($collab)):
                            ?>
                            <li class="collaboration--item">
                                <img width="150" height="auto"
                                     class="collaboration--logo"
                                     id="<?= $i ?>"
                                     src="<?= $collab['sizes']['medium']; ?>" alt="<?= $collab['alt']; ?>"
                                     srcset="<?= $collab['sizes']['medium']; ?> 300w,
                         <?= $collab['sizes']['medium_large']; ?> 768w">
                            </li>
                        <?php endif; endfor; ?>
                </ul>
            </section>


            <div class="single-product__actions important hidden">
                <a href="<?= get_post_type_archive_link('product') ?>"
                   class="button single-product__button see-all"><?= __('Voir tous nos produits', 'noair') ?></a>
            </div>

    </main>

<?php endwhile; endif; ?>

<?php get_footer() ?>