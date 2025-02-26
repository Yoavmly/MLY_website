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
            ->addRepeater('services', [
                'label'=>'Services',
                'instructions' => 'Add the details for each service.',
                'min'=>1,
                'layout' => 'block',
            ])
                ->addText('title', [
                    'label' => 'Title',
                    'instructions' => 'Add the title for each service.',
                    'required' => true,
                ])
                ->addText('bolded_text', [
                    'label' => 'Bolded Text',
                    'instructions' => 'Add the bolded text for each service.(Case-Sensitive)',
                    'required' => true,
                ])
                ->addTextarea('description', [
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
    public function items(): array
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

    public function getServices() :array
    {
        $acfServices = get_field('services') ?: [];

        $svg1='<svg width="174" height="181" viewBox="0 0 174 181" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M171.535 129.429c-.434-.332-.924-.593-1.398-.861-5.608-3.168-50.986-28.352-51.95-28.888C90.462 84.293 91.32 84.75 90.351 84.394c-2.558-.94-5.037-1.007-7.513-.198-.476.156-.964.325-1.41.558-2.177 1.135-73.12 41.968-77.695 44.649-.447.263-.91.517-1.32.84-.41.319-.782.684-1.084 1.107-.28.393-.471.861-.48 1.345-.01.494.193.965.47 1.364.604.868 1.502 1.423 2.407 1.933 6.2 3.509 69.615 38.707 77.08 42.815.908.499 1.806 1.038 2.775 1.411 2.065.795 4.142.955 6.044.61.99-.179 1.987-.475 2.892-.918.677-.331 1.349-.705 38.059-21.812 41.435-23.82 40.396-23.237 40.971-23.674.745-.565 1.589-1.425 1.605-2.427.014-1.072-.766-1.921-1.615-2.573l-.002.005z" fill="#459DFF" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M173.169 121.417c-.059-.969-.83-1.741-1.547-2.31-.589-.468 2.919 1.451-65.089-36.287-10.15-5.631-15.479-8.543-15.986-8.736-2.54-.985-5.132-1.131-7.746-.263-.486.162-.976.338-1.429.576-2.187 1.14-72.594 41.66-77.688 44.644-.955.56-2.732 1.6-2.857 3.199-.07.929.655 1.801 1.365 2.389.41.341.856.607 1.318.875 2.71 1.568 46.714 25.991 47.29 26.311 32.722 18.166 31.756 17.609 32.446 17.901.967.407 1.985.679 3.022.823 1.037.146 2.115.132 3.15-.042a12.13 12.13 0 0 0 3-.911c1.266-.576 73.37-42.093 77.759-44.665.434-.254.889-.497 1.29-.802.726-.548 1.548-1.306 1.68-2.256.022-.15.029-.298.022-.449v.003z" fill="#688FD3" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M171.563 108.682c-.408-.31-.856-.56-1.301-.813-2.737-1.553-9.191-5.141-13.064-7.295C88.151 62.182 91.39 64.033 90.459 63.671c-2.458-.955-5.091-1.087-7.649-.233-.495.167-.995.35-1.459.59-2.235 1.162-72.906 41.839-77.693 44.649-.875.513-1.79 1.071-2.37 1.934-.605.903-.645 1.782 0 2.697.602.849 1.479 1.409 2.37 1.914 6.305 3.577 59.455 33.063 65.348 36.329 13.823 7.669 13.76 7.613 14.443 7.878 1.966.765 4.057 1.066 6.166.668.903-.169 2.134-.522 2.928-.936 2.447-1.272 73.153-41.98 77.677-44.632.457-.269.926-.527 1.346-.852.756-.585 1.565-1.399 1.612-2.413.042-1.07-.769-1.935-1.615-2.577v-.005z" fill="#688FD3" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M173.178 100.675c-.038-1.028-.922-1.844-1.683-2.422-.401-.306-.851-.546-1.289-.793-6.997-3.965-67.091-37.305-75.473-41.93-2.98-1.647-3.62-1.993-4.354-2.268-2.567-.955-5.127-1.063-7.835-.11-.479.169-.957.362-1.405.606-4.554 2.51-68.366 39.255-74.827 42.992-2.821 1.632-3.552 2.043-4.125 2.525-.394.33-.752.704-1.018 1.139-.26.421-.417.947-.335 1.444.087.512.335.976.677 1.364.332.378.711.703 1.12.999.43.315.916.56 1.38.823 5.443 3.086 68.003 37.825 76.888 42.705.942.517 1.876 1.06 2.89 1.43a11.91 11.91 0 0 0 3.11.679c2.179.181 4.442-.407 6.12-1.329 3.741-2.06 74.457-42.73 77.686-44.668.432-.258.851-.526 1.228-.865.672-.604 1.292-1.373 1.247-2.324l-.002.003z" fill="#9ACDD2" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M173.178 90.269c-.118-1.087-.969-1.875-1.808-2.486-.424-.31-.9-.553-1.355-.811-5.172-2.928-74.285-41.336-78.448-43.55-.96-.507-1.99-.855-3.05-1.083-1.994-.428-4.151-.276-6.339.571-.985.381-1.892.94-2.807 1.463-7.489 4.259-74.723 42.892-76.404 43.962-.855.544-1.815 1.322-2.081 2.35-.278 1.075.382 2.027 1.162 2.702.801.694 1.763 1.176 2.682 1.69 9.783 5.492 58.706 32.64 68.55 38.091 9.353 5.181 9.408 5.188 9.98 5.43 1.443.607 3.142.967 4.703.913a11.233 11.233 0 0 0 3.19-.558c.513-.171 1.03-.359 1.51-.609 2.171-1.129 72.413-41.552 77.766-44.691.903-.532 1.825-1.13 2.386-2.04a2.34 2.34 0 0 0 .363-1.342v-.002z" fill="#9ACDD2" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M173.183 79.984c-.05-1.039-.844-1.846-1.627-2.438-.431-.327-.907-.588-1.376-.854-5.507-3.13-60.814-33.817-66.403-36.912-12.552-6.961-12.488-6.914-13.355-7.253-2.494-.966-5.172-1.07-7.798-.155-.504.176-.992.381-1.466.628-1.794.931-74.881 42.975-77.623 44.621-.867.522-1.78 1.091-2.324 1.976-.627 1.018-.48 1.923.271 2.838.656.793 1.547 1.3 2.428 1.801 5.764 3.27 68.625 38.171 76.989 42.761.926.508 1.845 1.042 2.838 1.414 2.003.745 4.139.945 6.275.479a11.142 11.142 0 0 0 2.981-1.093c3.88-2.138 68.243-39.168 76.324-43.866.877-.51 1.803-.988 2.579-1.651.655-.562 1.343-1.376 1.289-2.296h-.002z" fill="#ABD9EE" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M173.178 69.569c-.028-1.004-.867-1.827-1.615-2.394-.403-.308-.846-.555-1.287-.804-6.697-3.796-67.269-37.406-75.508-41.952-2.737-1.512-3.533-1.955-4.302-2.253-2.465-.957-5.091-1.09-7.635-.242-.495.166-.994.345-1.459.585C79.34 23.565 9.33 63.84 3.698 67.144c-.896.527-1.799 1.082-2.404 1.95-.599.858-.656 1.785-.022 2.686.604.855 1.48 1.42 2.379 1.928 6.336 3.59 69.643 38.735 76.83 42.678 1.693.929 3.272 1.974 5.929 2.293 1.065.13 2.135.087 3.191-.091 1.014-.172 1.997-.508 2.93-.932 1.261-.571 74.518-42.777 77.618-44.595.702-.411 2.892-1.543 3.027-3.283.004-.07.004-.14 0-.21h.002z" fill="#ABD9EE" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M173.169 59.158c-.057-.971-.833-1.743-1.552-2.314-.396-.315-.841-.562-1.279-.812-7.034-3.983-63.242-35.16-72.673-40.385-6.065-3.354-6.42-3.547-7.114-3.822-2.534-1.004-5.188-1.117-7.724-.273-1.19.395-1.424.55-2.999 1.437-5.303 2.99-56.572 32.494-61.89 35.556C2.99 57.154 2.93 57.188 2.354 57.64 1.202 58.55.88 59.346.83 59.97c-.035.457.128.915.363 1.296.547.89 1.44 1.472 2.324 1.983 2.87 1.662 72.355 40.249 78.314 43.492.45.245.898.496 1.37.696 3.16 1.331 6.359 1.192 9.18-.094.67-.303-.42.341 52.825-30.28 12.208-7.025 21.66-12.462 24.935-14.381.438-.256.898-.499 1.303-.807.759-.573 1.504-1.293 1.697-2.26.031-.15.033-.305.024-.46l.005.002z" fill="#A1F7FF" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M171.526 46.41c-.432-.33-.917-.589-1.389-.854-4.933-2.787-37.944-21.111-37.368-20.792C89.483.718 91.287 1.727 90.353 1.384c-2.557-.939-5.037-1.01-7.51-.2-1.11.364-1.33.491-2.87 1.364C75.207 5.236 9.434 43.05 3.752 46.38c-.453.264-.92.517-1.33.844-.802.635-1.558 1.46-1.575 2.481-.01.485.2.953.472 1.343.624.9 1.565 1.458 2.503 1.987 5.876 3.328 69.676 38.74 76.984 42.761.914.501 1.82 1.042 2.793 1.418 2.032.781 4.106.948 6.023.602.867-.157 2.128-.52 2.899-.921 2.114-1.103 72.755-41.755 77.646-44.614.462-.273.94-.532 1.367-.859.745-.571 1.598-1.423 1.615-2.431.014-1.08-.764-1.924-1.627-2.583h.003z" fill="#96FFFF" style="mix-blend-mode:soft-light" opacity=".85"/>
</svg>

';

        $svg2='<svg width="200" height="180" viewBox="0 0 200 180" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#tx499ih3wa)">
        <g style="mix-blend-mode:screen">
            <path d="m199.286 148.072-83.695-32.028.094-9.502 84.079 30.04-.478 11.49z" fill="url(#aso2v4oosb)"/>
            <path d="m199.764 136.582-84.079-30.039.113-.02 84.088 30.03-.122.029z" fill="url(#vjfc6fccoc)"/>
            <path d="m199.886 136.553-.475 11.489-.125.03.478-11.49.122-.029z" fill="url(#us1ijrj5od)"/>
        </g>
        <g style="mix-blend-mode:screen">
            <path d="m188.142 150.809-82.721-32.949.187-30.853 83.931 26.327-1.397 37.475z" fill="url(#6doo5mbuie)"/>
            <path d="m189.539 113.334-83.931-26.328.119-.015 83.941 26.319-.129.024z" fill="url(#40vprdemyf)"/>
            <path d="m189.668 113.31-1.4 37.468-.126.031 1.397-37.475.129-.024z" fill="url(#kzlyfaqxvg)"/>
        </g>
        <g style="mix-blend-mode:screen">
            <path d="m176.637 153.634-81.653-33.91.117-53.089 83.674 22.221-2.138 64.778z" fill="url(#wdu1mcf11h)"/>
            <path d="m178.775 88.856-83.674-22.22.123-.014 83.685 22.215-.134.02z" fill="url(#kx3g7amxyi)"/>
            <path d="m178.909 88.837-2.14 64.764-.132.033 2.138-64.778.134-.02z" fill="url(#erexszayzj)"/>
        </g>
        <path d="m164.892 156.517-80.5-34.901-.256-76.242 83.29 17.675-2.534 93.468z" fill="url(#xtbythekkk)" style="mix-blend-mode:screen"/>
        <path d="M152.618 159.531 73.391 123.58l-.713-100.42L155.44 35.8l-2.823 123.73z" fill="url(#m5oxm3n5ml)" style="mix-blend-mode:screen"/>
        <path d="M139.928 162.647 62.088 125.6 60.699 0l82.071 7.073-2.841 155.574z" fill="url(#fbga9vmhkm)" style="mix-blend-mode:screen"/>
        <path d="m126.8 165.871-76.323-38.198-1.62-103.149 79.617 13.45L126.8 165.87z" fill="url(#wmokvxn1zn)" style="mix-blend-mode:screen"/>
        <path d="m113.212 169.206-74.675-39.401-1.654-80.404 77.085 20.01-.756 99.795z" fill="url(#dv7yazunbo)" style="mix-blend-mode:screen"/>
        <g style="mix-blend-mode:screen">
            <path d="m98.977 172.703-72.86-40.678-1.349-57.458 74.48 26.744-.271 71.392z" fill="url(#44s67557jp)"/>
            <path d="m99.248 101.311-74.48-26.744.146-.017 74.501 26.734-.167.027z" fill="url(#dokdtlbybq)"/>
            <path d="m99.415 101.284-.274 71.378-.164.041.27-71.392.168-.027z" fill="url(#mueaht71er)"/>
        </g>
        <g style="mix-blend-mode:screen">
            <path d="M84.387 176.285 13.48 134.281l-.965-34.253 71.798 33.653.074 42.604z" fill="url(#vmxrugnuis)"/>
            <path d="m84.313 133.681-71.798-33.653.146-.022 71.822 33.642-.17.033z" fill="url(#uw4i579ydt)"/>
            <path d="m84.483 133.648.072 42.596-.168.041-.074-42.604.17-.033z" fill="url(#v11zeufogu)"/>
        </g>
        <g style="mix-blend-mode:screen">
            <path d="M69.256 180 .472 136.604l-.358-10.816 69.04 40.747.102 13.465z" fill="url(#1ftdy9f0qv)"/>
            <path d="M69.155 166.535.114 125.788l.148-.025 69.066 40.731-.173.041z" fill="url(#2tu0el0muw)"/>
            <path d="m69.328 166.494.101 13.463-.173.043-.101-13.465.173-.041z" fill="url(#2ixtjhcpix)"/>
        </g>
        <g style="mix-blend-mode:color-dodge">
            <path d="m199.286 148.072-83.695-32.028.094-9.502 84.079 30.04-.478 11.49z" fill="url(#zu8c5x45ay)"/>
            <path d="m199.764 136.582-84.079-30.039.113-.02 84.088 30.03-.122.029z" fill="url(#fyaizeawvz)"/>
            <path d="m199.886 136.553-.475 11.489-.125.03.478-11.49.122-.029z" fill="url(#tel7ue11vA)"/>
        </g>
        <g style="mix-blend-mode:color-dodge">
            <path d="m188.142 150.809-82.721-32.949.187-30.853 83.931 26.327-1.397 37.475z" fill="url(#cphmir8a2B)"/>
            <path d="m189.539 113.334-83.931-26.328.119-.015 83.941 26.319-.129.024z" fill="url(#7oq11isywC)"/>
            <path d="m189.668 113.31-1.4 37.468-.126.031 1.397-37.475.129-.024z" fill="url(#23nf99go4D)"/>
        </g>
        <g style="mix-blend-mode:color-dodge">
            <path d="m176.637 153.634-81.653-33.91.117-53.089 83.674 22.221-2.138 64.778z" fill="url(#t17q0fmx0E)"/>
            <path d="m178.775 88.856-83.674-22.22.123-.014 83.685 22.215-.134.02z" fill="url(#ck1r5h6tsF)"/>
            <path d="m178.909 88.837-2.14 64.764-.132.033 2.138-64.778.134-.02z" fill="url(#d9f6lhi2oG)"/>
        </g>
        <path d="m164.892 156.517-80.5-34.901-.256-76.242 83.29 17.675-2.534 93.468z" fill="url(#gsx5purnwH)" style="mix-blend-mode:color-dodge"/>
        <path d="M152.618 159.531 73.391 123.58l-.713-100.42L155.44 35.8l-2.823 123.73z" fill="url(#2ag0ygr37I)" style="mix-blend-mode:color-dodge"/>
        <path d="M139.928 162.647 62.088 125.6 60.699 0l82.071 7.073-2.841 155.574z" fill="url(#gvzeqbobbJ)" style="mix-blend-mode:color-dodge"/>
        <path d="m126.8 165.871-76.323-38.198-1.62-103.149 79.617 13.45L126.8 165.87z" fill="url(#et66jwq43K)" style="mix-blend-mode:color-dodge"/>
        <path d="m113.212 169.206-74.675-39.401-1.654-80.404 77.085 20.01-.756 99.795z" fill="url(#n950lzxtdL)" style="mix-blend-mode:color-dodge"/>
        <g style="mix-blend-mode:color-dodge">
            <path d="m98.977 172.703-72.86-40.678-1.349-57.458 74.48 26.744-.271 71.392z" fill="url(#19fer9ir3M)"/>
            <path d="m99.248 101.311-74.48-26.744.146-.017 74.501 26.734-.167.027z" fill="url(#6w4rf9zftN)"/>
            <path d="m99.415 101.284-.274 71.378-.164.041.27-71.392.168-.027z" fill="url(#qsrcit0lvO)"/>
        </g>
        <g style="mix-blend-mode:color-dodge">
            <path d="M84.387 176.285 13.48 134.281l-.965-34.253 71.798 33.653.074 42.604z" fill="url(#kkgtzhkv7P)"/>
            <path d="m84.313 133.681-71.798-33.653.146-.022 71.822 33.642-.17.033z" fill="url(#mfgvu99d8Q)"/>
            <path d="m84.483 133.648.072 42.596-.168.041-.074-42.604.17-.033z" fill="url(#fkacv6i9gR)"/>
        </g>
        <g style="mix-blend-mode:color-dodge">
            <path d="M69.256 180 .472 136.604l-.358-10.816 69.04 40.747.102 13.465z" fill="url(#dcw9vl5vsS)"/>
            <path d="M69.155 166.535.114 125.788l.148-.025 69.066 40.731-.173.041z" fill="url(#foekoiibpT)"/>
            <path d="m69.328 166.494.101 13.463-.173.043-.101-13.465.173-.041z" fill="url(#0u36f6qz8U)"/>
        </g>
    </g>
    <defs>
        <linearGradient id="aso2v4oosb" x1="198.314" y1="149.754" x2="117.651" y2="103.143" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="vjfc6fccoc" x1="195.864" y1="143.514" x2="119.74" y2="99.525" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="us1ijrj5od" x1="201.936" y1="143.667" x2="197.236" y2="140.952" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="6doo5mbuie" x1="193.238" y1="141.991" x2="103.726" y2="90.267" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="40vprdemyf" x1="184.86" y1="121.63" x2="110.45" y2="78.631" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="kzlyfaqxvg" x1="196.54" y1="136.464" x2="181.272" y2="127.64" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="wdu1mcf11h" x1="188.083" y1="133.828" x2="89.27" y2="76.729" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="kx3g7amxyi" x1="173.244" y1="98.64" x2="100.799" y2="56.778" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="erexszayzj" x1="191.047" y1="128.892" x2="164.504" y2="113.553" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="xtbythekkk" x1="182.962" y1="125.245" x2="74.274" y2="62.44" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="m5oxm3n5ml" x1="177.67" y1="116.178" x2="58.664" y2="47.411" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="fbga9vmhkm" x1="172.293" y1="106.638" x2="42.436" y2="31.6" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="wmokvxn1zn" x1="153.461" y1="119.733" x2="33.797" y2="50.586" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="dv7yazunbo" x1="134.135" y1="132.998" x2="25.014" y2="69.941" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="44s67557jp" x1="114.188" y1="146.378" x2="16.044" y2="89.665" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="dokdtlbybq" x1="95.875" y1="107.413" x2="28.34" y2="68.388" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="mueaht71er" x1="114.613" y1="145.885" x2="83.785" y2="128.073" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="vmxrugnuis" x1="93.61" y1="160.324" x2="6.695" y2="110.099" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="uw4i579ydt" x1="82.772" y1="136.61" x2="14.255" y2="97.015" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="v11zeufogu" x1="93.747" y1="160.337" x2="75.127" y2="149.578" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="1ftdy9f0qv" x1="72.36" y1="174.628" x2="-2.958" y2="131.106" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="2tu0el0muw" x1="69.492" y1="166.213" x2="-.032" y2="126.04" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="2ixtjhcpix" x1="72.304" y1="174.985" x2="66.283" y2="171.505" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="zu8c5x45ay" x1="198.314" y1="149.754" x2="117.651" y2="103.143" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="fyaizeawvz" x1="195.864" y1="143.514" x2="119.74" y2="99.525" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="tel7ue11vA" x1="201.936" y1="143.667" x2="197.236" y2="140.952" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="cphmir8a2B" x1="193.238" y1="141.991" x2="103.726" y2="90.267" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="7oq11isywC" x1="184.86" y1="121.63" x2="110.45" y2="78.631" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="23nf99go4D" x1="196.54" y1="136.464" x2="181.272" y2="127.64" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="t17q0fmx0E" x1="188.083" y1="133.828" x2="89.27" y2="76.729" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="ck1r5h6tsF" x1="173.244" y1="98.64" x2="100.799" y2="56.778" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="d9f6lhi2oG" x1="191.047" y1="128.892" x2="164.504" y2="113.553" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="gsx5purnwH" x1="182.962" y1="125.245" x2="74.274" y2="62.44" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="2ag0ygr37I" x1="177.67" y1="116.178" x2="58.664" y2="47.411" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="gvzeqbobbJ" x1="172.293" y1="106.638" x2="42.436" y2="31.6" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="et66jwq43K" x1="153.461" y1="119.733" x2="33.797" y2="50.586" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="n950lzxtdL" x1="134.135" y1="132.998" x2="25.014" y2="69.941" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="19fer9ir3M" x1="114.188" y1="146.378" x2="16.044" y2="89.665" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="6w4rf9zftN" x1="95.875" y1="107.413" x2="28.34" y2="68.388" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="qsrcit0lvO" x1="114.613" y1="145.885" x2="83.785" y2="128.073" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="kkgtzhkv7P" x1="93.61" y1="160.324" x2="6.695" y2="110.099" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="mfgvu99d8Q" x1="82.772" y1="136.61" x2="14.255" y2="97.015" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="fkacv6i9gR" x1="93.747" y1="160.337" x2="75.127" y2="149.578" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="dcw9vl5vsS" x1="72.36" y1="174.628" x2="-2.958" y2="131.106" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="foekoiibpT" x1="69.492" y1="166.213" x2="-.032" y2="126.04" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <linearGradient id="0u36f6qz8U" x1="72.304" y1="174.985" x2="66.283" y2="171.505" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10241A"/>
            <stop offset=".51" stop-color="#000F12"/>
            <stop offset="1" stop-color="#140033"/>
        </linearGradient>
        <clipPath id="tx499ih3wa">
            <path fill="#fff" transform="translate(.114)" d="M0 0h199.773v180H0z"/>
        </clipPath>
    </defs>
</svg>
';

        $svg3='<svg width="154" height="174" viewBox="0 0 154 174" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M152.648 106.973c-.558-1.549-.876-1.989-1.421-2.906-2.795-4.682-54.01-86.818-58.477-93.708-.57-.878-.849-1.39-1.937-2.606C86.262 2.666 79.317.234 77.234.033c-2.676-.26-5.047.82-6.864 2.792-.788.855-1.457 1.892-1.772 2.58C67.58 7.617 24.249 111.207 23.74 113.47c-.7 3.151.413 5.259 2.94 6.357 1.055.458 1.348.497 4.801 1.077 4.11.69 105.323 17.226 107.222 17.267 3.998.093 6.965-1.781 8.885-5.195.512-.91 4.16-9.783 4.467-10.688 1.678-4.945 2.352-10.424.589-15.32l.003.004z" fill="#EBE47A" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M152.062 86.544c-.782-1.697-36.938-59.496-40.684-65.343-.73-1.14-1.034-1.62-1.881-2.581-3.952-4.508-9.453-7.076-15.236-8.465-.862-.206-1.566-.347-9.75-1.685C67.154 5.636 67.72 5.73 66.387 5.802c-3.344.181-5.856 1.785-7.65 4.612-.726 1.143-.49.646-13.726 32.401-33.152 79.647-31.482 75.57-31.748 77.074-.524 2.979.633 5.043 3.442 6.112 1.044.397-1.688.011 57.48 9.565 55.75 9.043 53.59 8.634 54.529 8.623 2.879-.039 5.173-1.08 6.924-3.015.749-.826 1.391-1.806 1.759-2.566.714-1.486 13.99-33.3 14.707-35.416 1.858-5.5 2.387-11.4-.04-16.65l-.003.002z" fill="#E5E0AB" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M152.062 67.553c-.542-1.166-22.056-35.922-23.893-38.069-4.218-4.92-10.688-7.804-16.723-8.918-2.799-.517-52.842-8.71-54.362-8.77-3.94-.164-7.006 1.572-9.009 5.056-.962 1.675-44.46 106.308-44.942 108.03-.965 3.44.245 6.123 3.664 7.253 2.15.708 108.154 17.732 110.527 18.02.887.109 2.117.023 3.09-.179 2.925-.603 5.023-2.509 6.461-5.109.699-1.261 22.978-54.934 24.79-59.478a30.947 30.947 0 0 0 1.697-6.155c.651-4 .418-7.97-1.3-11.677v-.004z" fill="#E5E0AB" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M152.629 49.998c-.494-1.382-.562-1.534-3.153-5.679-1.658-2.652-2.058-3.26-2.741-4.06-3.87-4.543-9.374-7.229-15.1-8.635-1.266-.311-1.642-.386-11.588-2.022-77.085-12.639-73.131-11.83-74.073-11.81-2.736.06-5.04 1.023-6.878 3.08-.735.824-1.407 1.865-1.734 2.578-1.2 2.606-34.758 82.868-35.808 86.4-1.396 4.698-1.827 9.574-.18 14.168.502 1.4.774 1.785 1.446 2.902.628 1.043 2.82 4.56 3.486 5.551 1.378 2.046 3.93 4.506 7.115 6.364 2.802 1.635 5.86 2.774 8.986 3.541 1.895.465 6.008 1.153 52.806 8.728 34.017 5.513 31.705 5.118 32.882 5.093 2.702-.061 5.021-1.06 6.872-3.154.699-.789 1.352-1.815 1.697-2.565.855-1.863 34.709-82.75 35.818-86.476 1.359-4.569 1.76-9.499.147-14.006v.002z" fill="#D0EAC5" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M147.205 41.858c-1.622-.533-107.156-17.612-110.51-18.02-.66-.082-2.266-.107-3.806.351-1.908.57-3.574 1.706-4.953 3.637-.764 1.07-.987 1.62-1.486 2.784-2.03 4.73-23.195 55.523-24.375 58.665-.353.942-.91 2.743-1.281 4.622-.838 4.23-.686 8.594 1.111 12.473.772 1.663 20.475 33.023 21.113 34.028 1.683 2.645 1.969 3.117 2.783 4.074 3.839 4.515 9.365 7.19 15.098 8.596 3.074.751 54.855 9.08 56.005 9.127 3.925.159 6.981-1.54 9.004-5.029.935-1.613 44.451-106.247 44.959-108.058 1.025-3.659-.459-6.195-3.662-7.25z" fill="#D0EAC5" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M136.708 47.79c-1.35-.415-109.167-18-111.335-17.99-3.265.013-5.985 1.34-7.948 4.195-.71 1.034-.882 1.48-1.456 2.817-2.001 4.67-12.154 29.096-13.476 32.413C.533 74.137-.452 79.804.989 84.89c.252.887.698 2.157 1.148 2.95 1.67 2.95 17.525 28.301 22.106 35.64 20.273 32.515 19.154 30.68 20.513 32.181 3.966 4.386 9.565 6.934 15.28 8.245 1.935.444 22.382 3.711 24.706 4.061 1.039.156 1.787.317 3.167.202 3.391-.288 5.814-2.026 7.527-4.885.556-.928 1.139-2.128 32.449-77.536 13.367-32.132 12.705-30.476 12.9-31.998.365-2.87-.824-4.96-4.079-5.96h.002z" fill="#D9F0B3" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M125.56 53.614C122.252 52.988 17.31 35.82 15.007 35.81c-3.968-.014-6.997 2.069-8.728 5.44-.413.805-3.278 7.747-3.868 9.22C.267 55.815-.593 62.208 1.58 67.623c.424 1.06.773 1.606 1.508 2.822 4.998 8.256 55.814 89.638 58.5 93.706 2.954 4.478 7.834 7.505 12.895 9.229.509.175 1.024.338 1.546.465.703.172 1.95.225 2.908.034 2.63-.526 4.671-2.244 6.06-4.549 1.132-1.878 44.57-106.51 45.053-108.027 1.321-4.157-.549-6.945-4.487-7.691l-.002.002z" fill="#D9F0B3" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M119.829 63.152c-.619-1.995-2.62-3.147-4.633-3.528-1.828-.347-105.319-17.394-108.867-17.39-.512 0-1.039.01-1.536.143-1.02.277-1.928.892-2.473 1.611-.97 1.284-1.109 3.18-.796 4.25.304 1.036.715 1.705 1.404 2.862 4.497 7.523 68.805 110.707 69.978 112.039 3.126 3.548 5.93 1.032 8.113-3.119 1.232-2.348 37.932-90.711 38.597-92.612.397-1.13.655-2.84.215-4.259l-.002.003z" fill="#DBF3AD" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M106.58 66.198c-1.125-.503-1.792-.576-3.106-.807-3.194-.556-74.172-12.213-77.525-12.462-4.764-.354-8.415.694-6.668 5.163.388.992-1.853-2.395 40.59 65.513 13.14 21.008 12.692 20.264 13.382 20.944 3.203 3.168 5.896.171 7.94-3.845.722-1.418 27.73-66.066 28.186-67.863.758-2.979.039-5.365-2.801-6.64l.002-.003z" fill="#DEF4A1" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M95.078 71.797c-1.105-.337-48.065-7.96-50.224-8.149-4.62-.401-8.646.348-7.197 4.749.309.932.604 1.415 1.502 2.895 4.066 6.685 30.909 49.715 33.191 53.143 1.062 1.593 2.636 2.875 4.453 2.308 2.122-.663 3.952-3.973 4.83-5.999 1.505-3.464 16.875-40.242 17.265-41.612 1.041-3.655-.127-6.205-3.82-7.337v.002z" fill="#E2F7A2" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M87.959 79.899c-.785-1.04-1.936-1.663-3.168-2.051-.512-.163-1.204-.29-5.63-1.016-15.226-2.494-15.86-2.61-18.098-2.57-3.108.054-5.674.94-5.097 3.997.095.506.258 1 .458 1.474.272.647.247.763 11.398 18.563 4.93 7.863 4.832 7.652 5.354 8.19 2.289 2.361 4.447 1.563 6.39-1.074a19.137 19.137 0 0 0 1.634-2.724c.806-1.672 6.337-15.04 7.049-16.868.74-1.901.935-4.292-.293-5.919l.003-.002z" fill="#E7FC9C" style="mix-blend-mode:soft-light" opacity=".85"/>
</svg>
';

        $svg4='<svg width="292" height="180" viewBox="0 0 292 180" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M13.526 90.775c-.937-3.023-4.15-7.893-6.462-10.244-1.728-1.756-2.774-1.55-3.937.26C2.09 82.4 1.205 85.18.824 87.05.362 89.287.47 91.557.89 93.766c.405 2.167 1.446 6.66 3.636 6.952 2.27.302 6.17-2.256 7.512-3.636 1.587-1.601 2.374-3.457 1.493-6.306h-.005z" fill="#5EFFAA" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M32.154 90.63c-1.776-3.81-4.993-8.676-7.39-12.03-5.44-7.625-7.098-8.275-8.478-7.074-1.936 1.686-4.112 8.332-4.865 10.786-1.535 4.973-1.663 7.743-.509 13.442.42 2.072 1.032 4.606 1.644 6.636.82 2.708 1.813 5.073 3.429 5.369 3.033.556 10.244-3.937 12.547-5.595 4.663-3.358 6.212-5.963 3.617-11.53l.005-.005z" fill="#80E4F6" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M44.612 81.087c-2.35-3.617-5.318-7.908-8.012-11.464-6.933-9.151-7.96-8.92-12.265 2.426-5.152 13.578-4.968 16.654-3.683 23.267 1.05 5.397 2.497 11.007 3.288 13.503 1.898 6.01 3.287 6.401 6.674 5.313 4.107-1.319 13.329-6.391 18.208-10.404 5.864-4.823 5.2-8.172-4.206-22.64h-.004z" fill="#3DEDBA" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M63.55 82.971c-5.534-8.902-14.19-21.552-18.44-25.88-2.933-2.996-4.323-2.577-6.8 2.962-1.814 4.055-8.12 20.643-8.553 26.418-.208 2.731-.057 5.369 1.766 13.569a288.171 288.171 0 0 0 2.491 10.362c2.888 11.044 3.961 12.123 9.684 9.862 6.071-2.392 18.03-9.297 23.973-14.309 5.972-5.044 5.238-7.903-4.12-22.989v.005z" fill="#7ACFE3" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M82.112 84.987C77.03 76.462 64.672 57.1 58.101 49.978c-3.236-3.5-4.654-3.603-7.093 1.493-2.534 5.28-8.846 22.923-10.612 29.8-1.55 6.02-1.342 9.066 3 27.275 4.475 18.755 5.45 20.342 10.296 18.858 7.847-2.402 27.016-14.304 32.805-19.894 4.832-4.673 4.606-7.447-4.385-22.528v.005z" fill="#79DAC1" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M103.321 104.66c.786-3.956-.923-9.48-2.313-13.38-4.196-11.775-18.59-33.271-25.316-42.376-3.55-4.808-6.278-8.152-8.096-8.962-2.105-.942-3.707 2.496-5.106 5.694-2.816 6.448-11.21 29.587-12.664 36.657-1.05 5.106-.641 8.666 3.767 27.421 4.334 18.435 5.94 23.408 8.252 24.383 1.385.58 3.504-.15 4.913-.692 8.186-3.146 23.559-12.731 29.743-18.086 3.306-2.868 5.953-6.316 6.82-10.659z" fill="#79DAC1" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M110.527 114.678a61.728 61.728 0 0 0 2.43-6.594c1.653-5.487 1.521-8.407-1.512-20.426-3.377-13.381-6.547-21.275-17.685-37.934-12.086-18.048-14.102-18.52-15.845-17.012-1.125.975-2.293 2.797-5.948 12.34-2.666 6.952-6.693 18.213-9.439 26.564-2.675 8.129-3.203 10.969-3.32 13.465-.16 3.363.047 7.258 6.65 34.378 1.272 5.223 3.264 13.173 4.686 16.998 1.79 4.813 3.406 5.007 7.602 3.443 6.288-2.341 20.677-10.762 26.536-16.367 2.058-1.978 3.937-4.498 5.845-8.855z" fill="#3ADACB" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M116.909 124.395c1.719-3.674 3.763-9.25 5.035-13.122 2.924-8.921 2.99-10.522-.914-27.162-3.127-13.296-5.831-23.15-9.184-30.629-4.178-9.311-13.49-22.588-17.107-26.544-3.542-3.872-4.776-3.35-8.332 5.209-2.887 6.942-7.366 19.343-9.839 26.403-8.487 24.252-8.6 25.01-6.165 37.067 1.757 8.714 5.492 24.544 8.063 34.661 4.004 15.768 5.05 17.473 8.77 16.748 4.126-.805 17.865-8.266 23.752-13.89 2.605-2.486 4.282-5.246 5.921-8.746v.005z" fill="#76DEAB" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M128.561 120.646c1.507-4.164 4.503-12.599 5.204-16.81.698-4.182.608-7.95-6.852-37.934-2.016-8.115-4.856-19.334-8.092-27.02-3.391-8.068-11.53-20.361-14.488-21.553-2.345-.947-4.083 2.835-10.065 18.779-4.837 12.886-11.506 31.702-13.95 40.26-2.436 8.53-2.6 9.938 6.593 47.895 6.745 27.873 7.626 29.861 11.624 29.135 3.509-.636 12.293-5.571 16.678-9.043 5.322-4.21 7.673-8.025 13.348-23.709z" fill="#5BE3B1" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M135.211 129.463c1.927-5.21 7.786-21.2 8.554-26.71.621-4.489.174-8.214-6.076-34.59-8.652-36.54-11.695-45.554-17.154-53.646-3.612-5.35-4.808-4.983-6.005-3.796-3.094 3.071-16.084 40.176-17.535 44.316-8.171 23.314-8.93 26.474-7.894 33.548 1.536 10.456 9.773 44.137 12.665 55.271 2.84 10.899 4.155 15.034 6.227 15.769 3.108 1.097 12.293-4.833 15.156-7.348 4.352-3.824 6.688-8.294 12.067-22.814h-.005z" fill="#60E9D6" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M141.801 138.247c1.869-4.965 11.266-30.238 11.944-36.775.386-3.707.014-6.929-3-20.484-3.147-14.162-12.076-51.917-16.485-65.684-.947-2.948-2.887-8.59-4.889-10.922-.81-.942-1.564-1.418-2.642-.391-3.923 3.74-22.561 58.012-24.642 64.403-2.36 7.248-3.208 10.607-3.415 13.428-.24 3.353-.688 6.533 11.308 55.115 5.893 23.879 7.282 28.834 10.113 28.999 2.562.156 7.022-2.717 9.043-4.305 4.818-3.782 7.22-8.939 12.669-23.389l-.004.005z" fill="#60E9D6" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M148.46 146.668c2.935-7.734 13.169-35.55 14.818-43.562.975-4.729.475-8.2-1.38-17.078-1.343-6.43-18.407-81.698-22.127-85.541-1.559-1.606-3.005.49-7.098 10.418-5.219 12.66-19 50.292-22.725 63.33-2.285 7.997-2.035 10.319 1.7 27.208 4.705 21.256 11.619 49.082 14.247 58.719 2.92 10.621 3.862 12.707 7.315 11.412 6.674-2.506 9.961-10.936 15.246-24.906h.004z" fill="#64EBC9" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M155.492 153.94a1151.794 1151.794 0 0 0 9.66-26.408c9.166-26.103 9.411-27.426 7.611-37.284-1.219-6.693-4.535-21.016-6.08-27.6-13.616-58.03-15.213-60.607-17.728-59.9-1.917.536-3.405 2.806-4.597 4.855-5.03 8.629-20.559 53.076-23.677 63.15-3.438 11.12-3.381 11.483 2.591 37.703 3.645 15.972 8.464 35.612 11.732 48.348 4.785 18.651 5.892 22.136 9.227 19.866 3.264-2.214 6.674-10.635 11.266-22.725l-.005-.005z" fill="#87EEE3" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M162.628 160.736c2.896-7.512 7.06-18.792 9.825-26.507 10.785-30.063 11.021-33.407 11.073-36.883.051-3.561-.669-8.822-7.579-38.042-10.748-45.554-12.495-49.176-14.087-50.665-2.105-1.964-6.726 1.649-8.586 3.9-2.628 3.175-4.832 8.469-6.42 12.34-4.587 11.167-15.533 41.565-17.695 50.165-1.738 6.92-1.469 9.142 5.2 37.83a2086.192 2086.192 0 0 0 9.264 38.089c6.726 26.621 8.2 29.861 10.037 28.891 2.167-1.145 6.862-13.65 8.977-19.118h-.009z" fill="#92F0E4" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M168.6 169.822c4.493-10.418 18.204-47.773 22.815-62.981 1.497-4.955 2.392-8.464 1.799-13.48-1.295-10.95-14.064-62.971-16.951-72.302-1.884-6.08-2.93-7.545-5.704-6.89-2.604.612-8.12 3.627-11.28 7.828-2.925 3.886-5.911 10.927-11.243 25.593-10.267 28.255-10.46 30.798-9.598 37.176 1.356 10.022 15.467 69.287 20.167 82.461.862 2.425 3.599 10.084 5.944 9.25 1.508-.532 3.222-4.738 4.051-6.66v.005z" fill="#BFF2EC" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M179.202 166.544c3.876-7.88 16.169-41.942 20.804-56.312 2.378-7.366 3.103-10.442 3.231-13.423.164-3.801-.335-7.743-5.765-31.142-1.762-7.607-4.767-20.008-6.688-27.464-3.834-14.873-4.965-18.217-7.946-18.006-3.273.231-9.669 4.178-12.312 6.166-5.308 3.99-7.62 7.682-13.658 23.95-2.111 5.694-5.163 14.29-6.966 20.167-2.699 8.817-2.563 10.579 1.153 27.205 10.781 48.262 14.823 58.12 18.247 64.234 1.078 1.926 4.342 7.403 6.462 8.035 1.446.433 2.769-2.054 3.438-3.415v.005z" fill="#BFF2EC" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M208.818 112.728c3.82-11.393 4.672-14.991 4.187-20.073-.867-9.119-10.814-49.464-13.485-58.483-1.978-6.688-3.254-7.78-5.228-7.691-3.353.15-15.542 6.513-20.794 12.142-2.948 3.16-5.143 8.087-6.763 12.076-2.393 5.883-5.643 15.053-7.098 19.89-2.454 8.157-2.402 9.782 1.573 27.2 8.633 37.872 11.869 44.687 17.333 53.485 1.351 2.171 7.356 11.747 9.904 11.511.542-.052.98-.447 1.343-.819 3.462-3.57 17.365-44.255 19.028-49.238z" fill="#C3F4DF" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M206.67 145.194c2.826-7.065 7.15-19.089 9.74-26.559 8.012-23.107 7.885-22.26 3.834-40.703-1.757-8.007-5.237-22.726-7.39-30.897-2.11-8.026-3.141-11.2-4.526-13.018-1.422-1.87-3.504-1.616-9.307 1.177-3.433 1.653-8.28 4.423-12.104 7.023-7.527 5.114-10.725 8.166-16.631 25.824-1.945 5.817-2.703 8.93-2.199 13.362.645 5.661 6.56 32.503 11.605 44.023 4.771 10.904 15.905 26.687 19.277 29.235 2.525 1.903 3.844.183 7.701-9.467z" fill="#C3F5D0" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M223.908 124.456c1.936-5.369 4.983-14.073 6.844-20.111 2.925-9.444 2.793-11.431-.744-27.337a844.256 844.256 0 0 0-4.013-17.101c-4.55-18.524-5.633-21.29-9.429-20.62-5.883 1.04-24.134 11.845-29.838 17.747-3.136 3.25-5.152 7.616-6.692 11.883-1.946 5.369-2.106 7.691-2.04 9.933.132 4.54 3.335 17.973 6.707 26.983 4.979 13.301 20.644 35.352 25.038 39.93 4.427 4.616 5.44 2.93 14.163-21.307h.004z" fill="#BEF7C1" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M236.163 116.784c6.345-17.997 6.957-21.096 6.302-26.819-.631-5.524-7.71-37.735-10.597-42.389-1.399-2.256-2.784-2.553-7.343-.72-8.379 3.362-24.19 13.32-29.823 18.524-3.353 3.099-5.963 7.173-6.212 11.581-.109 1.97.221 3.961.923 6.637 2.331 8.92 6.58 16.767 15.689 31.033 2.632 4.126 14.652 22.603 18.863 25.175 2.736 1.667 4.479-1.088 12.203-23.018l-.005-.004z" fill="#BDF9B9" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M243.511 122.511c1.992-5.167 7.8-20.94 8.723-26.738.664-4.164.259-8.097-3.556-24.044-1.569-6.557-3.471-14.12-4.823-16.82-1.682-3.358-3-4.012-11.817.32-5.911 2.902-12.764 7.127-18.143 10.768-12.481 8.426-13.239 11.082-9.707 18.57 4.38 9.28 18.232 30.95 26.432 41.481 4.102 5.27 5.982 6.956 7.456 6.349 1.592-.66 3.094-3.825 5.43-9.882l.005-.004z" fill="#BFFAB4" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M255.865 114.561c1.418-3.707 3.452-9.505 4.611-13.287 2.393-7.804 2.44-9.957.221-20.328-.673-3.165-2.105-9.293-3.33-13.673-2.354-8.44-3.579-9.48-8.082-7.931-5.812 2.006-18.298 9.283-24.091 13.96-5.741 4.63-6.029 7.032-1.926 14.845 4.545 8.667 18.585 29.833 23.771 34.873 3.433 3.339 4.667 2.444 8.831-8.469l-.005.01z" fill="#C0FCAF" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M268.101 106.761c4.319-11.728 4.461-14.77 3.589-20.187-.65-4.04-2.19-10.446-3.108-13.677-1.663-5.845-2.798-7.852-5.431-7.466-4.14.603-13.809 6.208-18.415 9.604-4.833 3.556-6.557 6.062-4.4 11.454 2.384 5.968 10.937 18.411 15.011 23.785 4.455 5.874 6.113 7.004 7.399 6.538 1.686-.617 3.335-4.541 5.36-10.046l-.005-.005z" fill="#C0FDAA" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M277.691 105.442c.961-2.096 1.79-4.38 2.524-6.603 1.875-5.67 2.021-8.506 1.102-13.461-.532-2.854-1.917-9.194-3.471-11.662-1.158-1.846-2.661-2.84-10.484 1.635-1.893 1.083-4.051 2.468-5.723 3.895-1.686 1.44-3.132 3.141-3.028 5.732.188 4.686 7.215 14.558 10.013 18.293 1.404 1.874 4.253 5.642 5.986 5.661 1.357.014 2.52-2.265 3.081-3.49z" fill="#C1FFA5" style="mix-blend-mode:soft-light" opacity=".85"/>
    <path d="M289.946 97.007c.862-2.167 1.455-4.385 1.526-6.684.094-3.15-1.178-10.079-3.556-10.955-2.223-.82-8.487 2.779-9.472 5.76-.395 1.192-.409 2.195-.155 3.4.725 3.373 6.278 12.044 8.699 12.129 1.347.047 2.459-2.402 2.953-3.65h.005z" fill="#C2FFA0" style="mix-blend-mode:soft-light" opacity=".85"/>
</svg>
';


        $hardcodedIcons =[
//            \Roots\asset('images/solid1.svg')->uri(),
//            \Roots\asset('images/solid2.svg')->uri(),
//            \Roots\asset('images/solid3.svg')->uri(),
//            \Roots\asset('images/solid4.svg')->uri(),



        //using svg tags manually
        //1
            $svg1,

            //2
            $svg2,

            //3
            $svg3,

            //4
            $svg4,

            //end harcodedicons
        ];

        return array_map(function ($service, $index) use ($hardcodedIcons) {
            //if the image is not selected , it would hardcode the first 4 images and then cycle through these icons
            $icon =$hardcodedIcons[$index % count($hardcodedIcons)] ?? $service['image'];

            $url = $service['url'] ?? '#';

            return [
                'icon' => $icon,
                'title' => $this->getTitle($service['title'], $service['bolded_text']),
                'description' => $service['description'],
                'url' => $url,
            ];
        }, $acfServices, array_keys($acfServices));
    }

    public function getTitle($title, $boldedText)
    {
//        $serviceTitle = get_field('service_title');
//        $boldedText= get_field('bolded_text');

         return str_replace($boldedText,
             '<b>'.esc_html($boldedText).'</b>',
             $title
         );
    }
}
