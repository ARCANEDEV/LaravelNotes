<?php namespace Arcanedev\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Class     HasManyNotes
 *
 * @package  Arcanedev\LaravelNotes\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Illuminate\Database\Eloquent\Collection  notes
 *
 * @method    \Illuminate\Database\Eloquent\Relations\MorphMany  morphMany(string $related, string $name, string $type = null, string $id = null, string $localKey = null)
 */
trait HasManyNotes
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use ConfigHelper;

    /* -----------------------------------------------------------------
     |  Relationships
     | -----------------------------------------------------------------
     */

    /**
     * The notes relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany($this->getModelFromConfig('notes'), 'noteable');
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
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
        /** @var \Arcanedev\LaravelNotes\Models\Note $note */
        $note = $this->notes()->create(
            $this->prepareNoteAttributes($content, $author)
        );

        if ($reload) $this->load(['notes']);

        return $note;
    }

    /**
     * Retrieve a note by its ID.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findNote($id)
    {
        return $this->notes()->where('id', $id)->first();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
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
            'author_id' => is_null($author) ? $this->getCurrentAuthorId() : $author->getKey(),
            'content'   => $content,
        ];
    }

    /**
     * Get the current author's id.
     *
     * @return int|null
     */
    protected function getCurrentAuthorId()
    {
        return null;
    }
}
