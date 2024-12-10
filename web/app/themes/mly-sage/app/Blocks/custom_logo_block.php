<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class custom_logo_block extends Block
{
    public $name = 'Custom Logo Block';
    public $description = 'Displays a block of logos based on company names and links.';
    public $category = 'media';
    public $icon = 'format-image';
    public $keywords = ['logos', 'carousel', 'brand'];

    public function with(): array
    {
        return [
            'logos' => get_field('logos') ?: [],
        ];
    }

    public function fields(): array
    {
        return Builder::make('CustomLogoBlock')
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
            ->endRepeater()
            ->build();
    }
}
