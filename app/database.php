<?php
// Database configuração
return [
    /**
     * Options (mysql, sqlite)
     */
    'driver'=>'mysql',

    'sqlite'=>[
        'host'=>'database.db',
    ],

    'mysql'=> [
        'host'=>'locahost',
        'database'=>'curso_microframework',
        'user'=>'root',
        'password'=>'',
        'charset'=>'utf8',
        'colaltion'=>'utf_unicode_ci'
    ]
];