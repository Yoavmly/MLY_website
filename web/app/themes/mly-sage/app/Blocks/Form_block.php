<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Form_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Form_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'This is Contact Form block which would ease the customers to reach us efficiently.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Form_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'form_action' => get_field('form_action') ?? '#',
            'form_fields' => $this->getFormFields(),
        ];
    }





    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('contact_form_block');

        $fields
            ->addUrl('form_action', [
                'label' => 'Form Action URL',
                'instructions' => 'The URL where the form should be submitted.',
            ])
            ->addRepeater('form_fields', [
                'label' => 'Form Fields',
                'instructions' => 'Add form fields dynamically.',
                'min' => 1,
                'layout' => 'block',
            ])
            ->addSelect('type', [
                'label' => 'Field Type',
                'choices' => [
                    'text' => 'Text Input',
                    'textarea' => 'Textarea',
                    'select' => 'Select Dropdown',
                ],
            ])
            ->addText('label', [
                'label' => 'Field Label',
                'instructions' => 'Enter the label for this field.',
            ])
            ->addText('placeholder', [
                'label' => 'Field Placeholder',
                'instructions' => 'Enter the placeholder for this field.',
            ])
            ->addText('name', [
                'label' => 'Field Name',
                'instructions' => 'Enter the name for this field (used in form submission).',
            ])
            ->addRepeater('options', [
                'label' => 'Options (for Select Dropdown)',
                'instructions' => 'Add options for the select dropdown.',
                'min' => 1,
                'conditional_logic' => [
                    [
                        'field' => 'type',
                        'operator' => '==',
                        'value' => 'select',
                    ],
                ],
            ])
            ->addText('option', [
                'label' => 'Option',
                'instructions' => 'Enter an option value.',
            ])
            ->endRepeater()
            ->addTrueFalse('required', [
                'label' => 'Required Field',
                'instructions' => 'Mark this field as required.',
                'default_value' => 0,
            ])
            ->endRepeater();

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

    private function getFormFields(): array
    {
        $fields = get_field('form_fields') ?? [];

        return array_map(function ($field) {
            return [
                'type' => $field['type'] ?? 'text',
                'label' => $field['label'] ?? '',
                'name' => $field['name'] ?? '',
                'placeholder' => $field['placeholder'] ?? '',
                'options' => $field['options'] ?? [],
                'required' => $field['required'] ?? false,
            ];
        }, $fields);
    }
}
