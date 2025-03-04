<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

// Register navigation menu
function register_mly_navigation()
{
    register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', 'your-theme-text-domain')
    ));
}
add_action('after_setup_theme', 'register_mly_navigation');

add_action('wp_ajax_filter_portfolios', 'filter_portfolios_by_tag');
add_action('wp_ajax_nopriv_filter_portfolios', 'filter_portfolios_by_tag');

function filter_portfolios_by_tag()
{
    if (empty($_POST['tag_slug'])) {
        wp_send_json_error(['message' => 'Tag slug is required.']);
    }

    $tag_slug = sanitize_text_field($_POST['tag_slug']);

    $args = [
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'portfolio-tag',
                'field' => 'slug',
                'terms' => $tag_slug,
            ],
        ],
    ];

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        wp_send_json_error(['message' => 'No portfolios found.']);
    }

    ob_start();

    while ($query->have_posts()) {
        $query->the_post();
        ?>
        <a href="<?php the_permalink(); ?>" class="portfolio-link" target="_blank" rel="noopener noreferrer">
            <div class="portfolio-item">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-image">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                <?php endif; ?>
                <div class="portfolio-info">
                    <h3 class="portfolio-title"><?php the_title(); ?></h3>
                    <p class="portfolio-description"><?php the_excerpt(); ?></p>
                    <div class="portfolio-arrow-image">
                        <img src="<?php echo Roots\asset('images/partner/Rightarrow.png')->uri(); ?>" alt="arrow">
                    </div>
                </div>
            </div>
        </a>
        <?php
    }

    wp_reset_postdata();

    $html = ob_get_clean();
    wp_send_json_success(['html' => $html]);
}

add_action('wp_enqueue_scripts', 'enqueue_ajax_scripts');
function enqueue_ajax_scripts()
{
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/scripts/ajax-filter.js', ['jquery'], null, true);

    wp_localize_script('ajax-filter', 'wpAjax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}

/*for troubleshooting uploads*/
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
