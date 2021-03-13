import AddressField from "./components/address-field.vue";

Statamic.booting(() => {
    Statamic.$components.register("address-fieldtype", AddressField);
});
