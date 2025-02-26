<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class newServiceBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'New Service Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'this is new service with updated background with better handling.';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the New Service Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('new_service_block');

        $fields
            ->addRepeater('items')
                ->addText('title',[
                    'label' => 'Title',
                    'instructions' => 'Add a title for this new service.',
                    'required' => true,
                ])
                ->addText('bolded_text', [
                    'label' => 'Bolded Text',
                    'instructions' => 'Add the Word(to be bolded) present in the Title for this service.(Case-Sensitive)',
                    'required' => false,
                ])
                ->addText('description',[
                    'label' => 'Description',
                    'instructions' => 'Add a description for this new service.',
                    'required' => true,
                ])
                ->addUrl('url',[
                    'label' => 'URL',
                    'instructions' => 'Add a URL for this new service.',
                    'required' => true,
                ])
            ->endRepeater();

        return $fields->build();
    }

    public function getTitle($title, $boldedText)
    {
        return str_replace($boldedText,
            '<b>'.esc_html($boldedText).'</b>',
            $title
        );
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function items()
    {
        $items = get_field('items');
        $hardcodedImage= [
            \Roots\asset('images/servicesImages/1.png'),
            \Roots\asset('images/servicesImages/2.png'),
            \Roots\asset('images/servicesImages/3.png'),
            \Roots\asset('images/servicesImages/4.png'),
        ];

        return array_map(
            function ($item , $index) use ($hardcodedImage,) {
                $colorBlock = [
                    '#57c1fa', '#4dfbf1', '#8ffb4d', '#4dfbb2'
                ];
                $icon = $hardcodedImage[$index % count($hardcodedImage)];
                $url = $item['url'];
                $title = $this->getTitle($item['title'], $item['bolded_text']);
                $description = $item['description'];

                // Calculate hover translate based on description length (assumption)
                $descriptionLength = strlen($description);
                $hoverTranslate = '-50px'; // Default for short descriptions

                if ($descriptionLength > 100 && $descriptionLength <= 200) {
                    $hoverTranslate = '-80px'; // Medium descriptions, adjust as needed
                } elseif ($descriptionLength > 200) {
                    $hoverTranslate = '-120px'; // Long descriptions, adjust as needed
                }

                return [
                    'icon' => $icon,
                    'url' => $url,
                    'title' => $title,
                    'description' => $description,
                    'color' => $colorBlock[$index % count($hardcodedImage)],
                    'hover_translate' => $hoverTranslate,
                ];
            },$items,array_keys($items)
        );
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
