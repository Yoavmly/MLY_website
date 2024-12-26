<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class formiddable_form_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Formiddable_Form_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Contact Us Block implemented using formiddable-form(free).';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Formiddable_Form_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
                'title' => $this->getTitle(get_field('title'), get_field('highlightedText')),
                'form_id'=>get_field('form_id'),
        ];
    }

    public function getTitle($title,$highlightedText)
    {
        return str_replace($highlightedText,
            '<span class="highlight">' . $highlightedText . '</span>',
            $title
        );
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('formiddable__form__block');

        $fields
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Enter the title of the form ',
                'required' => true,
            ])
            ->addText('highlightedText', [
                'label' => 'Highlighted Text',
                'instructions' => 'Enter the highlighted text of the form in the title (Case Sensitive)',
            ])
            ->addNumber('form_id', [
                'label' => 'Form ID',
                'instructions' => 'Enter the ID of the form ',
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
}
