<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class zohoPageIconBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Zoho Page Icon Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'this constitues description ,Highlighted text and set of logos aligned at center.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Zoho Page Icon Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'paragraph_1' => get_field('paragraph_1', $this->block->id) ?: '',
            'paragraph_2' => get_field('paragraph_2', $this->block->id) ?: '',
            'logo_title' => get_field('logo_title', $this->block->id) ?: '',
            'images' => $this->getImages(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('zoho_page_icon_block');

        $fields
            ->addTextarea('paragraph_1', [
                'label' => 'First Paragraph',
                'instructions' => 'Enter the first paragraph of the description block.',
                'rows' => 4,
                'required' => true,
            ])
            ->addTextarea('paragraph_2', [
                'label' => 'Second Paragraph',
                'instructions' => 'Enter the second paragraph of the description block.',
                'rows' => 4,
                'required' => true,
            ])
            ->addText('logo_title', [
                'label' => 'Logo Title',
                'instructions' => 'Enter the title that appears above the various logos of partners.',
                'required' => true,

            ])
            ->addGallery('images', [
                'label' => 'Fancy Logos',
                'instructions' => 'Add images for the logos.',
                'min' => 1,
                'max' => 20,
                'insert' => 'append',
                'library' => 'all',
                'return_format' => 'array',  // Crucial for proper image retrieval

            ])
            ;
        return $fields->build();
    }
    private function getImages(): array
    {
        $images = get_field('images', $this->block->id) ?: [];  // get_field from current block ID

        $result = array_map(function ($image) {

            // Check for empty or invalid array, prevent php errors
            if (empty($image) || !is_array($image)) {
                return null;
            }

            // Attempt to get ACF fields values
            $imageUrl = $image['url'] ?? '';   // URL of the image from wordpress
            $imageAlt = $image['alt'] ?? '';
            $titleImage = $image['title'] ?? 'Image';
            $linkTarget = $image['linkTarget'] ?? '';

            return [
                'url' => $imageUrl,    // Required Field
                'alt' => $imageAlt,    // Alt of Image to pass to <img> Tag
                'title' => $titleImage,     // Optional text
                'image_url' => $linkTarget, //Target external url to link logo with url from acf
            ];

        }, $images);

        //Remove NULL results (errors to display and improve loop display).
        return array_filter($result);
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
