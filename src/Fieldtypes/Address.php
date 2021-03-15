<?php

namespace Mattrothenberg\StatamicMapboxAddress\Fieldtypes;

use Statamic\Facades\Antlers;
use Statamic\Fields\Fieldtype;

class Address extends Fieldtype
{
    protected $icon = 'pin';

    protected function configFieldItems(): array
    {
        return [
            'placeholder' => [
                'type' => 'text',
                'display' => __('Placeholder'),
                'default' => __('Start typing your address'),
            ],
            'featureTypes' => [
                'type' => 'select',
                'multiple' => true,
                'display' => __('Type'),
                'instructions' => __('Restrict the search results to a specific feature type'),
                'options' => [
                    'country' => 'Country',
                    'region' => 'Region',
                    'postcode' => 'Postcode',
                    'district' => 'District',
                    'place' => 'Place',
                    'locality' => 'Locality',
                    'neighborhood' => 'Neighborhood',
                    'address' => 'Address',
                    'poi' => 'POI', 
                    'poi.landmark' => 'POI (landmark)'
                ],
                'default' => 'address',
            ],
            'countries' => [
                'type' => 'taggable',
                'display' => __('Countries'),
                'instructions' => __('Change the countries to search in. Two letters country codes (ISO 3166-1 alpha-2).'),
                'width' => 50,
            ],
            'language' => [
                'type' => 'taggable',
                'display' => __('Language'),
                'instructions' => __('Specify the language to use for response text and, for forward geocoding, query result weighting. Options are IETF language tags comprised of a mandatory ISO 639-1 language code and optionally one or more IETF subtags for country or script.'),
                'width' => 50,
                'default' => 'en'
            ]
        ];
    }

    public function preload()
    {
        return [
            'mapboxApiKey' => env('MAPBOX_API_KEY', false)
        ];
    }

    /**
     * The blank/default value
     *
     * @return array
     */
    public function defaultValue()
    {
        return null;
    }

    /**
     * Pre-process the data before it gets sent to the publish page
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }
}