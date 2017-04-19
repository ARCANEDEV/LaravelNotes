<?php namespace Arcanedev\LaravelNotes\Models;

use Arcanedev\LaravelNotes\Traits\ConfigHelper;
use Arcanedev\Support\Bases\Model as BaseModel;

/**
 * Class     AbstractModel
 *
 * @package  Arcanedev\LaravelMessenger\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractModel extends BaseModel
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use ConfigHelper;

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

        $this->setConnection($this->getFromConfig('database.connection'));
        $this->setPrefix($this->getFromConfig('database.prefix'));
    }
}
