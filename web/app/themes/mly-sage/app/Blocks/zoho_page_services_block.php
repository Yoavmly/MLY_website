<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use StoutLogic\AcfBuilder\FieldNameCollisionException;

class zoho_page_services_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Zoho_Page_Services_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Zoho page services block';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'common';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'grid-view';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['services','feature','grid'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = ['light', 'dark'];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Zoho_Page_Services_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'services' => $this->getServices(),
        ];
    }

    /**
     * The block field group.
     * @throws FieldNameCollisionException
     */
    public function fields(): array
    {
        $fields = Builder::make('zoho__page__services__block');

        $fields
            ->addRepeater('services', [
                'label' => 'Services',
                'instructions' => '',
                'layout' => 'block',
                'max' => 6,
            ])
            ->addRepeater('icons', [
                'label' => 'Icons',
                'instructions' => 'Select the icon for the service.',
                'required' => true,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])
            ->addImage('icon', [
                'label' => 'Icon',
                'instructions' => 'Select the icon for the service for animation (minimum 2 images for transition).',
                'required' => true,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])
            ->endRepeater()
            ->addText('title', [
                'label' => 'Service Title',
                'instructions' => '',
                'required' => true,
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'instructions' => '',
                'required' => true,
                'rows' => 3,
            ])
            ->endRepeater();

        return $fields->build();
    }


    private function getServices() :array
    {
        $services = get_field('services') ?: [];

        return array_map(function ($service) { // Removed index and $images
            return [
                'icons' => $service['icons'] ?? [], // Retrieve icons from service or default to empty array.  CRITICAL!
                'title' => is_string($service['title']) ? $service['title'] : '',
                'description' => is_string($service['description']) ? $service['description'] : '',
            ];
        }, $services);
    }

    private function getImages() :array
    {
        return [
            [
                \Roots\asset('images/assests/zoho_services/1/1.png')->uri(),
                \Roots\asset('images/assests/zoho_services/1/2.png')->uri(),
            ]
            ,
            [
                \Roots\asset('images/assests/zoho_services/2/1.png')->uri(),
                \Roots\asset('images/assests/zoho_services/2/2.png')->uri(),
            ],
            [
                \Roots\asset('images/assests/zoho_services/3/1.png')->uri(),
                \Roots\asset('images/assests/zoho_services/3/2.png')->uri(),
            ],
            [
                \Roots\asset('images/assests/zoho_services/4/1.png')->uri(),
                \Roots\asset('images/assests/zoho_services/4/2.png')->uri(),
            ],
            [
                \Roots\asset('images/assests/zoho_services/5/1.png')->uri(),
                \Roots\asset('images/assests/zoho_services/5/2.png')->uri(),
            ],
            [
                \Roots\asset('images/assests/zoho_services/6/1.png')->uri(),
                \Roots\asset('images/assests/zoho_services/6/2.png')->uri(),
            ],
        ];
    }



    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function items()
    {
        return get_field('items') ?: $this->example['items'];
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
