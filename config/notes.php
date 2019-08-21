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
        'table' => config('auth.table', 'users'),
        'model' => config('auth.model', App\User::class),
    ],

    'notes' => [
        'table' => 'notes',
        'model' => Arcanedev\LaravelNotes\Models\Note::class
    ],

];
