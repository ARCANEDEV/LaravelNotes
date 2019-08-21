# 3. Usage

## Table of contents

  1. [Installation and Setup](1-Installation-and-Setup.md)
  2. [Configuration](2-Configuration.md)
  3. [Usage](3-Usage.md)

First things first, edit your eloquent model by using the `Arcanedev\LaravelNotes\Traits\HasManyNotes` trait.

```php
<?php namespace App;

use Arcanedev\LaravelNotes\Traits\HasManyNotes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasManyNotes;

    // Other stuff ...
}
```

You can also use the `Arcanedev\LaravelNotes\Traits\HasOneNote` trait if you want to manage one note for your model.

#### Add a note to a model.

You can call the `createNote()` method on your Eloquent model like below:

```php
$post = App\Post::first();
$note = $post->createNote('Hello world #1');
```

#### Add With a Author/ User

```php
$user = App\User::first();
$post = App\Post::first();
$note = $post->createNote('Hello world #1', $user);
```

You can also specify how you want to add the `author` id by using the `getCurrentAuthorId()`:

```php
<?php namespace App;

use Arcanedev\LaravelNotes\Traits\HasManyNotes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasManyNotes;

    // Other stuff ...

    /**
     * Get the current author's id.
     *
     * @return int|null
     */
     protected function getCurrentAuthorId()
     {
         return auth()->id();
     }
}
```

#### Add With Title

```php
$post = App\Post::first();
$note = $post->createNote('Hello world #1', null, true, 'Title #1');
```

#### Getting Notes

```php
$post  = App\Post::first();
$notes = $post->notes;
```

> **NOTE :** `$post->notes` relation property is only available in the `HasManyNotes` trait. If you're using `HasOneNote` trait, use `$post->note` instead.    

#### Getting the author's notes

You can also retrieve all the author's notes by using the `Arcanedev\LaravelNotes\Traits\AuthoredNotes` Trait in your User model (for example).

```php
$user = App\User::first();
$post = App\Post::first();
$post->createNote('Hello world #1', $user);

$notes = $user->authoredNotes;
```

#### Finding a note with a specific ID

```php
$post = App\Post::first();
$note = $post->findNote(1);
```

> **NOTE :** The `findNote()` method is only available in the `HasManyNotes` trait.
