<?php

declare(strict_types=1);

use Arcanedev\LaravelNotes\Models\Note;
use Arcanedev\LaravelNotes\Tests\Stubs\Models\{Post, User, UserWithAuthorId};
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory  $factory */
$factory->define(Note::class, function (Faker $f) {
    return [
        'content' => $f->paragraph,
    ];
});

$factory->define(User::class, function (Faker $f) {
    return [
        'name'  => $f->name,
        'email' => $f->safeEmail,
    ];
});

$factory->define(UserWithAuthorId::class, function (Faker $f) {
    return [
        'name'  => $f->name,
        'email' => $f->safeEmail,
    ];
});

$factory->define(Post::class, function (Faker $f) {
    return [
        'title'   => $f->paragraph,
        'content' => $f->paragraphs(5, true),
    ];
});
