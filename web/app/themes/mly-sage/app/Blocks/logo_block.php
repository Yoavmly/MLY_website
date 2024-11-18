<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class logo_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Logo Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A block to showcase logos with optional links.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'media';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'format-image';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['logos', 'carousel', 'images'];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'logos' => get_field('logos') ?: [],
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('LogoBlock');

        $fields
            ->addRepeater('logos', [
                'label' => 'Logos',
                'button_label' => 'Add Logo',
                'min' => 1,
                'layout' => 'table',
            ])
            ->addImage('image', [
                'label' => 'Logo Image',
                'instructions' => 'Select an image for the logo. Recommended size: 90px x 60px.',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
            ])
            ->addUrl('link', [
                'label' => 'Logo Link',
                'instructions' => 'Optional: Add a URL to link the logo.',
            ])
            ->endRepeater();

        return $fields->build();
    }
}
