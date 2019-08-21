<?php

use Arcanedev\LaravelNotes\Bases\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class     CreateDiscussionsTable
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @see \Arcanedev\LaravelNotes\Models\Note
 */
class AddTitlesToNotes extends Migration
{
    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * CreateParticipantsTable constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setTable(config('notes.notes.table', 'notes'));
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table($this->getTableName(), function (Blueprint $table) {
            $table->string('title')->nullable()->default(null)->after('id');
        });
    }

    /**
     * Roll back the migrations
     */
    public function down()
    {
        Schema::table($this->getTableName(), function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
}
