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
            'logos' => $this->getLogos(),
        ];
    }

    public function fields(): array
    {
        $fields = Builder::make('LogoBlockFields');

        $fields
            ->addRepeater('companies', [
                'label' => 'Companies',
                'button_label' => 'Add Company',
                'layout' => 'block',
            ])
            ->addText('company_name', [
                'label' => 'Company Name',
                'instructions' => 'Enter the name of the company. Ensure it matches the file name of the logo in the assets folder.',
                'required' => true,
            ])
            ->addUrl('company_link', [
                'label' => 'Company Link',
                'instructions' => 'Enter the website URL of the company.',
                'required' => false,
            ])
            ->endRepeater();

        return $fields->build();
    }

    public function getLogos()
    {
        $acfCompanies = get_field('companies');

        if (!is_array($acfCompanies)) {
            return [];
        }

        $logos = array_map(function ($company) {
            $companyName = $company['company_name'] ?? '';
            $companyLink = $company['company_link'] ?? '#';
            $fileName = strtolower(str_replace(' ', '_', $companyName));

            return [
                'src' => \Roots\asset("images/Logos/{$fileName}.png")->uri(),
                'alt' => $companyName . ' Logo',
                'link' => $companyLink,
            ];
        }, $acfCompanies);

        return $logos;
    }
}
