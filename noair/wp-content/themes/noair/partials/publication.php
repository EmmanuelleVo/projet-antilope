<article class="publication publication--<?= $modifier ?> hidden">
    <div class="publication__card hidden">
        <?php if (get_field('video_bool') === true): ?>
            <div class="publication__wrapper publication__video">
                <h3 class="publication__title"><?= get_the_title() ?></h3>
                <p class="publication__date">
                    <span class="sro">Publié le </span>
                    <?= str_replace(':date', '<time class="post__date" datetime="' . get_the_date('c') . '">' . get_the_date() . '</time>',
                        __(':date', 'noair')); ?>
                </p>
            </div>
            <?= get_the_content() ?>
        <?php else: ?>

            <div class="publication__wrapper publication__article">
                <figure class="publication__fig">
                    <?= get_the_post_thumbnail(null, 'medium', [
                        'class' => 'publication__thumb',
                    ]) ?>
                </figure>

                <div class="publication__container">
                    <p class="publication__date">
                        <span class="sro">Publié le </span>
                        <?= str_replace(':date', '<time class="post__date" datetime="' . get_the_date('c') . '">' . get_the_date() . '</time>',
                            __(':date', 'noair')); ?>
                    </p>
                    <h3 class="publication__title"><?= get_the_title() ?></h3>

                    <div class="publication__excerpt">
                        <p><?= get_the_excerpt() ?></p>
                    </div>
                    <div class="publication--link">
                        <a href="<?= get_the_permalink() ?>" class="publication__link">
                            <?= __('Lire l’article', 'noair') ?> <span class="sro">sur <?= get_the_title() ?></span>
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
        <?php endif; ?>
    </div>
</article>