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
class CreateNotesTable extends Migration
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
        $this->createSchema(function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->morphs('noteable');
            $table->unsignedInteger('author_id')->nullable();
            $table->timestamps();

            $table->foreign('author_id')
                  ->references('id')
                  ->on(config('notes.authors.table', 'users'))
                  ->onDelete('cascade');
        });
    }
}
