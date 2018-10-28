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
        'host'=>'localhost',
        'database'=>'curso_microframework',
        'user'=>'root',
        'password'=>'',
        'charset'=>'utf8',
        'collation'=>'utf_unicode_ci'
    ]
];