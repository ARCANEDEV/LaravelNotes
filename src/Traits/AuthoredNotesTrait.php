<?php

namespace Arcanedev\LaravelNotes\Traits;

use Arcanedev\LaravelNotes\Models\Note;
use Illuminate\Support\Facades\Config;

/**
 * Trait     AuthoredNotesTrait
 *
 * @package  Arcanedev\LaravelNotes\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait AuthoredNotesTrait
{
    /* -----------------------------------------------------------------
     |  Relationships
     | -----------------------------------------------------------------
     */

    /**
     * Relation to ONE note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function authoredNotes()
    {
        return $this->hasMany(Config::get('notes.notes.model', Note::class), 'author_id');
    }

}
