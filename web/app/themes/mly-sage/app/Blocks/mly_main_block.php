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
    public $title = 'mly Main Block';

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
            'title' => $this->get_title(),
            'subtitle' => get_field('subtitle') ?: '',
            'button_text' => get_field('button_text') ?? '',
        ];
    }


    /**
     * The block field group.
     */
    public function fields(): array
    {
        $mly_main_block= Builder::make('Mly Main Block');

        $mly_main_block
            ->addText('title', ['label' => 'Title','instructions'=> 'Use "\br" (backslash br) to insert a line break in the title.',])
            ->addText('highlighted_text', ['label' => 'Highlighted Text'])
            ->addText('subtitle', ['label' => 'Subtitle'])
            ->addText('button_text', ['label' => 'Button Text (Button Redirected to Contact Form)']);

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

    function get_title()
    {
     $title= get_field('title') ?: '';
     $highlightedText = get_field('highlighted_text') ?: '';

        // Replace the delimiter with <br> tags
        $title = str_replace('\br', '<br>', $title);

        return str_replace(
            $highlightedText,
            '<span class="highlight">' . esc_html($highlightedText) . '</span>',
            $title
        );
    }

}
