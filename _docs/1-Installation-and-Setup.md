# 1. Installation

## Table of contents

  1. [Installation and Setup](1-Installation-and-Setup.md)
  2. [Configuration](2-Configuration.md)
  3. [Usage](3-Usage.md)

## Server Requirements

The Laravel Notes package has a few system requirements:

```
- PHP >= 7.1.3
```

## Version Compatibility

| Laravel Notes                            | Laravel                                                                                |
|:-----------------------------------------|:---------------------------------------------------------------------------------------|
| ![Laravel Notes v0.x][laravel_notes_0_x] | ![Laravel v5.1][laravel_5_1] ![Laravel v5.2][laravel_5_2] ![Laravel v5.3][laravel_5_3] |
| ![Laravel Notes v1.x][laravel_notes_1_x] | ![Laravel v5.4][laravel_5_4]                                                           |
| ![Laravel Notes v2.x][laravel_notes_2_x] | ![Laravel v5.5][laravel_5_5]                                                           |
| ![Laravel Notes v3.x][laravel_notes_3_x] | ![Laravel v5.6][laravel_5_6]                                                           |
| ![Laravel Notes v4.x][laravel_notes_4_x] | ![Laravel v5.7][laravel_5_7]                                                           |
| ![Laravel Notes v5.x][laravel_notes_5_x] | ![Laravel v5.8][laravel_5_8]                                                           |
| ![Laravel Notes v6.x][laravel_notes_6_x] | ![Laravel v6.0][laravel_6_0]                                                           |

[laravel_5_1]:  https://img.shields.io/badge/v5.1-supported-brightgreen.svg?style=flat-square "Laravel v5.1"
[laravel_5_2]:  https://img.shields.io/badge/v5.2-supported-brightgreen.svg?style=flat-square "Laravel v5.2"
[laravel_5_3]:  https://img.shields.io/badge/v5.3-supported-brightgreen.svg?style=flat-square "Laravel v5.3"
[laravel_5_4]:  https://img.shields.io/badge/v5.4-supported-brightgreen.svg?style=flat-square "Laravel v5.4"
[laravel_5_5]:  https://img.shields.io/badge/v5.5-supported-brightgreen.svg?style=flat-square "Laravel v5.5"
[laravel_5_6]:  https://img.shields.io/badge/v5.6-supported-brightgreen.svg?style=flat-square "Laravel v5.6"
[laravel_5_7]:  https://img.shields.io/badge/v5.7-supported-brightgreen.svg?style=flat-square "Laravel v5.7"
[laravel_5_8]:  https://img.shields.io/badge/v5.8-supported-brightgreen.svg?style=flat-square "Laravel v5.8"
[laravel_6_0]:  https://img.shields.io/badge/v6.0-supported-brightgreen.svg?style=flat-square "Laravel v6.0"

[laravel_notes_0_x]: https://img.shields.io/badge/version-0.*-blue.svg?style=flat-square "LaravelNotes v0.*"
[laravel_notes_1_x]: https://img.shields.io/badge/version-1.*-blue.svg?style=flat-square "LaravelNotes v1.*"
[laravel_notes_2_x]: https://img.shields.io/badge/version-2.*-blue.svg?style=flat-square "LaravelNotes v2.*"
[laravel_notes_3_x]: https://img.shields.io/badge/version-3.*-blue.svg?style=flat-square "LaravelNotes v3.*"
[laravel_notes_4_x]: https://img.shields.io/badge/version-4.*-blue.svg?style=flat-square "LaravelNotes v4.*"
[laravel_notes_5_x]: https://img.shields.io/badge/version-5.*-blue.svg?style=flat-square "LaravelNotes v5.*"
[laravel_notes_6_x]: https://img.shields.io/badge/version-6.*-blue.svg?style=flat-square "LaravelNotes v6.*"

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
