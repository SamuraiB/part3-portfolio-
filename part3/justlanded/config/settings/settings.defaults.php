<?php
/*
 * Global Product Configuration File
 * Defaults and Product Settings
 * (c) Copyright 2012 ShapingRain
 * http://www.shapingrain.com
 * support@shapingrain.com
 */

$product = array(
    'name' => 'JustLanded',
    'slogan' => '... is just a cute landing page designed to convert. Easy yet versatile, without the clutter.',
    'version' => '1.2.0'
);

$defaults = array(
    'title' => 'JustLanded',
    'subtitle' => 'Sweet &amp; easy landing page'
);

$manifest = array(
    'index.html' => array(
        'title' => 'Front page',
        'type' => 'html',
        'desc' => 'Front page w/ basic newsletter form, gallery with lightboxes and feature bullet lists.',
    )
);

$groups = array(

    $t->t('Presets') => array(
        'id' => 'presets',
        'desc' => $t->t('Select a preset to quickly switch to a different color theme.'),

        'items' => array(
            $t->t('Select a preset') => array(
                'id' => 'presets',
                'type' => 'presets',
            ),
        )
    ),



    $t->t('Global options') => array(
        'id' => 'global',
        'desc' => $t->t('The global options affect major aspects, such as the background color.'),

        'items' => array(
            $t->t('Background color') => array(
                'id' => 'background_base_color',
                'type' => 'colorpicker',
                'default' => '#FFFFFF',
            ),
            $t->t('Text base color') => array(
                'id' => 'text_base_color',
                'desc' => 'This color is used for main headlines.',
                'type' => 'colorpicker',
                'default' => '#DD4632',
            ),
            $t->t('Secondary text color') => array(
                'id' => 'text_secondary_color',
                'desc' => 'This color is used for sub headlines.',
                'type' => 'colorpicker',
                'default' => '#F7C9C9',
            ),
        )
    ),

    $t->t('Header') => array(
        'id' => 'header',
        'desc' => $t->t('Define design options for the main header.'),
        'items' => array(
            $t->t('Header gradient') => array(
                'id' => 'header_gradient',
                'type' => 'gradient',
                'default' => '#cf5833,#ab2210',
                'desc' => $t->t('This is the gradient used for the main header of the landing page.'),
            ),
        )
    ),

    $t->t('Newsletter') => array(
        'id' => 'newsletter',
        'desc' => $t->t('Set up the newsletter subscription form.'),

        'items' => array(
            $t->t('Background base color') => array(
                'id' => 'newsletter_base_color',
                'type' => 'colorpicker',
                'default' => '#DD4632',
            )
        ),

    ),


    $t->t('Contact Form') => array(
        'id' => 'form',
        'desc' => $t->t('Set up the contact form.'),

        'items' => array(
            $t->t('Recipient email address') => array(
                'id' => 'form_email',
                'desc' => $t->t('This is the address you would like emails submitted through the contact form to be sent to.'),
                'type' => 'text',
                'default' => 'my@email.com',
            ),
        ),
    ),

    $t->t('Pricing table') => array(
        'id' => 'pricing',
        'desc' => $t->t('These settings are used to customize the pricing table.'),

        'items' => array(
            $t->t('Featured price column badge') => array(
                'id' => 'featured_pricing_badge',
                'type' => 'imagepicker',
                'desc' => 'Select a badge to be used to highlight a featured pricing item.',
                'directory' => 'images/badges',
                'filetype' => 'png',
                'default' => 'badge_bestvalue.png',
            ),
            $t->t('Table background/border color') => array(
                'id' => 'pricing_background',
                'type' => 'colorpicker',
                'default' => '#f0f0f0',
            ),
            $t->t('Price column background color (not selected)') => array(
                'id' => 'pricing_background_price_inactive',
                'type' => 'colorpicker',
                'default' => '#666666',
            ),
            $t->t('Price column background color (active/mouseover)') => array(
                'id' => 'pricing_background_price_active',
                'type' => 'colorpicker',
                'default' => '#464646',
            ),
            $t->t('Featured price column background color') => array(
                'id' => 'featured_pricing_background_price_inactive',
                'type' => 'colorpicker',
                'default' => '#dd4632',
            ),
           $t->t('Featured price column background color (active/mouseover)') => array(
                'id' => 'featured_pricing_background_price_active',
                'type' => 'colorpicker',
                'default' => '#464646',
            ),
        )
    ),


    $t->t('Control Panel') => array(
        'id' => 'controlpanel',
        'desc' => $t->t('Set up the configuration interface itself.'),

        'items' => array(
            $t->t('Lock interface to prevent access') => array(
                'id' => 'interface_locked',
                'desc' => $t->t('Once activated and saved, this access panel is not accessible without a manual modification of the site.settings.php file.'),
                'type' => 'checkbox',
                'label' => $t->t('Do you really want to lock the interface?'),
                'default' => false,
            ),
        ),
    ),


);


