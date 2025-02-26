<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class ContactUs extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Contact Us';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Get-in-Touch Block';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Contact Us block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $videoSource = get_field('video_source');
        $videoLink = get_field('video_link');
        $videoFile = get_field('video_file');
        $heading = get_field('heading');
        $formId = get_field('form_id');

        return [
            'video_source' => $videoSource ?: 'url', // Default to 'url'
            'video_link' => $videoLink ?: null,
            'video_file' => $videoFile ?: null,
            'heading' => $heading ?: '',
            'form_id' => $formId ?: null,
        ];
    }
    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('contact_us');

        $fields
            ->addSelect('video_source', [
                'label' => 'Video Source',
                'instructions' => 'Choose how you want to add the video.',
                'choices' => [
                    'url' => 'Enter a Video URL',
                    'file' => 'Upload a Video File',
                ],
                'default_value' => 'url', // Default to URL for simplicity
            ])
            ->addText('video_link', [
                'label' => 'Video URL',
                'instructions' => 'Enter the URL of the video (YouTube, Vimeo, etc.):',
                'type' => 'url',
                'conditional_logic' => [
                    [
                        'field' => 'video_source',
                        'operator' => '==',
                        'value' => 'url',
                    ],
                ],
            ])
            ->addFile('video_file', [
                'label' => 'Video File',
                'instructions' => 'Upload a video file (MP4, MOV, etc.):',
                'accepted_files' => 'video/*',
                'max_size' => '10MB',
                'conditional_logic' => [
                    [
                        'field' => 'video_source',
                        'operator' => '==',
                        'value' => 'file',
                    ],
                ],
            ])
            ->addText('heading', [
                'label' => 'Heading',
                'instructions' => 'Enter the heading text.',
            ])
            ->addNumber('form_id',[
                'label' => 'Form ID',
                'instructions' => 'Add the Formiddable Form ID to be included here: ',
            ])
        ;

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
