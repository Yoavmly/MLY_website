<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class portfolio_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Portfolio_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'This is the block consisting of various portfolio profiles in a a grid layout.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Portfolio_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $tags = get_field('tags') ?: [];
        $portfolios = get_field('portfolios') ?: [];

        // Validate and sanitize tags
        $validatedTags = array_map(function ($tag) {
            return isset($tag['tag']) ? sanitize_text_field($tag['tag']) : null;
        }, $tags);
        $validatedTags = array_filter($validatedTags); // Remove null/invalid entries

        // Group portfolios by tags
        $groupedPortfolios = [];
        foreach ($portfolios as $portfolio) {
            // Validate portfolio fields
            $title = isset($portfolio['title_portfolio']) ? sanitize_text_field($portfolio['title_portfolio']) : 'Untitled Project';
            $description = isset($portfolio['description_portfolio']) ? sanitize_text_field($portfolio['description_portfolio']) : '';
            $image = isset($portfolio['image']) ? $portfolio['image'] : null;
            $url = isset($portfolio['url']) ? esc_url($portfolio['url']) : '#';
            $tags = isset($portfolio['tag_selector']) ? $portfolio['tag_selector'] : [];

            foreach ($tags as $tag) {
                if (!isset($groupedPortfolios[$tag])) {
                    $groupedPortfolios[$tag] = [];
                }
                $groupedPortfolios[$tag][] = [
                    'title' => $title,
                    'description' => $description,
                    'image' => $image,
                    'url' => $url,
                ];
            }
        }

        return [
            'title' => get_field('title') ?: 'Our Portfolio',
            'highlighted_text' => get_field('highlighted_text') ?: 'Portfolio',
            'tags' => $validatedTags,
            'groupedPortfolios' => $groupedPortfolios,
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('portfolio__block');

        $fields
            ->addText('title', [
                'label' => 'Title',
                'type' => 'text',
                'required' => true,
                'instructions' => 'Enter the text for the headline ',
            ])
            ->addText('highlighted_text', [
                'label' => 'Highlighted text',
                'type' => 'text',
                'required' => true,
                'instructions' => 'Enter the highlighted text',
            ])
            ->addRepeater('tags', [
                'repeater' => true,
                'instructions' => '',
                'button_label' => 'Add tags',
                'return_format' => 'array',
            ])
                ->addText('tag', [
                    'label' => 'Tag',
                    'type' => 'text',
                    'required' => true,
                    'instructions' => 'Enter the tag name',
                ])
            ->endRepeater()
            ->addRepeater('portfolios', [
                'repeater' => true,
                'layout' => 'block',
                'instructions' => '',
                'button_label' => 'Add Portfolios',
                'return_format' => 'array',
            ])
                ->addImage('image', [
                    'label' => 'project_image',
                    'required' => false,
                    'instructions' => '',
                ])
                ->addText('title_portfolio', [
                    'label' => 'portfolio_title',
                    'required' => true,
                    'instructions' => 'Enter the title for the portfolio',
                ])
                ->addText('description_portfolio', [
                    'label' => 'portfolio_description',
                    'required' => true,
                    'instructions' => 'Describe this portfolio',
                ])
                ->addUrl('url', [
                    'label' => 'Portfolio URL',
                    'required' => false,
                    'instructions' => 'Provide the URL for the portfolio page.',
                ])
                ->addSelect('tag_selector', [
                    'label' => 'Portfolio tags',
                    'instructions' => 'Select the portfolio tags',
                    'required' => true,
                    'multiple' => true,
                    'choices' => function () {
                    //fetch existing tags to add to the repeater
                        $tags = get_field('tags');
                        return array_column($tags, 'tag');//extract only tag names
                    }
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
}
