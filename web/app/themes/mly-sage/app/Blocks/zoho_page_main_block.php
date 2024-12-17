<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class zoho_page_main_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Zoho_Page_Main_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Zoho page main block';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Zoho_Page_Main_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $image = get_field('image');
        $title = get_field('title');
        $description = get_field('description');


        $image_url = '';
        if (is_array($image)) {
            $image_url = isset($image['url']) ? $image['url'] : '';
        } elseif (is_string($image)) {
            $image_url = $image;
        } else {
            $image_url = asset('images/partner/5.png')->uri();
        }

        $description_text = is_string($description) ? $description : '';

        $title_text = is_string($title) ? $title : 'Default Title';

        return [
            'title' => $title_text,
            'image' => $image_url,
            'description' => $description_text,
            'logo_title' => get_field('logo_title'),
            'logo_image' => get_field('image_2'),
            'logo_button_link' => get_field('logo_button_link'),
            'logo_button_text' => get_field('logo_button_text'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('zoho__page__main__block');

        $fields
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Enter the title for the partnership.',
                'required' => true,
            ])
            ->addImage('image', [
                'label' => 'Image',
                'instructions' => 'Upload the image for the partnership.',
                'required' => false,
                'return_format' => 'url',
            ])
        ->addTextarea('description', [
            'label' => 'Description',
            'instructions' => 'Enter the description for the partnership.',
            'required' => false,
        ])
            ->addImage('image2', [
                'label' => 'Image 2',
                'instructions' => 'Upload the logo image of the partner.',
                'required' => false,
            ])
            ->addText('logo_title',[
                'label' => 'Logo Title',
                'instructions' => 'Enter the title for the partnership.',
                'required' => false,
            ])
            ->addLink('logo_button_link', [
                'label' => 'Logo Button Link',
                'instructions' => 'Enter the link for the partnership.',
                'required' => false,
                'return_format' => 'url',
            ])
            ->addText('logo_button_text', [
                'label' => 'Logo Button Text',
                'instructions' => 'Enter the text for the partnership.',
                'required' => false,
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
