<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use WP_Query;

class nextPortfolio extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Next Portfolio';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'this is for upcoming portfolio, to be put inside another portfolio to display next portfolio';

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
        'next_portfolio_item' => [
            'title' => 'Example Portfolio Item',
            'permalink' => '#',
            'excerpt' => 'This is an example portfolio item excerpt.',
        ],
    ];

    /**
     * The block template.  Remove the template since you're handling the full rendering.
     *
     * @var array
     */
    //public $template = [
    //    'core/heading' => ['placeholder' => 'Hello World'],
    //    'core/paragraph' => ['placeholder' => 'Welcome to the Next Portfolio block.'],
    //];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'next_portfolio_item' => $this->getNextPortfolioItem(),
            'block' => $this,
        ];
    }

    /**
     * The block field group. - Remove the fields, as you're just displaying content.
     */
    public function fields(): array
    {
        return [];
    }

    /**
     * Retrieve the Next Portfolio Item.
     *
     * @return array|null
     */
    public function getNextPortfolioItem()
    {
        global $post;

        if (!$post) {
            return null;
        }

        $current_post_id = $post->ID;
        $portfolio_cpt = 'portfolio';

        $args = array(
            'post_type' => $portfolio_cpt,
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'ASC',
            'date_query' => array(
                array(
                    'after' => get_the_date('Y-m-d H:i:s', $current_post_id),
                ),
            ),
            'post_status' => 'publish',
            'no_found_rows' => true,
            'suppress_filters' => true,
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();

                $next_portfolio_item = [
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'excerpt' => get_the_excerpt(),
                ];

                wp_reset_postdata();
                return $next_portfolio_item;
            }
        }

        wp_reset_postdata();
        return null;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
