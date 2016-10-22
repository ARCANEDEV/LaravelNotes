<?php namespace Arcanedev\LaravelNotes\Tests\Stubs\Models;

use Arcanedev\LaravelNotes\Bases\Model;
use Arcanedev\LaravelNotes\Traits\HasManyNotes;

/**
 * Class     User
 *
 * @package  Arcanedev\LaravelNotes\Tests\Stubs\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class User extends Model
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use HasManyNotes;

    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $fillable = ['name', 'email'];

    protected $casts = [
        'id' => 'integer',
    ];
}
