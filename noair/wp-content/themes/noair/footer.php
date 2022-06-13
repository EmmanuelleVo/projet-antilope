<?php include 'partials/_contact-section.php' ?>
<footer class="footer hidden">
    <h2 class="footer__title sro"><?= __('Pied-de-page', 'noair') ?></h2>
    <div class="wrapper big-screen">
        <div class="grid">
            <!--<div class="mobile__wrapper">-->
            <div class="footer__logo">
                <a href="<?= site_url(); ?>" class="footer__logo-link all"
                   title="<?= __('Retour à l’Accueil', 'noair') ?>"
                   itemprop="mainEntityOfPage"></a>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 69 69">
                    <title>Logo de NOAir</title>
                    <desc>"NO" et "Air" dans un carré de fond bleu foncé</desc>
                    <g id="Groupe_4" data-name="Groupe 4" transform="translate(332 208)">
                        <path id="Tracé_5" data-name="Tracé 5" d="M0,0H69V69H0Z" transform="translate(-332 -208)"
                              fill="#082a3f"/>
                        <text id="N" transform="translate(-328 -168)" fill="#fff" font-size="26"
                              font-family="AquaGrotesque, Aqua Grotesque">
                            <tspan x="0" y="0">N</tspan>
                        </text>
                        <text id="O" transform="translate(-309 -168)" fill="#fff" font-size="26"
                              font-family="AquaGrotesque, Aqua Grotesque">
                            <tspan x="0" y="0">O</tspan>
                        </text>
                        <text id="Air" transform="translate(-293 -156)" fill="#fff" font-size="18"
                              font-family="AquaGrotesque, Aqua Grotesque">
                            <tspan x="0" y="0">Air</tspan>
                        </text>
                    </g>
                </svg>
            </div>

            <div class="footer__container">
                <nav class="footer__nav">
                    <h3 class="nav__title sro"><?= __('Navigation de pied-de-page', 'noair') ?></h3>
                    <ul class="nav__list">
                        <?php foreach (noair_get_menu_items('footer') as $link): ?>
                            <li class="<?= $link->getBemClasses('nav__item') ?>">
                                <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

            </div>


            <?php noair_include('partner-link', ['modifier' => 'footer']); ?>

            <?php noair_include('social', ['modifier' => 'footer']); ?>
            <!--<div class="mobile__wrapper wrapper__links">
            </div>-->
        </div>
        <div class="footer__policies">
            <p class="footer__copyright"><?= __('Copyright © 2022 - Emmanuelle Vo - Tous droits réservés.', 'noair') ?></p>
            <a href="<?= get_permalink(noair_get_template_page('policies')) ?>"
               class="policies__link"><?= __('Mentions légales', 'noair') ?></a>
        </div>
    </div>
</footer>

<script type="application/ld+json">
    {
        "@context": "http://schema.org/",
        "@type": "WebSite",
        "name": "NoAir",
        "alternateName": "NoAir",
        "url": "https://noair.emmanuelle-vo.be",
        "author": {
            "@type": "Person",
            "@id": "#emmanuellevo"
        }
    }
</script>

<script type="application/ld+json">
    {
        "@context": "http://schema.org/",
        "@type": "Person",
        "@id": "#emmanuellevo",
        "name": "Emmanuelle Vo",
        "jobTitle": "Web Designer",
        "email": "emmanuelle.vo@gmail.com",
        "url": "https://emmanuelle-vo.be"
    }
</script>

</body>
</html>