<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class contact_form_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Contact_Form_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A beautiful block consisting of a form for the customers to quickly connect with us in an effective manner.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Contact_Form_Block block.'],
    ];

    private function getPositions():array
    {
        $positions = get_field('positions') ?? [];

        $positions =  array_map(function ($item) {
            return $item['position'] ?? '';
        }, $positions);
        return $positions;
    }

    private function getPurposes():array
    {
         $purposes = get_field('purposes') ?? [];

        $purposes=array_map(function ($item) {
            return $item['purpose'] ?? '';
        }, $purposes);
        return $purposes;
    }

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'form_action' => get_field('form_action') ?? '#',
            'positions' => $this->getPositions(),
            'purposes' => $this->getPurposes(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        return Builder::make('make_it_happen_form')
            ->addUrl('form_action', [
                'label' => 'Form Action URL',
                'instructions' => 'The URL where the form should be submitted.',
            ])
            ->addRepeater('positions', [
                'label' => 'Positions',
                'instructions' => 'Add positions for the dropdown.',
                'min' => 1,
                'layout' => 'block',
            ])
            ->addText('position', [
                'label' => 'Position',
                'instructions' => 'Enter a position.',
            ])
            ->endRepeater()
            ->addRepeater('purposes', [
                'label' => 'Purposes',
                'instructions' => 'Add purposes for the dropdown.',
                'min' => 1,
                'layout' => 'block',
            ])
            ->addText('purpose', [
                'label' => 'Purpose',
                'instructions' => 'Enter a purpose.',
            ])
            ->endRepeater()
            ->build();
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
