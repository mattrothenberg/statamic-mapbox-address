# Mattrothenberg\StatamicMapboxAddress

An address Autocomplete Field for Statamic V3, powered by [Mapbox](https://docs.mapbox.com/api/search/geocoding/).

![Cover Image](https://user-images.githubusercontent.com/5148596/111149875-cea35800-8563-11eb-9f3c-b4e4aafaf1ca.png)

## Installation

Add the addon to your project via `composer`.

```bash
composer require mattrothenberg\statamic-mapbox-address
```

Make sure to add the following environment variable, since this library uses [Mapbox](https://docs.mapbox.com/api/search/geocoding/) under the hood for address autocompletion. The addon **will not work** without a valid key.

```
MAPBOX_API_KEY=""
```

## Configuration

Currently, only a few configuration options are supported, although [Mapbox's forward geocoding API exposes a variety of settings.](https://github.com/mapbox/mapbox-sdk-js/blob/main/docs/services.md#forwardgeocode).

- `placeholder (string>)`: Placeholder text for the rendered picker.
- `countries (Array<string>)`:  Limits results to the specified countries. Each item in the array should be an ISO 3166 alpha 2 country code.
- `featureTypes ("country" | "region" | "postcode" | "district" | "place" | "locality" | "neighborhood" | "address" | "poi" | "poi.landmark"):`: Filter results by feature types

<img width="734" alt="Screen Shot 2021-03-15 at 7 45 53 AM" src="https://user-images.githubusercontent.com/5148596/111150336-5a1ce900-8564-11eb-8142-526809222a96.png">

Please feel free to submit a pull request if you'd like to add other settings to the configuration screen.

## Serialization

When selecting an address from the picker, the entire result will be serialized on your entry. The structure of a result is as follows:

```yaml
address:
  id: address.8556990516457510
  type: Feature
  place_type:
    - address
  relevance: 0.90963
  properties:
    accuracy: rooftop
  text: "Pennsylvania Avenue NW"
  place_name: "1600 Pennsylvania Avenue NW, Washington, District of Columbia 20500, United States"
  matching_place_name: "1600 Pennsylvania Avenue NW, Washington, DC 20500, United States"
  center:
    - -77.036547
    - 38.897675
  geometry:
    type: Point
    coordinates:
      - -77.036547
      - 38.897675
  address: "1600"
  context:
    - id: neighborhood.291451
      text: Downtown
    - id: postcode.8556990516457510
      text: "20500"
    - id: place.12583600763246050
      wikidata: Q61
      text: Washington
    - id: region.14064402149979320
      wikidata: Q3551781
      short_code: US-DC
      text: "District of Columbia"
    - id: country.19678805456372290
      wikidata: Q30
      short_code: us
      text: "United States"

```

Please feel free to submit a pull request if you'd like to modify or improve this very basic serialization schema.
