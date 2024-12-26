<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Horizontal_line_Block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Horizontal_Line_ Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'this geenrates a horizontal line with some text to write above it';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Horizontal_Line_ Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
//            'items' => $this->items(),
                'checkbox' => get_field('checkbox'),
                'text_input' => $this->getText(get_field('text_input'), get_field('highlightedText')),
        ];
    }

    public function getText($text,$highlightedText)
    {
        return str_replace($highlightedText, '<span class="highlight">'.$highlightedText.'</span>', $text);
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('horizontal__line__block');

        $fields
            ->addCheckbox('checkbox',[
                'label' => 'Checkbox',
                'instruction' => 'click to enable text input field',
            ])
            ->addText('text_input', [
                'label' => 'Text_input',
                'instruction' => 'Enter text to be displayed above the Horizontal Line',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_checkbox',//for adjusting field key dynamically
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->addText('highlightedText', [
                'label' => 'highlightedText',
                'instruction' => 'Enter text to be highlighted above the Horizontal Line',
                'required' => true,
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
