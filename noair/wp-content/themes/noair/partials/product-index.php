<article class="product product--<?= $modifier ?>">
    <div class="product__card">

        <figure class="product__fig">
            <?= get_the_post_thumbnail(null, 'medium', [
                'class' => 'product__thumb',
            ]) ?>
        </figure>
        <div class="product__wrapper">
            <h3 class="product__title"><?= get_the_title() ?></h3>
            <p class="product__excerpt">
                <?= get_the_excerpt() ?>
            </p>
            <div class="product__container">
                <a href="<?= get_the_permalink() ?>"
                   class="product__link ">
                    <?= __('En savoir plus', 'noair') ?> <span class="sro"> sur <?= get_the_title() ?></span>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501">
                    <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)" fill="#082a3f"/>
                </svg>
            </div>

        </div>

    </div>
</article>