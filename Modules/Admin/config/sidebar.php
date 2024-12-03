<?php

return [
    'name' => 'Admin',
    'canAny' => [],
    'navigation' => [
        [
            'name' => __('admin::general.menu.dashboard'),
            'url' => 'admin.dashboard',
            'icon' => 'ki-outline ki-element-11 fs-2',
            'can' => []
        ],
        [
            'name' => __('admin::general.menu.users'),
            'url' => 'admin.users.index',
            'icon' => 'ki-outline ki-people fs-2',
            'can' => [],
        ]
        // [
        //     'name' => __('admin::general.menu.emergency-calls'),
        //     'url' => 'admin.emergency-call.list',
        //     'icon' => 'ki-outline ki-abstract-41 fs-2',
        //     'can' => []
        // ],
        // [
        //     'name' => __('admin::general.menu.transport'),
        //     'icon' => 'ki-outline ki-delivery fs-2',
        //     'children' => [
        //         [
        //             'name' => __('admin::general.menu.cars'),
        //             'url' => 'admin.transport.car.list',
        //             'can' => []
        //         ],
        //     ],
        //     'can' => []
        // ],
        // [
        //     'name' => __('admin::general.menu.employees'),
        //     'url' => 'admin.user.list',
        //     'icon' => 'ki-outline ki-people fs-2',
        //     'can' => []
        // ],
        // [
        //     'name' => __('admin::general.menu.admin-panel'),
        //     'icon' => 'ki-outline ki-user fs-2',
        //     'children' => [
        //         [
        //             'name' => __('admin::general.menu.AccidentCategoriesList'),
        //             'url' => 'admin.accident.category.list',
        //             'can' => []
        //         ],
        //         [
        //             'name' => __('admin::general.menu.organisationList'),
        //             'url' => 'admin.organisation.list',
        //             'can' => []
        //         ],
        //         [
        //             'name' => __('admin::general.menu.RegionList'),
        //             'url' => 'admin.region.list',
        //             'can' => []
        //         ],
        //         [
        //             'name' => __('admin::general.menu.DepartmentList'),
        //             'url' => 'admin.department.list',
        //             'can' => []
        //         ],
        //         [
        //             'name' => __('admin::general.menu.Setting'),
        //             'url' => 'admin.settings.list',
        //             'can' => []
        //         ],
        //         [
        //             'name' => __('admin::general.menu.Roles'),
        //             'url' => 'admin.role.list',
        //             'can' => []
        //         ],
        //         [
        //             'name' => __('admin::general.menu.Permissions'),
        //             'url' => 'admin.permission.list',
        //             'permission' => 'read Role'

        //         ],
        //     ],

        // ],
        // ... other menu items
    ],
];
