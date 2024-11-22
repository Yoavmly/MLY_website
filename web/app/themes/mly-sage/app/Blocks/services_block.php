<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class services_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Services Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A block consist of subblocks detailing various services provided.';

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
    public $keywords = ['services','block','details'];

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
    public $mode = 'edit';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = 'wide';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Services Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'services' => $this->getServices(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('services_block');

        $fields
            ->addRepeater('services',[
                'label'=>'Services',
                'instructions' => 'Add the details for each service.',
                'min'=>1,
                'layout' => 'block',
            ])
                ->addText('title',[
                    'label' => 'Title',
                    'instructions' => 'Add the title for each service.',
                    'required' => true,
                ])
                ->addTextarea('description',[
                    'label' => 'Description',
                    'instructions' => 'Add the description for each service.',
                    'required' => true,
                ])
                ->addUrl('url', [
                    'label' => 'Link',
                    'instructions' => 'Provide the URL for this service.',
                    'required' => false,
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

    public function getServices()
    {
//        return get_field('services') ?: [];

        $acfservices=get_field('services');

        $images=[
            \Roots\asset("images/services/1.png")->uri(),
            \Roots\asset("images/services/2.png")->uri(),
            \Roots\asset("images/services/3.png")->uri(),
            \Roots\asset("images/services/4.png")->uri(),
        ];

        //Mapping each service to an image in a cyclic manner
        return array_map(function($service,$index) use ($images) {
            $icon = $images[$index % count($images)];//Looping through the images array
            $url = $service['url'] ?? '#';
            return [
                'icon'=>$icon,
                'title'=>$service['title'],
                'description'=>$service['description'],
                'url'=>$url,

            ];
        },$acfservices,array_keys($acfservices));
    }
}
