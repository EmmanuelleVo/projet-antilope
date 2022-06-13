<?php

include_once 'Menus/PrimaryMenuItem.php';
include_once 'Forms/BaseFormController.php';
include_once 'Forms/ContactFormController.php';
include_once 'Forms/Sanitizers/BaseSanitizer.php';
include_once 'Forms/Sanitizers/TextSanitizer.php';
include_once 'Forms/Sanitizers/EmailSanitizer.php';
include_once 'Forms/Validators/BaseValidator.php';
include_once 'Forms/Validators/RequiredValidator.php';
include_once 'Forms/Validators/EmailValidator.php';


// Lancer la session PHP
add_action('init', 'noair_boot_theme', 1);

function noair_boot_theme()
{

    load_theme_textdomain('noair', __DIR__ . '/locales');

    if (!session_id()) {
        session_start();
    }
}


/*****
 * Return a compile asset's URI
 * *****/

function noair_asset($path)
{
    return rtrim(get_template_directory_uri(), '/') . '/public/' . ltrim($path, '/');
}


/*****
 * Register custom post type
 * *****/

add_action('init', 'noair_custom_post_type');

function noair_custom_post_type()
{
    register_post_type('product', [
        'label' => 'Produits',
        'labels' => [
            'singular_name' => 'Produit',
            'add_new_item' => 'Ajouter un nouveau produit',
            'add_new' => 'Ajouter un nouveau produit',
        ],
        'description' => 'Tous les produits de NOAir.',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => [
            'slug' => 'product'
        ],
        'has_archive' => true,
    ]);

    register_post_type('publication', [
        'label' => 'Publications',
        'labels' => [
            'singular_name' => 'Publication',
            'add_new_item' => 'Ajouter une nouvelle publication',
            'add_new' => 'Ajouter une nouvelle publication',
        ],
        'description' => 'Toutes les publications de NOAir.',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => [
            'slug' => 'publication'
        ],
        'has_archive' => true,
    ]);

    register_post_type('partner', [
        'label' => 'Partenaires',
        'labels' => [
            'singular_name' => 'Partenaire',
            'add_new_item' => 'Ajouter un nouveau partenaire',
            'add_new' => 'Ajouter un nouveau partenaire',
        ],
        'description' => 'Tous les partenaires de NOAir.',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => [
            'slug' => 'partner'
        ],
        'has_archive' => true,
    ]);

    register_post_type('bio', [
        'label' => 'bio',
        'labels' => [
            'singular_name' => 'bio',
            'add_new_item' => 'Ajouter une bio',
            'add_new' => 'Ajouter une bio',
        ],
        'description' => 'Toutes les bio',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => [
            'slug' => 'about'
        ],
    ]);

    register_post_type('message', [
        'label' => 'Messages de contact',
        'labels' => [
            'name' => 'Messages de contact',
            'singular_name' => 'Message de contact',
        ],
        'description' => "Les messages envoyés par les utilisateurs via le formulaire de contact",
        'public' => false, //accessible dans l'interface admin (formulaire de contact: false)
        'show_ui' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-buddicons-pm',
        'capabilities' => [
            'create_posts' => false, //enlever le bouton add new
        ],
        'map_meta_cap' => true,

        // TODO hook : afficher du code html avec les infos au lieu d'un wysiwyg
    ]);
}

/*
 * WP_QUERY => function
 */

function noair_get_products($postPerPage = 10)
{
    $products = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => $postPerPage,
        'orderby' => 'date',
        'order' => 'desc',
    ]);
    return $products;
}

function noair_get_publications($postPerPage = 6)
{
    $publications = new WP_Query([
        'post_type' => 'publication',
        'posts_per_page' => $postPerPage,
        'orderby' => 'date',
        'order' => 'desc',
    ]);
    return $publications;
}

function noair_get_partners($postPerPage = 3)
{
    $partners = new WP_Query([
        'post_type' => 'partner',
        'posts_per_page' => $postPerPage,
        'orderby' => 'date',
        'order' => 'desc',
    ]);
    return $partners;
}

