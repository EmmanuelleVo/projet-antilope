<!doctype html>
<html lang="<?= __('fr', 'noair') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- TODO META-DESCRIPTION DIFFERENTES ET UNIQUES POUR TOUTES LES PAGES -->
    <meta name="description"
          content="<?= __('NOAir. Créé en 2022.', 'noair') ?>">
    <meta name="keywords"
          content="<?= __('NOAir, air, pollution, mesurer, module', 'noair') ?>">
    <meta name="author"
          content="Emmanuelle Vo">
    <title><?= is_front_page() ? bloginfo('name') : wp_title('NOAir •') ?></title>
    <link rel="stylesheet" href="<?= noair_mix('css/theme.css') ?>">
    <script src="<?= noair_mix('js/app.js') ?>" type="text/javascript"></script>

    <?php wp_head(); ?>
    <!--Essayer de se passer de wp_head()-->
</head>
<body>
<header class="header">
    <!-- h1 : Contactez NOAir, développeur de modules ayant pour but de mesurer la qualité de l'air -->
    <h1 class="header__title sro"><?= is_front_page() ? bloginfo('description') : trim(wp_title('NOAir | ')); ?></h1>
    <div class="header__menu menu">
        <div class="menu__logo">
            <a href="<?= site_url(); ?>" class="top__logo-link all" title="<?= __('Retour à l’Accueil', 'noair') ?>"
               itemprop="mainEntityOfPage"></a>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 69 69">
                <title>Logo de NOAir</title>
                <desc>"NO" et "Air" dans un carré de fond bleu foncé</desc>
                <g id="Groupe_4" data-name="Groupe 4" transform="translate(332 208)">
                    <path id="Tracé_5" data-name="Tracé 5" d="M0,0H69V69H0Z" transform="translate(-332 -208)" fill="#082a3f"/>
                    <text id="N" transform="translate(-328 -168)" fill="#fff" font-size="26" font-family="AquaGrotesque, Aqua Grotesque"><tspan x="0" y="0">N</tspan></text>
                    <text id="O" transform="translate(-309 -168)" fill="#fff" font-size="26" font-family="AquaGrotesque, Aqua Grotesque"><tspan x="0" y="0">O</tspan></text>
                    <text id="Air" transform="translate(-293 -156)" fill="#fff" font-size="18" font-family="AquaGrotesque, Aqua Grotesque"><tspan x="0" y="0">Air</tspan></text>
                </g>
            </svg>
            <span class="logo__description"><?= __('Mesure la qualité de l’air', 'noair') ?></span>
        </div>
        <a title="<?= __('Ouvrir le menu de navigation', 'noair'); ?>" class="burger-js burger-hidden burger">
            <p class="burger__lines"></p>
            <p class="burger__lines"></p>
            <p class="burger__lines"></p>
        </a>
        <div class="menu-js menu-nojs menu__wrapper" ">
            <nav class="menu__nav nav">
                <h2 class="nav__title sro"><?= __('Navigation principale', 'noair'); ?></h2>
                <ul class="nav__list">
                    <?php foreach (noair_get_menu_items('main') as $link): ?>
                        <li class="<?= $link->getBemClasses('nav__item') ?>">
                            <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                            <?php if ($link->hasSubItems()): ?>
                                <ul class="nav__sublist">
                                    <?php foreach ($link->subitems as $sub): ?>
                                        <li class="<?= $link->getBemClasses('nav__subitem') ?>">
                                            <a href="<?= $sub->url ?>" class="nav__link"><?= $sub->label ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>