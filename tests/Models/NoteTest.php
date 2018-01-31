<?php

namespace Arcanedev\LaravelNotes\Tests\Models;

use Arcanedev\LaravelNotes\Models\Note;
use Arcanedev\LaravelNotes\Tests\Stubs\Models\Post;
use Arcanedev\LaravelNotes\Tests\Stubs\Models\User;
use Arcanedev\LaravelNotes\Tests\Stubs\Models\UserWithAuthorId;
use Arcanedev\LaravelNotes\Tests\TestCase;

/**
 * Class     NoteTest
 *
 * @package  Arcanedev\LaravelNotes\Tests\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class NoteTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Has One Note Tests
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_create_a_note()
    {
        /** @var  Post  $post */
        $post = $this->factory->create(Post::class);

        $this->assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        $this->assertInstanceOf(Note::class, $post->note);

        $this->assertSame($note->id,      $post->note->id);
        $this->assertSame($content,       $post->note->content);
        $this->assertSame($note->content, $post->note->content);

        $this->assertNull($post->note->author);
    }

    /** @test */
    public function it_should_create_single_note_for_has_one_note_trait()
    {
        /** @var  Post  $post */
        $post = $this->factory->create(Post::class);

        $this->assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        $this->assertInstanceOf(Note::class, $post->note);

        $this->assertSame($note->id, $post->note->id);
        $this->assertSame($content, $note->content);
        $this->assertSame($note->content, $post->note->content);

        $note = $post->createNote($content = 'Hello world #2');

        $this->assertInstanceOf(Note::class, $post->note);

        $this->assertSame($note->id, $post->note->id);
        $this->assertSame($content, $note->content);
        $this->assertSame($note->content, $post->note->content);

        $this->assertCount(1, Note::all());
    }

    /** @test */
    public function it_can_create_with_author()
    {
        /**
         * @var  User  $user
         * @var  Post  $post
         */
        $user = $this->factory->create(User::class);
        $post = $this->factory->create(Post::class);

        $note = $post->createNote($content = 'Hello world #1', $user);

        $this->assertSame($content,          $note->content);
        $this->assertSame($content,          $post->note->content);

        $this->assertInstanceOf(User::class, $note->author);
        $this->assertInstanceOf(User::class, $post->note->author);

        $this->assertEquals($user->id, $note->author->id);
        $this->assertEquals($user->id, $post->note->author->id);
    }

    /** @test */
    public function it_can_update_note()
    {
        /** @var  Post  $post */
        $post = $this->factory->create(Post::class);

        $this->assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        $this->assertInstanceOf(Note::class, $post->note);

        $this->assertSame($note->id, $post->note->id);
        $this->assertSame($content, $note->content);
        $this->assertSame($note->content, $post->note->content);

        $post->updateNote($content = 'Hello world #2');

        $this->assertInstanceOf(Note::class, $post->note);

        $this->assertSame($note->id, $post->note->id);
        $this->assertSame($content, $post->note->content);
        $this->assertNotSame($note->content, $post->note->content);

        $this->assertCount(1, Note::all());
    }

    /** @test */
    public function it_can_reverse_relation()
    {
        /** @var  Post  $post */
        $post = $this->factory->create(Post::class);

        $this->assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        $this->assertSame($post->id, $note->noteable->id);
        $this->assertSame($post->title, $note->noteable->title);
        $this->assertSame($post->content, $note->noteable->content);
    }

    /* -----------------------------------------------------------------
     |  Has Many Notes Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_add_note()
    {
        /** @var  User  $user */
        $user = $this->factory->create(User::class);

        $this->assertCount(0, $user->notes);

        $note = $user->createNote($content = 'Hello world #1');

        $this->assertCount(1, $user->notes);
        $this->assertNull($note->author);
    }

    /** @test */
    public function it_can_add_note_without_get_current_author_id_method()
    {
        /** @var  UserWithAuthorId  $user */
        $user = $this->factory->create(UserWithAuthorId::class);

        $this->assertCount(0, $user->notes);

        $note = $user->createNote($content = 'Hello world #1');

        $this->assertCount(1, $user->notes);
        $this->assertSame($user->id, $note->author->id);
    }

    /** @test */
    public function it_can_find_note_by_its_id()
    {
        /** @var  User  $user */
        $user = $this->factory->create(User::class);

        $created = $user->createNote($content = 'Hello world #1');
        $note    = $user->findNote($created->id);

        $this->assertSame($note->id, $created->id);
    }

    /** @test */
    public function user_has_some_authored_notes()
    {
        /** @var User $user1 */
        $user1 = $this->factory->create(User::class);
        $note11 = $user1->createNote('Hello World #1', $user1);
        $note12 = $user1->createNote('Hello World #2', $user1);

        /** @var User $user2 */
        $user2 = $this->factory->create(User::class);
        $note21 = $user2->createNote('Hello World #1', $user2);

        $notes = $user1->authoredNotes;

        $this->assertEquals(2, $notes->count());
    }

    /** @test */
    public function user_has_no_authored_notes()
    {
        /** @var User $user1 */
        $user1 = $this->factory->create(User::class);
        $note11 = $user1->createNote('Hello World #1', $user1);
        $note12 = $user1->createNote('Hello World #2', $user1);

        /** @var User $user2 */
        $user2 = $this->factory->create(User::class);

        $notes = $user2->authoredNotes;

        $this->assertEquals(0, $notes->count());
    }
}
