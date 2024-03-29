<?php

return [


    // Name of the department. Delete this line and uncomment the other to change name
    'department_name' => env('APP_NAME', 'FiveM DMS'),
    // 'department_name' => "Blane County SO",

    // If members must fill out an application to join department. If false then admin must approve member.
    'must_apply' => false,

    //steam_hexes of users that can skip permission checks. Be very careful
    'skip_permissions' => [],

    //steam_hexes of users that other users other than skip_permissions and super admin cant edit
    'untouchable' => [],

];
