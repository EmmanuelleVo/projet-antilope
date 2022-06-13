<article class="partner partner--<?= $modifier ?> hidden">
    <div class="partner__card">
        <figure class="partner__fig">
            <?= get_the_post_thumbnail(null, 'medium', [
                'class' => 'partner__thumb',
            ]) ?>
        </figure>
        <div class="partner__wrapper index__none">
            <h3 class="partner__title"><?= get_the_title() ?></h3>
            <p class="partner__content">
                <?= get_the_content() ?>
            </p>

            <div class="partner--link">
                <a href="<?= get_field('link') ?>"
                   class="partner__link index__none"><?= __('Vers le site', 'noair') ?>
                </a>
                <svg class="external--link" xmlns="http://www.w3.org/2000/svg" width="16.854" height="16.854"
                     viewBox="0 0 16.854 16.854">
                    <title>Dessin d'un lien externe</title>
                    <path id="Icon_open-external-link" data-name="Icon open-external-link"
                          d="M0,0V16.854H16.854V12.64H14.747v2.107H2.107V2.107H4.213V0ZM8.427,0l3.16,3.16L6.32,8.427l2.107,2.107,5.267-5.267,3.16,3.16V0Z"
                          fill="#082a3f"/>
                </svg>
            </div>
        </div>
    </div>
</article>