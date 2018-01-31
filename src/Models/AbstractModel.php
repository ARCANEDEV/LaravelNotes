<?php namespace Arcanedev\LaravelNotes\Models;

use Arcanedev\Support\Database\Model;

/**
 * Class     AbstractModel
 *
 * @package  Arcanedev\LaravelMessenger\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractModel extends Model
{
    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * AbstractModel constructor.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('notes.database.connection'));
        $this->setPrefix(config('notes.database.prefix'));
    }
}
