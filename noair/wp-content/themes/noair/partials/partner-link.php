<div class="partners partners--<?= $modifier ?>">
    <h3 class="partners__title"><?= __('Nos partenaires', 'noair') ?></h3>
    <ul class="partners__list">
        <?php
        $partners = noair_get_partners();
        if (($partners)->have_posts()) : while ($partners->have_posts()) : $partners->the_post(); ?>
            <li class="partners__item">
                <a href="<?= get_field('link') ?>" class="partners__link"><?= get_the_title() ?></a>
            </li>
        <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</div>