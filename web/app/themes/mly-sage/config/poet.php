<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Here you may specify the post types to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post' => [
        'portfolio' => [
            'enter_title_here' => 'Enter Portfolio title',
            'menu_icon' => 'dashicons-portfolio',
            'supports' => ['title','editor', 'author', 'revisions', 'thumbnail', 'block', 'excerpt', 'custom-fields'],
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'portfolios'],
            'labels' => [
                'singular' => 'Portfolio',
                'plural' => 'Portfolios',
            ]
        ],
        'role' =>[
            'enter_title_here' => 'Enter Role title',
            'menu_icon' => 'dashicons-admin-users',
            'supports' => ['title','editor', 'author', 'revisions', 'thumbnail'],
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'roles'],
            'labels' => [
                'singular' => 'Role',
                'plural' => 'Roles',
            ]
        ],
        'member' => [
            'enter_title_here' => 'Enter Employee Name',
            'menu_icon' => 'dashicons-admin-users',
            'supports' => ['title', 'author', 'revisions', 'thumbnail', 'editor'],
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'employees'],
            'labels' => [
                'singular' => 'Employee',
                'plural' => 'Employees',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the taxonomies to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'taxonomy' => [
        'portfolio-tag' => [
            'links' => ['portfolio'],
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'portfolio-tags'],
            'labels' => [
                'singular' => 'Portfolio Tag',
                'plural' => 'Portfolio Tags',
            ]
        ],
        'location-types' => [
            'links' => ['role','member'],
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'Location-Type'],
            'labels' => [
                'singular' => 'Location Type',
                'plural' => 'Location Types',
            ]
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Blocks
    |--------------------------------------------------------------------------
    |
    | Here you may specify the block types to be registered by Poet and
    | rendered using Blade.
    |
    | Blocks are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the block `sage/accordion`, your block view would be located at:
    |   ↪ `views/blocks/accordion.blade.php`
    |
    | Block views have the following variables available:
    |   ↪ $data    – An object containing the block data.
    |   ↪ $content – A string containing the InnerBlocks content.
    |                Returns `null` when empty.
    |
    */

    'block' => [
//         'sage/portfolio-block',
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block categories to be registered by Poet for use
    | in the editor.
    |
    */

    'block_category' => [
        // 'cta' => [
        //     'title' => 'Call to Action',
        //     'icon' => 'star-filled',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Patterns
    |--------------------------------------------------------------------------
    |
    | Here you may specify block patterns to be registered by Poet for use
    | in the editor.
    |
    | Patterns are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the pattern `sage/hero`, your pattern content would be located at:
    |   ↪ `views/block-patterns/hero.blade.php`
    |
    | See: https://developer.wordpress.org/reference/functions/register_block_pattern/
    */

    'block_pattern' => [
        // 'sage/hero' => [
        //     'title' => 'Page Hero',
        //     'description' => 'Draw attention to the main focus of the page, and highlight key CTAs',
        //     'categories' => ['all'],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Pattern Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block pattern categories to be registered by Poet for
    | use in the editor.
    |
    */

    'block_pattern_category' => [
        'all' => [
            'label' => 'All Patterns',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor Palette
    |--------------------------------------------------------------------------
    |
    | Here you may specify the color palette registered in the Gutenberg
    | editor.
    |
    | A color palette can be passed as an array or by passing the filename of
    | a JSON file containing the palette.
    |
    | If a color is passed a value directly, the slug will automatically be
    | converted to Title Case and used as the color name.
    |
    | If the palette is explicitly set to `true` – Poet will attempt to
    | register the palette using the default `palette.json` filename generated
    | by <https://github.com/roots/palette-webpack-plugin>
    |
    */

    'palette' => [
        // 'red' => '#ff0000',
        // 'blue' => '#0000ff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Menu
    |--------------------------------------------------------------------------
    |
    | Here you may specify admin menu item page slugs you would like moved to
    | the Tools menu in an attempt to clean up unwanted core/plugin bloat.
    |
    | Alternatively, you may also explicitly pass `false` to any menu item to
    | remove it entirely.
    |
    */

    'admin_menu' => [
//         'gutenberg',
//            'Portfolio',
    ],

];
