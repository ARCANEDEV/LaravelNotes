<?php

return [

    /* -----------------------------------------------------------------
     |  Database
     | -----------------------------------------------------------------
     */

    'database' => [
        'connection' => env('DB_CONNECTION', 'mysql'),

        'prefix'     => null,
    ],

    /* -----------------------------------------------------------------
     |  Models
     | -----------------------------------------------------------------
     */

    'authors' => [
        'table' => 'users',
        'model' => App\User::class,
    ],

    'notes' => [
        'table' => 'notes',
        'model' => Arcanedev\LaravelNotes\Models\Note::class
    ],

];
