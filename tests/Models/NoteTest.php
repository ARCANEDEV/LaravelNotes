<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Tests\Models;

use Arcanedev\LaravelNotes\Models\Note;
use Arcanedev\LaravelNotes\Tests\Stubs\Factories\{PostFactory, UserFactory, UserWithAuthorIdFactory};
use Arcanedev\LaravelNotes\Tests\Stubs\Models\User;
use Arcanedev\LaravelNotes\Tests\TestCase;

/**
 * Class     NoteTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class NoteTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests [Has One Note]
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_note(): void
    {
        $post = $this->createPost();

        static::assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        static::assertInstanceOf(Note::class, $post->note);

        static::assertSame($note->id,      $post->note->id);
        static::assertSame($content,       $post->note->content);
        static::assertSame($note->content, $post->note->content);

        static::assertNull($post->note->author);
    }

    /** @test */
    public function it_should_create_single_note_for_has_one_note_trait(): void
    {
        $post = $this->createPost();

        static::assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        static::assertInstanceOf(Note::class, $post->note);

        static::assertSame($note->id, $post->note->id);
        static::assertSame($content, $note->content);
        static::assertSame($note->content, $post->note->content);

        $note = $post->createNote($content = 'Hello world #2');

        static::assertInstanceOf(Note::class, $post->note);

        static::assertSame($note->id, $post->note->id);
        static::assertSame($content, $note->content);
        static::assertSame($note->content, $post->note->content);

        static::assertCount(1, Note::all());
    }

    /** @test */
    public function it_can_create_with_author(): void
    {
        $user = $this->createUser();
        $post = $this->createPost();

        $note = $post->createNote($content = 'Hello world #1', $user);

        static::assertSame($content,          $note->content);
        static::assertSame($content,          $post->note->content);

        static::assertInstanceOf(User::class, $note->author);
        static::assertInstanceOf(User::class, $post->note->author);

        static::assertEquals($user->id, $note->author->id);
        static::assertEquals($user->id, $post->note->author->id);
    }

    /** @test */
    public function it_can_update_note(): void
    {
        $post = $this->createPost();

        static::assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        static::assertInstanceOf(Note::class, $post->note);

        static::assertSame($note->id, $post->note->id);
        static::assertSame($content, $note->content);
        static::assertSame($note->content, $post->note->content);

        $post->updateNote($content = 'Hello world #2');

        static::assertInstanceOf(Note::class, $post->note);

        static::assertSame($note->id, $post->note->id);
        static::assertSame($content, $post->note->content);
        static::assertNotSame($note->content, $post->note->content);

        static::assertCount(1, Note::all());
    }

    /** @test */
    public function it_can_reverse_relation(): void
    {
        $post = $this->createPost();

        static::assertNull($post->note);

        $note = $post->createNote($content = 'Hello world #1');

        static::assertSame($post->id, $note->noteable->id);
        static::assertSame($post->title, $note->noteable->title);
        static::assertSame($post->content, $note->noteable->content);
    }

    /* -----------------------------------------------------------------
     |  [Tests] Has Many Notes
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_add_note(): void
    {
        $user = $this->createUser();

        static::assertCount(0, $user->notes);

        $note = $user->createNote($content = 'Hello world #1');

        static::assertCount(1, $user->notes);
        static::assertNull($note->author);
    }

    /** @test */
    public function it_can_add_note_without_get_current_author_id_method(): void
    {
        $user = $this->createUserWithAuthorId();

        static::assertCount(0, $user->notes);

        $note = $user->createNote($content = 'Hello world #1');

        static::assertCount(1, $user->notes);
        static::assertSame($user->id, $note->author->id);
    }

    /** @test */
    public function it_can_find_note_by_its_id(): void
    {
        $user = $this->createUser();

        $created = $user->createNote($content = 'Hello world #1');
        $note    = $user->findNote($created->id);

        static::assertSame($note->id, $created->id);
    }

    /** @test */
    public function it_can_retrieve_authored_notes(): void
    {
        $user = $this->createUser();

        static::assertCount(0, $user->notes);
        static::assertCount(0, $user->authoredNotes);

        $user->createNote('Hello World #1', $user);
        $user->createNote('Hello World #2', $user);

        static::assertCount(2, $user->notes);
        static::assertCount(2, $user->authoredNotes()->get());
    }

    /** @test */
    public function it_must_retrieve_authored_notes_foreach_owner(): void
    {
        $userOne = $this->createUserWithAuthorId();
        $userTwo = $this->createUserWithAuthorId();

        $userOne->createNote('Hello World #1');
        $userOne->createNote('Hello World #2', $userTwo);

        static::assertCount(2, $userOne->notes);
        static::assertCount(1, $userOne->authoredNotes);

        static::assertCount(0, $userTwo->notes);
        static::assertCount(1, $userTwo->authoredNotes);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Create a post.
     *
     * @return \Arcanedev\LaravelNotes\Tests\Stubs\Models\Post|mixed
     */
    protected static function createPost()
    {
        return PostFactory::new()->create();
    }

    /**
     * Create a user.
     *
     * @return \Arcanedev\LaravelNotes\Tests\Stubs\Models\User|mixed
     */
    protected static function createUser()
    {
        return UserFactory::new()->create();
    }

    /**
     * Create a user with author id associated.
     *
     * @return \Arcanedev\LaravelNotes\Tests\Stubs\Models\UserWithAuthorId|mixed
     */
    protected static function createUserWithAuthorId()
    {
        return UserWithAuthorIdFactory::new()->create();
    }
}
