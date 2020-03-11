# 2. Configuration

## Table of contents

  1. [Installation and Setup](1-Installation-and-Setup.md)
  2. [Configuration](2-Configuration.md)
  3. [Usage](3-Usage.md)

You can customize the package by editing the `config/notes.php` config file:

```php
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
```
