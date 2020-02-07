<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Bases;

use Arcanedev\Support\Database\Migration as BaseMigration;

/**
 * Class     Migration
 *
 * @package  Arcanedev\LaravelMessenger\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Migration extends BaseMigration
{
    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->setConnection(config('notes.database.connection'));
        $this->setPrefix(config('notes.database.prefix'));
    }
}
