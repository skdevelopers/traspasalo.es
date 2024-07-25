<?php

return [

    'models' => [

        'permission' => App\Models\Permission::class,
        'role' => App\Models\Role::class,
    ],

    'table_names' => [
        'roles' => 'roles', // Your existing table name
        'permissions' => 'permissions', // Your existing table name
        'model_has_permissions' => 'permission_user', // Your existing pivot table
        'model_has_roles' => 'role_user', // Your existing pivot table
        'role_has_permissions' => 'permission_role', // Your existing pivot table
    ],

    'column_names' => [
        'model_morph_key' => 'user_id', // Your existing user id column in pivot tables
    ],
        // ...
        'cache' => [
            'expiration_time' => 60 * 24, // Cache for one day
            'key' => 'spatie.permission.cache',
            'store' => 'default',
        ],
    

    // Other configuration options...
];
