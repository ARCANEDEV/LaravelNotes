# 1. Installation

## Table of contents

  1. [Installation and Setup](1-Installation-and-Setup.md)
  2. [Configuration](2-Configuration.md)
  3. [Usage](3-Usage.md)

## Version Compatibility

| Laravel                      | Laravel Notes                            |
|:-----------------------------|:-----------------------------------------|
| ![Laravel v9.x][laravel_9_x] | ![Laravel Notes v9.x][laravel_notes_9_x] |
| ![Laravel v8.x][laravel_8_x] | ![Laravel Notes v8.x][laravel_notes_8_x] |
| ![Laravel v7.x][laravel_7_x] | ![Laravel Notes v7.x][laravel_notes_7_x] |
| ![Laravel v6.x][laravel_6_x] | ![Laravel Notes v6.x][laravel_notes_6_x] |
| ![Laravel v5.8][laravel_5_8] | ![Laravel Notes v5.x][laravel_notes_5_x] |
| ![Laravel v5.7][laravel_5_7] | ![Laravel Notes v4.x][laravel_notes_4_x] |
| ![Laravel v5.6][laravel_5_6] | ![Laravel Notes v3.x][laravel_notes_3_x] |
| ![Laravel v5.5][laravel_5_5] | ![Laravel Notes v2.x][laravel_notes_2_x] |
| ![Laravel v5.4][laravel_5_4] | ![Laravel Notes v1.x][laravel_notes_1_x] |
| ![Laravel v5.3][laravel_5_3] | ![Laravel Notes v0.x][laravel_notes_0_x] |
| ![Laravel v5.2][laravel_5_2] | ![Laravel Notes v0.x][laravel_notes_0_x] |
| ![Laravel v5.1][laravel_5_1] | ![Laravel Notes v0.x][laravel_notes_0_x] |

[laravel_9_x]:  https://img.shields.io/badge/version-9.x-blue.svg?style=flat-square "Laravel v9.x"
[laravel_8_x]:  https://img.shields.io/badge/version-8.x-blue.svg?style=flat-square "Laravel v8.x"
[laravel_7_x]:  https://img.shields.io/badge/version-7.x-blue.svg?style=flat-square "Laravel v7.x"
[laravel_6_x]:  https://img.shields.io/badge/version-6.x-blue.svg?style=flat-square "Laravel v6.x"
[laravel_5_8]:  https://img.shields.io/badge/version-5.8-blue.svg?style=flat-square "Laravel v5.8"
[laravel_5_7]:  https://img.shields.io/badge/version-5.7-blue.svg?style=flat-square "Laravel v5.7"
[laravel_5_6]:  https://img.shields.io/badge/version-5.6-blue.svg?style=flat-square "Laravel v5.6"
[laravel_5_5]:  https://img.shields.io/badge/version-5.5-blue.svg?style=flat-square "Laravel v5.5"
[laravel_5_4]:  https://img.shields.io/badge/version-5.4-blue.svg?style=flat-square "Laravel v5.4"
[laravel_5_3]:  https://img.shields.io/badge/version-5.3-blue.svg?style=flat-square "Laravel v5.3"
[laravel_5_2]:  https://img.shields.io/badge/version-5.2-blue.svg?style=flat-square "Laravel v5.2"
[laravel_5_1]:  https://img.shields.io/badge/version-5.1-blue.svg?style=flat-square "Laravel v5.1"

[laravel_notes_9_x]: https://img.shields.io/badge/version-9.x-blue.svg?style=flat-square "LaravelNotes v9.x"
[laravel_notes_8_x]: https://img.shields.io/badge/version-8.x-blue.svg?style=flat-square "LaravelNotes v8.x"
[laravel_notes_7_x]: https://img.shields.io/badge/version-7.x-blue.svg?style=flat-square "LaravelNotes v7.x"
[laravel_notes_6_x]: https://img.shields.io/badge/version-6.x-blue.svg?style=flat-square "LaravelNotes v6.x"
[laravel_notes_5_x]: https://img.shields.io/badge/version-5.x-blue.svg?style=flat-square "LaravelNotes v5.x"
[laravel_notes_4_x]: https://img.shields.io/badge/version-4.x-blue.svg?style=flat-square "LaravelNotes v4.x"
[laravel_notes_3_x]: https://img.shields.io/badge/version-3.x-blue.svg?style=flat-square "LaravelNotes v3.x"
[laravel_notes_2_x]: https://img.shields.io/badge/version-2.x-blue.svg?style=flat-square "LaravelNotes v2.x"
[laravel_notes_1_x]: https://img.shields.io/badge/version-1.x-blue.svg?style=flat-square "LaravelNotes v1.x"
[laravel_notes_0_x]: https://img.shields.io/badge/version-0.x-blue.svg?style=flat-square "LaravelNotes v0.x"

## Composer

You can install this package via [Composer](http://getcomposer.org/) by running this command: `composer require arcanedev/laravel-notes`.

## Laravel

### Setup

> **NOTE :** The package will automatically register itself if you're using Laravel `>= v5.5`, so you can skip this section.

Once the package is installed, you can register the service provider in `config/app.php` in the `providers` array:

```php
// config/app.php

'providers' => [
    ...
    Arcanedev\LaravelNotes\LaravelNotesServiceProvider::class,
],
```

### Artisan commands

To publish the `notes.php` config file, run this command:

```bash
php artisan vendor:publish --provider="Arcanedev\LaravelNotes\LaravelNotesServiceProvider"
```
