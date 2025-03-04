<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class information_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Information_Block'; // Keep this consistent

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A block constituting basic title and description with optional social links';

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
    public $keywords = ['information', 'content', 'social'];

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
        'title' => 'Example Title',
        'content' => 'This is some example content for the Information Block.',
        'is_socials_present' => true,
        'socials' => [
            [
                'name' => 'Facebook',
                'image' => 'https://via.placeholder.com/32', // Replace with a real image URL
                'link' => 'https://www.facebook.com/',
            ],
            [
                'name' => 'Twitter',
                'image' => 'https://via.placeholder.com/32', // Replace with a real image URL
                'link' => 'https://twitter.com/',
            ],
        ],
    ];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Information_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => get_field('title'),
            'content' => get_field('content'),
            'isSocialsPresent' => get_field('is_socials_present'),
            'socials' => get_field('socials'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('information__block');  // Make sure this is unique across your blocks

        $fields
            ->addText('title',[
                'label' => 'Title',
                'type' => 'text',
                'required' => true,
                'instructions' => 'Enter Title',
            ])
            ->addWysiwyg('content',[
                'label' => 'Content',
                'type' => 'wysiwyg',
                'required' => true,
                'instructions' => 'Enter Description',
            ])
            ->addTrueFalse('is_socials_present', [
                'label' => 'Show Social Links?',
                'instructions' => 'Enable to display social links below the title.',
                'default_value' => 0, // Default to not showing
                'ui' => 1, // Use toggle switch
            ])
            ->addRepeater('socials', [
                'label' => 'Social Links',
                'instructions' => 'Add social media links.',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'is_socials_present',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->addText('name',[
                'label' => 'Name',
                'type' => 'text',
                'required' => true,
                'instructions' => 'Enter Social Media Name',
            ])
            ->addImage('image',[
                'label' => 'Image',
                'type' => 'image',
                'required' => true,
                'instructions' => 'Upload Image',
            ])
            ->addLink('link',[
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'url',
                'required' => true,
                'instructions' => 'Enter Link',
            ])
        ->endRepeater();

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