$presets = array(
    'DarkPeach' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#dd4632',
        'text_secondary_color' => '#f7c9c9',
        'header_gradient-start' => '#cf5833',
        'header_gradient-end' => '#ab2210',
        'newsletter_base_color' => '#dd4733',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#dd4632',
        'featured_pricing_background_price_active' => '#c03220',
        'presentation_gradient-start' => '#cf5833',
        'presentation_gradient-end' => '#ab2210',
    ),

    'Strawberry' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#ca1818',
        'text_secondary_color' => '#ffdcdc',
        'header_gradient-start' => '#cf3333',
        'header_gradient-end' => '#ab1010',
        'newsletter_base_color' => '#ca1818',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#c62a2a',
        'featured_pricing_background_price_active' => '#a91313',
        'presentation_gradient-start' => '#cf3333',
        'presentation_gradient-end' => '#ab1010',
    ),

    'VampireRed' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#ab0000',
        'text_secondary_color' => '#ffd7d7',
        'header_gradient-start' => '#ab0000',
        'header_gradient-end' => '#5e0000',
        'newsletter_base_color' => '#ab0000',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#a10000',
        'featured_pricing_background_price_active' => '#690000',
        'presentation_gradient-start' => '#ab0000',
        'presentation_gradient-end' => '#5e0000',
    ),

    'LimeGreen' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#57791a',
        'text_secondary_color' => '#ebf7c9',
        'header_gradient-start' => '#a2b61d',
        'header_gradient-end' => '#56791a',
        'newsletter_base_color' => '#57791a',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#92a91c',
        'featured_pricing_background_price_active' => '#577a1a',
        'presentation_gradient-start' => '#a2b61d',
        'presentation_gradient-end' => '#56791a',
    ),

    'BusinessGrey' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#313131',
        'text_secondary_color' => '#e4e4e4',
        'header_gradient-start' => '#6e6e6e',
        'header_gradient-end' => '#313131',
        'newsletter_base_color' => '#6e6e6e',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#92a91c',
        'featured_pricing_background_price_active' => '#577a1a',
        'presentation_gradient-start' => '#6e6e6e',
        'presentation_gradient-end' => '#313131',
    ),

    'PurpleSensation' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#6a3681',
        'text_secondary_color' => '#eec9f7',
        'header_gradient-start' => '#946aaf',
        'header_gradient-end' => '#501765',
        'newsletter_base_color' => '#6a3681',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#8b5fa5',
        'featured_pricing_background_price_active' => '#541b69',
        'presentation_gradient-start' => '#946aaf',
        'presentation_gradient-end' => '#501765',
    ),

    'OceanBlue' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#003e65',
        'text_secondary_color' => '#dbf1ff',
        'header_gradient-start' => '#2986c7',
        'header_gradient-end' => '#003e65',
        'newsletter_base_color' => '#004c7c',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#125e90',
        'featured_pricing_background_price_active' => '#00406a',
        'presentation_gradient-start' => '#2986c7',
        'presentation_gradient-end' => '#003e65',
    ),

    'DeepCyan' => array(
        'background_base_color' => '#ffffff',
        'text_base_color' => '#048584',
        'text_secondary_color' => '#d3ffff',
        'header_gradient-start' => '#48c1ba',
        'header_gradient-end' => '#015c5b',
        'newsletter_base_color' => '#048584',
        'pricing_background' => '#f0f0f0',
        'pricing_background_price_inactive' => '#666666',
        'pricing_background_price_active' => '#464646',
        'featured_pricing_background_price_inactive' => '#31a09b',
        'featured_pricing_background_price_active' => '#07857f',
        'presentation_gradient-start' => '#48c1ba',
        'presentation_gradient-end' => '#015c5b',
    ),




);

