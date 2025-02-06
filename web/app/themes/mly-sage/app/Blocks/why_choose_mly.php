<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class why_choose_mly extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Why_Choose_Mly';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A custom block displaying a "Why Choose MLY" section with geometric figures and descriptions.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Why_Choose_Mly block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'features' => $this->features(),
            'small_text' => $this->getSmallText(get_field('small_text'), get_field('boldedText1')),
            'title' => $this->getTitle(get_field('title'), get_field('boldedText2')),
            'button_text' => get_field('button_text'),
        ];
    }

    public function getSmallText($smallText,$boldedText1)
    {
        return str_replace($boldedText1,
            '<span class="highlight">' . $boldedText1 . '</span>',
            $smallText
        );

    }

    public function getTitle($title,$boldedText2)
    {
        return str_replace($boldedText2,
            '<span class="highlight">' . $boldedText2 . '</span>',
            $title
        );
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('why__choose__mly');

        $fields
            ->addText('small_text', [
                'label' => 'Small Text',
                'instructions' => 'Small text to be displayed over the horizontal line.',
                'required' => false,
            ])
            ->addText('boldedText1', [
                'label' => 'Bolded Text 1',
                'instructions' => 'Bolded text in Text displayed over the horizontal line.',
            ])
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Title to be displayed below the horizontal line.',
            ])
            ->addText('boldedText2', [
                'label' => 'Bolded Text 2',
                'instructions' => 'Bolded text in Title displayed below the horizontal line.',
                'required' => true,
            ])
            ->addRepeater('features', [
                'label' => 'Features',
                'layout' => 'block',
            ])
            ->addImage('image', [
                'label' => 'Feature Image',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ])
            ->addText('alt', [
                'label' => 'Image Alt Text',
            ])
            ->addTextarea('description', [
                'label' => 'Description',
            ])
            ->endRepeater()
            ->addText('button_text', [
                'label' => 'Button Text',
            ]);

        return $fields->build();
    }

    private function features()
    {
        $features = get_field('features') ?: [];
        $defaultImages = [
            \Roots\asset('images/why_mly/1.png')->uri(),
            \Roots\asset('images/why_mly/2.png')->uri(),
            \Roots\asset('images/why_mly/3.png')->uri(),
            \Roots\asset('images/why_mly/4.png')->uri(),
            \Roots\asset('images/why_mly/5.png')->uri(),
            \Roots\asset('images/why_mly/6.png')->uri(),
        ];

        foreach ($features as $index => &$feature) {
            if (empty($feature['image'])) {
                $feature['image'] = $defaultImages[$index % count($defaultImages)];
            }
        }

        return $features;
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

    private function getItems():array
    {
        $items=get_field('items') ?: [];

        $defaultIcons = [
            \Roots\asset("images/why_mly/1.png")->uri(),
            \Roots\asset("images/why_mly/2.png")->uri(),
            \Roots\asset("images/why_mly/3.png")->uri(),
            \Roots\asset("images/why_mly/4.png")->uri(),
            \Roots\asset("images/why_mly/5.png")->uri(),
            \Roots\asset("images/why_mly/6.png")->uri(),
        ];

        return array_map(function ($item,$index) use ($defaultIcons) {
            $defaultIconURL=$defaultIcons[$index % count($defaultIcons)];

            if(empty($item['icon']['url'])) {
                $item['icon']['url']=$defaultIconURL;
            }
            if(empty($item['icon']['alt'])) {
                $item['icon']['alt']=$item['description'];
            }

            return $item;
        },$items,array_keys($items));
    }
}
