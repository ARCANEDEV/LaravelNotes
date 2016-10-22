<?php

use Arcanedev\LaravelNotes\Bases\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class     CreatePostsTable
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CreatePostsTable extends Migration
{
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * CreateParticipantsTable constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setTable('posts');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->createSchema(function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });
    }
}
