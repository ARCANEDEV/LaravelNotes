<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Tests\Stubs\Models;

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
     * @return mixed
     */
    protected function getCurrentAuthorId()
    {
        return $this->getKey();
    }
}