function noair_get_about()
{
    $about = new WP_Query([
        'post_type' => 'bio',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'desc',
    ]);
    return $about;
}


/*
 * BUG SEO
 */

function nmsDev($atts)
{
    $count = 0;
    $output = '';
    $attachments = get_posts(array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_mime_type' => 'image/svg+xml',
        'fields' => 'ids'
    ));


    foreach ($attachments as $attachment_id) {
        $meta_data = wp_get_attachment_metadata($attachment_id);

        if (empty($meta_data)) {

            error_log("Indy tells you - rebuild attachment_metadata: " . $attachment_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                require_once ABSPATH . 'wp-admin/includes/image.php';
            }

            $url = get_attached_file($attachment_id);
            $attach_data = wp_generate_attachment_metadata($attachment_id, $url);
            wp_update_attachment_metadata($attachment_id, $attach_data);
            $count++;
        }
    }
    $output .= 'Updated entries: ' . $count;
    return $output;
}


/* *****
 * Définition de la fonction retournant un menu de navigation sous forme d'un tabeau de liens de niveau 0
 * *****/

function noair_get_menu_items($location)
{
    $links = [];
    // 1. Récupérer le menu qui correspond à l'emplacement souhaité
    $locations = get_nav_menu_locations(); // retourne [tous les menus de nav qui ont été enregistrés - ici : primary et footer]
    if ($locations[$location] ?? null) { // null coalescing operator : if key=primary|footer : primary|footer and not null else if !key : null / === array_key_exist($location, $locations)
        $menu = $locations[$location];


        // 2. Récupérer tous les éléments (liens) du menu en question
        $posts = wp_get_nav_menu_items($menu);

        // 3. Traiter chaque élément du menu pour le transformer en objet
        foreach ($posts as $post) {
            // Créer une instance d'un objet personnalisé à partir de $post
            $link = new PrimaryMenuItem($post);

            // Ajouter cette instance soit ) $links (si niveau 0) ou soit en tant que sous-élément d'un link déjà existant
            if ($link->isSubItem()) {
                // Ajouter l'instance comme enfant d'un $links existant,
                foreach ($links as $existing) {
                    if ($existing->isParentFor($link)) {
                        $existing->addSubItem($link);
                    }
                }
            } else {
                $links[] = $link;
            }


        }
    }
    // 4. Retourner les éléments de niveau 0
    return $links;
}

/* *****
 * Register navigation menus
 * *****/

add_action('init', 'noair_custom_navigation_menus');

function noair_custom_navigation_menus()
{
    register_nav_menus([
        'main' => 'Navigation principale',
        'footer' => 'Navigation en pied de page',
    ]);
}


/* *****
 * SVG support
 * *****/

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');


/* *****
 * Handle Contact Form
 * *****/

add_action('admin_post_nopriv_submit_contact_form', 'noair_handle_submit_contact_form');
add_action('admin_post_submit_contact_form', 'noair_handle_submit_contact_form');

function noair_handle_submit_contact_form()
{

    $form = new ContactFormController($_POST);

}

function noair_get_contact_form_field_value($field)
{
    if (!isset($_SESSION['feedback_contact_form'])) {
        return '';
    }
    return $_SESSION['feedback_contact_form']['data'][$field] ?? '';
}

function noair_get_contact_form_field_error($field)
{
    if (!isset($_SESSION['feedback_contact_form'])) {
        return '';
    }

    if (!($_SESSION['feedback_contact_form']['errors'][$field] ?? null)) {
        return '';
    }

    return '<p class="form__error">Problème : ' . $_SESSION['feedback_contact_form']['errors'][$field] . '</p>';

}


/*
 * Utilitaire pour charger un fichier compilé par mix avec cache bursting
 */

