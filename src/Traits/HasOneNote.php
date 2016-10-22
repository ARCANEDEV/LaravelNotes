<?php namespace Arcanedev\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait     HasOneNote
 *
 * @package  Arcanedev\LaravelNotes\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Arcanedev\LaravelNotes\Models\Note  note
 *
 * @method    \Illuminate\Database\Eloquent\Relations\MorphOne  morphOne(string $related, string $name, string $type = null, string $id = null, string $localKey = null)
 */
trait HasOneNote
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use ConfigHelper;

    /* ------------------------------------------------------------------------------------------------
     |  Relationships
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Relation to ONE note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function note()
    {
        return $this->morphOne($this->getModelFromConfig('notes'), 'noteable');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Create a note.
     *
     * @param  string                                    $content
     * @param  \Illuminate\Database\Eloquent\Model|null  $author
     * @param  bool                                      $reload
     *
     * @return \Arcanedev\LaravelNotes\Models\Note
     */
    public function createNote($content, $author = null, $reload = true)
    {
        if ($this->note) $this->note->delete();

        /** @var \Arcanedev\LaravelNotes\Models\Note $note */
        $note = $this->note()->create(
            $this->prepareNoteAttributes($content, $author)
        );

        if ($reload) $this->load(['note']);

        return $note;
    }

    /**
     * Update a note.
     *
     * @param  string                                    $content
     * @param  \Illuminate\Database\Eloquent\Model|null  $author
     * @param  bool                                      $reload
     *
     * @return bool
     */
    public function updateNote($content, Model $author = null, $reload = true)
    {
        $updated = $this->note->update(
            $this->prepareNoteAttributes($content, $author)
        );

        if ($reload) $this->load(['note']);

        return $updated;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Prepare note attributes.
     *
     * @param  string                                    $content
     * @param  \Illuminate\Database\Eloquent\Model|null  $author
     *
     * @return array
     */
    protected function prepareNoteAttributes($content, Model $author = null)
    {
        return [
            'content'   => $content,
            'author_id' => is_null($author) ? null : $author->getKey()
        ];
    }
}
