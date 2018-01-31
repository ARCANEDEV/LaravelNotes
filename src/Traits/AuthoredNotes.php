<?php namespace Arcanedev\LaravelNotes\Traits;

use Arcanedev\LaravelNotes\Models\Note;

/**
 * Trait     AuthoredNotes
 *
 * @package  Arcanedev\LaravelNotes\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Illuminate\Database\Eloquent\Collection  authoredNotes
 */
trait AuthoredNotes
{
    /* -----------------------------------------------------------------
     |  Relationships
     | -----------------------------------------------------------------
     */

    /**
     * Relation to ONE note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authoredNotes()
    {
        return $this->hasMany(config('notes.notes.model', Note::class), 'author_id');
    }
}
