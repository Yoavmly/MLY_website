<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use function Roots\bundle;

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
        return [
            'title' => get_field('title') ?: 'Our Portfolio',
            'highlighted_text' => get_field('highlighted_text') ?: 'Portfolio',
//            'groupedPortfolios' => $this->get_grouped_portfolios(),
            'tags'=>$this->getTags(),
            'allPortfolios' => $this->getAllPortfolios(),
        ];
    }

    public function getAllPortfolios() : array
    {
        $query = new \WP_Query([
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ]);
        $portfolios = $query->posts;

        wp_reset_postdata(); // to reset the query after using WP_Query()

        return $portfolios;
    }

    public function getTags()
    {
        return get_terms([
            'taxonomy' => 'tags',
            'hide_empty' => true,
        ]);
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
                'required' => false,
                'instructions' => '(Use Mly_main_block for this type of styling )',
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
        bundle('portfolio')->enqueue();
    }
}
