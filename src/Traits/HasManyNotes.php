<?php namespace Arcanedev\LaravelNotes\Traits;

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
     * The notes relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany($this->getModelFromConfig('notes'), 'noteable');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
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
}
