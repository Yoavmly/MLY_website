<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class mly_main_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'mly-main-block';

    /**
     * The block title.
     *
     * @var string
     */
    public $title = 'MLY Main Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A hero section block with title, highlighted text, subtitle, and a button.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'theme';

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
    public $keywords = ['hero', 'intro', 'header'];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => get_field('title'),
            'highlighted_text' => get_field('highlighted_text'),
            'subtitle' => get_field('subtitle'),
            'button_text' => get_field('button_text'),
            'button_link' => get_field('button_link'),

        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
       $mly_main_block= Builder::make('Mly Main Block');

        $mly_main_block
            ->addText('title', ['label' => 'Title'])
            ->addText('highlighted_text', ['label' => 'Highlighted Text'])
            ->addText('subtitle', ['label' => 'Subtitle'])
            ->addText('button_text', ['label' => 'Button Text'])
            ->addUrl('button_link', ['label' => 'Button Link'])
            ->addLink('talk', ['label' => 'Talk'])
            ->addText('test', ['label' => 'Test']);

            return $mly_main_block->build();
    }

    /**
     * Assets enqueued when rendering the block.
     */
    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        wp_enqueue_style('mly-main-block-editor-style', get_template_directory_uri() . 'web/app/themes/mly-sage/resources/styles/Blocks/_mly_main_block.scss', [], null, 'all');
    }

}
