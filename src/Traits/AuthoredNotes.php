<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Traits;

use Arcanedev\LaravelNotes\Models\Note;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * Relation to Many notes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authoredNotes(): HasMany
    {
        return $this->hasMany(config('notes.notes.model', Note::class), 'author_id');
    }
}
