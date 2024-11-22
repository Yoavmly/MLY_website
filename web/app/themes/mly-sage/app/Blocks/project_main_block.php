<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use function Roots\asset;

class project_main_block extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Project_Main_Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Project showcasing block in Home page';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Project_Main_Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
//            'items' => $this->items(),
            'title' => get_field('title'),
            'view_all_projects_link' => get_field('view_all_projects_link'),
            'project_block' => $this->getProjectBlocks(),
        ];
    }

    /**
     * The block field group.
     */
    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('project__main__block');

        $fields
            ->addText('title', [
                'label' => 'Title',
                'required' => true,
                'instructions' => '',
            ])
            ->addRepeater('project_block', [
                'repeater' => true,
                'layout' => 'block',
                'instructions' => '',
                'button_label' => 'Add Project',
                'return_format' => 'array',
            ])
            ->addImage('image', [
                'label' => 'project_image',
                'required' => false,
                'instructions' => '',
            ])
            ->addText('title_project', [
                'label' => 'project_title',
                'required' => true,
                'instructions' => '',
            ])
            ->addText('description_project', [
                'label' => 'project_description',
                'required' => true,
                'instructions' => '',
            ])
            ->addUrl('url', [ // Add the URL field here
                'label' => 'Project URL',
                'required' => false,
                'instructions' => 'Provide the URL for the project.',
            ])
            ->endRepeater()
            ->addUrl('view_all_projects_link', [
                'label' => 'View All Projects',
                'instructions' => 'Provide the URL for the "View All Projects" button.',
                'required' => true,
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
        //
    }
    private function getProjectBlocks(): array
    {
        $projects = get_field('project_block') ?: [];

        return array_map(function ($project) {
            return [
                'image' => !empty($project['image']['url'])
                    ? $project['image']
                    : ['url' => asset('images/partner/project1.png')->uri()],
                'title_project' => $project['title_project'] ?? '',
                'description_project' => $project['description_project'] ?? '',
                'url' => $project['url'] ?? '',
            ];
        }, $projects);
    }
}
