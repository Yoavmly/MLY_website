<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use function Roots\asset;

class partner_block_fullwidth extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Partner Block Fullwidth';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A beautiful Block introducing your major partner.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Partner Block Fullwidth block.'],
    ];


    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
//            'items' => $this->items(),
                'logo' => $this->getLogo(),
                'title' => get_field('title'),
                'paragraph_1' => get_field('paragraph_1'),
                'paragraph_2' => get_field('paragraph_2'),
                'link' => get_field('link'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('partner_block_fullwidth');

        $fields
            ->addImage('logo', [
                'label' => 'Logo',
                'instructions' => '',
                'return_format' => 'url',
            ])
            ->addText('title', [
                'label' => 'Title',
                'instructions' => '',
                'required' => true,
            ])
            ->addTextarea('paragraph_1', [
                'label' => 'Paragraph 1',
                'instructions' => '',
                'required' => true,
            ])
            ->addTextarea('paragraph_2', [
                'label' => 'Paragraph 2',
                'instructions' => '',
                'required' => false,
            ])
            ->addUrl('link', [
                'label' => 'Link',
                'instructions' => '',
            ]);

        return $fields->build();
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

    private function getLogo()
    {
        $logo = get_field('logo');
        return $logo ?: asset('images/partner/zoho.png')->uri();
    }
}
