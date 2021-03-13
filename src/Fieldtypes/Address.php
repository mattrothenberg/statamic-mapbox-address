<?php

namespace Mattrothenberg\StatamicMapboxAddress\Fieldtypes;

use Statamic\Facades\Antlers;
use Statamic\Fields\Fieldtype;

class Places extends Fieldtype
{
    protected $icon = 'pin';

    // protected function configFieldItems(): array
    // {
    //     return [
    //         'placeholder' => [
    //             'type' => 'text',
    //             'display' => __('Placeholder'),
    //             'default' => __('Start typing your address'),
    //         ],
    //         'searchType' => [
    //             'type' => 'select',
    //             'display' => __('Type'),
    //             'instructions' => __('Restrict the search results to a specific type'),
    //             'options' => [
    //                 'all' => 'All',
    //                 'city' => 'City',
    //                 'country' => 'Country',
    //                 'address' => 'Address',
    //                 'busStop' => 'Bus Stop',
    //                 'trainStation' => 'Train Station',
    //                 'townhall' => 'Townhall',
    //                 'airport' => 'Airport',
    //             ],
    //             'default' => 'all',
    //         ],
    //         'postcodeSearch' => [
    //             'type' => 'toggle',
    //             'display' => __('Postcode Search'),
    //             'instructions' => __('Only search in the postcode field'),
    //         ],
    //         'language' => [
    //             'type' => 'text',
    //             'display' => __('Language'),
    //             'instructions' => __('Change the default language of the results. Leave empty to use the default: the locale of the current site. You can pass two letters language codes (ISO 639-1).'),
    //             'default' => '',
    //             'width' => 50,
    //         ],
    //         'countries' => [
    //             'type' => 'taggable',
    //             'display' => __('Countries'),
    //             'instructions' => __('Change the countries to search in. Two letters country codes (ISO 639-1).'),
    //             'width' => 50,
    //         ],
    //         'locationSearch' => [
    //             'type' => 'select',
    //             'options' => [
    //                 'no' => __('No'),
    //                 'lat_lng' => __('Around LatLng'),
    //                 'lat_lng_ip' => __('Around LatLng via IP'),
    //                 'bounding_box' => __('Inside a bounding box'),
    //                 'polygon' => __('Inside a polygon'),
    //             ],
    //             'default' => 'lat_lng_ip',
    //             'display' => __('Search around a location?'),
    //         ],
    //         'aroundLatLng' => [
    //             'display' => __('Around LatLng'),
    //             'type' => 'text',
    //             'instructions' => __('Force to first search around a specific latitude longitude. The option value must be provided as a string: `latitude,longitude` like `12.232,23.1`.'),
    //             'if' => [
    //                 'locationSearch' => 'equals lat_lng',
    //             ]
    //         ],
    //         'aroundRadius' => [
    //             'type' => 'text',
    //             'text_type' => 'number',
    //             'display' => __('Around radius'),
    //             'instructions' => __('Radius in meters to search around the latitude longitude. Otherwise a default radius is automatically computed given the area density.'),
    //             'if' => [
    //                 'locationSearch' => 'contains_any lat_lng_ip, lat_lng',
    //             ]
    //         ],
    //         'useDeviceLocation' => [
    //             'display' => __('Use device location'),
    //             'instructions' => __('Ask and use the device location.'),
    //             'type' => 'toggle',
    //             'default' => false,
    //             'width' => 50,
    //             'if' => [
    //                 'locationSearch' => 'contains_any lat_lng_ip, lat_lng',
    //             ]
    //         ],
    //         'insideBoundingBox' => [
    //             'type' => 'text',
    //             'display' => __('Inside bounding box'),
    //             'instructions' => __('Filters the results inside the area defined by the two extreme points of a rectangle. [See guide](https://www.algolia.com/doc/guides/managing-results/refine-results/geolocation/#filter-inside-rectanglepolygonal-area) or [API reference](https://www.algolia.com/doc/api-reference/api-parameters/insideBoundingBox/). <br><br>Format: `topRightLat, topRightLng, bottomLeftLat, bottomLeftLng`<br>Example: `"60, 16, 40, -4"`'),
    //             'if' => [
    //                 'locationSearch' => 'equals bounding_box',
    //             ]
    //         ],
    //         'insidePolygon' => [
    //             'type' => 'text',
    //             'display' => __('Inside polygon'),
    //             'instructions' => __('Filters the results inside the area defined by a shape. [See guide](https://www.algolia.com/doc/guides/managing-results/refine-results/geolocation/#filter-inside-rectanglepolygonal-area) or [API reference](https://www.algolia.com/doc/api-reference/api-parameters/insidePolygon/). <br><br>Format: `p1Lat, p1Lng, p2Lat, p2Lng, p3Lat, p3Lng...`'),
    //             'if' => [
    //                 'locationSearch' => 'equals polygon',
    //             ]
    //         ],
    //         'getRankingInfo' => [
    //             'type' => 'toggle',
    //             'display' => __('Get ranking info'),
    //             'instructions' => __('Controls whether the [_rankingInfo](https://www.algolia.com/doc/api-reference/api-methods/search/#method-response-_rankinginfo) object should be included in the hits.'),
    //             'default' => false,
    //             'width' => 50,
    //         ],
    //     ];
    // }

    public function preload()
    {
        return [
            'placesAppId' => env('PLACES_APP_ID', false),
            'placesApiKey' => env('PLACES_API_KEY', false)
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

    public function config(string $key = null, $fallback = null)
    {
        return parent::config($key, $fallback); // TODO: Change the autogenerated stub
    }
}