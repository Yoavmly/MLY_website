<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class why_mly_main_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Why_Mly_Main_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'primary for this glowing text effect onclick';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Why_Mly_Main_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'paragraph_1' => $this->formattedParagraph(get_field('paragraph_1'),get_field('highlighted_1')),
            'paragraph_2' => $this->formattedParagraph(get_field('paragraph_2'),get_field('highlighted_2')),
            'properties' => get_field('properties'),
            'button_text' => get_field('button_text'),
        ];
    }

    private function formattedParagraph($paragraph,$highlightedText)
    {
        $paragraph = str_replace('\br', '<br>', $paragraph);

        return str_replace(
            $highlightedText,
            '<span class="highlight">' . esc_html($highlightedText) . '</span>',
            $paragraph
        );
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('why__mly__main__block');

        $fields
            ->addText('paragraph_1',[
                'label' => 'Paragraph 1',
                'instructions' => `Enter Paragraph here (this would appear on 4th click on the heading!) [for linebreaks try using \br instead of <br>]`,
                'required' => true,
            ])
            ->addText('highlighted_1',[
                'label'=>'Highlighted Text',
                'instruction'=>'Enter Text to be highlighted inside the paragraph above',
                'required'=>true,
            ])
            ->addText('paragraph_2',[
                'label' => 'Paragraph 2',
                'instructions' => `Enter paragraph here (this would appear on scroll after the horizontal line) [for linebreaks try using \br instead of <br>]`,
                'required' => true,
            ])
            ->addText('highlighted_2',[
                'label'=>'Highlighted Text',
                'instruction'=>'Enter Text to be highlighted inside the paragraph above',
                'required'=>true,
            ])
            ->addText('button_text',[
                'label'=>'Button Text',
                'required'=>true,
                'return_format'=>'text'
            ])
            ->addRepeater('properties',[
                'label'=>'Enter the Properties',
                'required'=>true,
                'return_format'=>'array'
            ])
            ->addText('digits',[
                'label'=>'Number',
                'type'=>'number',
                'required'=>true,
            ])
            ->addText('data',[
                'label'=>'Text',
                'type'=>'text',
                'required'=>true,
            ])
            ->endRepeater()
            ;

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
