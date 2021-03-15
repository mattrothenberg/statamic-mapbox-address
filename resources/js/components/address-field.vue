<template>
  <div
    class="bg-red-lighter p-3 text-sm text-red"
    v-if="error.key || error.id || !geoClient"
  >
    <span
      v-html="
        __('Be sure to add the following environment variables to your .env')
      "
    ></span>
    <ul class="mt-1 list">
      <li v-if="error.key">
        <code>MAPBOX_API_KEY</code>
      </li>
    </ul>
  </div>
  <div v-else>
    <div>
      <v-select
        :value="value"
        :filterable="false"
        :options="options"
        :placeholder="config.placeholder"
        @search="onSearch"
        @input="setSelected"
      >
        <template slot="no-options">
          <div class="py-2 text-grey-60">
            <p>Start typing address...</p>
          </div>
        </template>
        <template slot="option" slot-scope="option">
          <div class="d-center">
            {{ option.place_name }}
          </div>
        </template>
        <template slot="selected-option" slot-scope="option">
          <div class="selected d-center">
            {{ option.place_name }}
          </div>
        </template></v-select
      >
    </div>
  </div>
</template>

<script>
import vSelect from "vue-select";
import debounce from "lodash.debounce";

const mbxClient = require("@mapbox/mapbox-sdk");
const geoService = require("@mapbox/mapbox-sdk/services/geocoding");

// TODO: Figure out how to remove this stuff...
vSelect.props.components.default = () => ({
  Deselect: {
    render: (createElement) => createElement("span", __("×")),
  },
  OpenIndicator: {
    render: (createElement) =>
      createElement("span", {
        class: { toggle: true },
        domProps: {
          innerHTML:
            '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 20 20"><path fill="currentColor" d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>',
        },
      }),
  },
});

export default {
  mixins: [Fieldtype],

  components: {
    vSelect,
  },
  data() {
    return {
      options: [],
      geoClient: this.meta.mapboxApiKey
        ? geoService(mbxClient({ accessToken: this.meta.mapboxApiKey }))
        : null,
      error: {
        key: !this.meta.mapboxApiKey,
      },
    };
  },
  methods: {
    setSelected(value) {
      this.update(value);
    },
    onSearch(search, loading) {
      if (search.length) {
        loading(true);
        this.search(loading, search, this);
      }
    },
    search: debounce((loading, search, vm) => {
      if (!vm.geoClient) return;
      vm.geoClient
        .forwardGeocode({
          query: search,
          limit: 10,
          autocomplete: true,
          countries: vm.config.countries,
          types: vm.config.featureTypes,
        })
        .send()
        .then((response) => {
          const match = response.body;
          vm.options = match.features;
        })
        .finally(() => {
          loading(false);
        });
    }, 350),
  },
};
</script>
