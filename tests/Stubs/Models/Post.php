<?php namespace Arcanedev\LaravelNotes\Tests\Stubs\Models;

use Arcanedev\LaravelNotes\Bases\Model;
use Arcanedev\LaravelNotes\Traits\HasOneNote;

/**
 * Class     Post
 *
 * @package  Arcanedev\LaravelNotes\Tests\Stubs\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Post extends Model
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use HasOneNote;

    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $fillable = ['name', 'email'];
}
