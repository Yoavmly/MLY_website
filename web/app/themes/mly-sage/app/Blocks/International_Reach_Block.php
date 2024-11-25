<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class International_Reach_Block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'International_ Reach_ Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A beautiful block depicting the companies global reach and future visions.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'text';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

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
        'core/paragraph' => ['placeholder' => 'Welcome to the International_ Reach_ Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'image' => $this->getImage(),
            'title' => get_field('title'),
            'description' => get_field('description'),
            'button_title' => get_field('button_title'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('international__reach__block');

        $fields
            ->addImage('image', [
                'label' => 'Image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'instructions' => 'Add the image for this block here.',
            ])
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Add the title here.',
                'required' => true,
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'instructions' => 'Add the description here.',
                'required' => true,
            ])
            ->addText('button_title', [
                'label' => 'Button Title',
                'instructions' => 'Add the button title here.',
                'required' => true,
            ]);


        return $fields->build();
    }


    private function getImage()
    {
        $image = get_field('image');
        if (empty($image)) {
            $image = \Roots\asset('images/world.png')->uri();
        }
        return $image;
    }
    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function items()
    {
        return get_field('items') ?: [];
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
