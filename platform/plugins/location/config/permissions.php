<?php

return [
    [
        'name' => 'Location',
        'flag' => 'plugin.location',
    ],
    [
        'name' => 'Countries',
        'flag' => 'country.index',
        'parent_flag' => 'plugin.location',
    ],
    [
        'name' => 'Create',
        'flag' => 'country.create',
        'parent_flag' => 'country.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'country.edit',
        'parent_flag' => 'country.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'country.destroy',
        'parent_flag' => 'country.index',
    ],

    [
        'name' => 'States',
        'flag' => 'state.index',
        'parent_flag' => 'plugin.location',
    ],
    [
        'name' => 'Create',
        'flag' => 'state.create',
        'parent_flag' => 'state.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'state.edit',
        'parent_flag' => 'state.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'state.destroy',
        'parent_flag' => 'state.index',
    ],

    [
        'name' => 'Cities',
        'flag' => 'city.index',
        'parent_flag' => 'plugin.location',
    ],
    [
        'name' => 'Create',
        'flag' => 'city.create',
        'parent_flag' => 'city.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'city.edit',
        'parent_flag' => 'city.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'city.destroy',
        'parent_flag' => 'city.index',
    ],

    [
        'name' => 'Neighbourhoods',
        'flag' => 'neighbourhood.index',
        'parent_flag' => 'plugin.location',
    ],
    [
        'name' => 'Create',
        'flag' => 'neighbourhood.create',
        'parent_flag' => 'neighbourhood.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'neighbourhood.edit',
        'parent_flag' => 'neighbourhood.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'neighbourhood.destroy',
        'parent_flag' => 'neighbourhood.index',
    ],

    [
        'name' => 'Import',
        'flag' => 'location.bulk-import.index',
        'parent_flag' => 'plugin.location',
    ],

    [
        'name' => 'Export',
        'flag' => 'location.export.index',
        'parent_flag' => 'plugin.location',
    ],
];
