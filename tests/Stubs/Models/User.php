<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Tests\Stubs\Models;

use Arcanedev\LaravelNotes\Traits\{AuthoredNotes, HasManyNotes};
use Arcanedev\Support\Database\Model;
use Illuminate\Support\Arr;

/**
 * Class     User
 *
 * @package  Arcanedev\LaravelNotes\Tests\Stubs\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  int  id
 */
class User extends Model
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasManyNotes,
        AuthoredNotes;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * Note constructor.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $config = config('notes.database', []);

        $this->setConnection(Arr::get($config, 'connection'));
        $this->setPrefix(Arr::get($config, 'prefix'));
    }
}
