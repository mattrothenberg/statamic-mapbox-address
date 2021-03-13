<?php

namespace Mattrothenberg\StatamicMapboxAddress;

use Mattrothenberg\StatamicMapboxAddress\Fieldtypes\Address;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        Address::class,
    ];

    protected $scripts = [
        __DIR__.'/../dist/js/address.js',
    ];
}