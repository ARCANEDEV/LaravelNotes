<?php namespace Arcanedev\LaravelNotes\Tests\Stubs\Models;

use Arcanedev\LaravelNotes\Models\AbstractModel;
use Arcanedev\LaravelNotes\Traits\HasManyNotes;

/**
 * Class     User
 *
 * @package  Arcanedev\LaravelNotes\Tests\Stubs\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class User extends AbstractModel
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use HasManyNotes;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */
    /**
     * Get the current author's id.
     *
     * @return int|null
     */
    protected function getCurrentAuthorId()
    {
        return $this->id;
    }
}
