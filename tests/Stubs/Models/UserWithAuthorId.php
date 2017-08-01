<?php namespace Arcanedev\LaravelNotes\Tests\Stubs\Models;

use Arcanedev\LaravelNotes\Models\AbstractModel;
use Arcanedev\LaravelNotes\Traits\HasManyNotes;

/**
 * Class     UserWithAuthorId
 *
 * @package  Arcanedev\LaravelNotes\Tests\Stubs\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class UserWithAuthorId extends User
{
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