function noair_mix($path)
{
    // $path = 'js/script.js';
    // return get_stylesheet_directory_uri() . '/public/' . $path;

    $path = '/' . ltrim($path, '/');

    // Check si fichier demandé existe

    if (!realpath(__DIR__ . '/public' . $path)) {
        return;
    }

    // Check si fichier mix-manifeste existe, sinon retourner le fichier sans cache bursting

    if (!($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
        return get_stylesheet_directory_uri() . '/public' . $path;
    }

    // Ouvrir le fichier mix-manifeste et lire le JSON

    $manifest = json_decode(file_get_contents($manifest), true);

    // Check si fichier demandé est présent dans le mix-manifeste, sinon retourner le fichier sans cache bursting

    if (!array_key_exists($path, $manifest)) {
        return get_stylesheet_directory_uri() . '/public' . $path;
    }

    // C'est OK, on génère l'URL vers la ressource sur base du nom de fichier avec cache bursting

    return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}


/* *****
 * Return the useful thumbnail attributes
 * *****/
function noair_the_thumbnail_attributes($sizes = [])
{
    // 1. Récupérer le thumbnail pour le post courant dans the loop
    $thumbnail = get_post(get_post_thumbnail_id());
    $thumbnail_meta = get_post_meta($thumbnail->ID);
    $src = null;

    // 2. Récupérer les tailles d'image qui nous intéressent & formater les tailles pour qu'elles soient utilisables dans srcset
    $sizes = array_map(function ($size) use ($thumbnail, &$src) { // use(xxx) = pour utiliser la variable dans le scope
        $data = wp_get_attachment_image_src($thumbnail->ID, $size);

        if (is_null($src)) {
            $src = $data[0];
        }

        return $data[0] . ' ' . $data[1] . 'w';
    }, $sizes);

    // 4. Formater les attributs
    $srcset = implode(', ', $sizes);
    $alt = $thumbnail_meta['_wp_attachment_image_alt'][0] ?? null;

    // 5. Retourner les attributs générés
    return 'src="' . $src . '" srcset="' . $srcset . '" alt="' . $alt . '"';
}


/*
 * Fonction permettant d'inclure des composants et d'y injecter des variables locales (scope de l'appel de la fonction)
 */

function noair_include(string $partial, array $variables = [])
{

    extract($variables); // $modifier = 'search'

    include(__DIR__ . '/partials/' . $partial . '.php');
}


// Fonction permettant de récupérer la première page appartenant à un template donné
function noair_get_template_page(string $template)
{
    // Créer un WP_Query
    $query = new WP_Query([
        // Filtrer sur le post type de type 'page'
        'post_type' => 'page',
        // Uniquement les pages publiée
        'post_status' => 'publish',
        // Filtrer sur le type de template utilisé
        'meta_query' => [
            ['key' => '_wp_page_template', 'value' => $template . '.php']
        ],
    ]);

    // Retourner la première occurrance pour cette requête ou null
    return $query->posts[0] ?? null;
}


/* *****
 * Custom header
 * *****/

// Remove emojis
function disable_emojis_wp_head()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_wp_tinymce');
}

add_action('init', 'disable_emojis_wp_head');

function disable_emojis_wp_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

// Remove other crap in your example
add_action('get_header', function () {
    remove_action('wp_head', 'rsd_link'); // Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wp_generator'); // XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'index_rel_link'); // index link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // relational links 4 the posts adjacent 2 the currentpost
    remove_action('template_redirect', 'wp_shortlink_header', 11);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
}, 99);

// Remove adminbar inline css on frontend
function removeinline_adminbar_css_frontend()
{
    if (has_filter('wp_head', '_admin_bar_bump_cb')) {
        remove_filter('wp_head', '_admin_bar_bump_cb');
    }
}

add_filter('wp_head', 'removeinline_adminbar_css_frontend', 1);



/* *****
 * Add theme supports
 * *****/

add_action('after_setup_theme', 'noair_add_theme_supports');

function noair_add_theme_supports()
{
    add_theme_support('post-thumbnails', ['post', 'product', 'bio', 'publication', 'partner']);
}


/*****
 * Disable the WP Gutenberg Editor
 * *****/

add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
    return false;
}



