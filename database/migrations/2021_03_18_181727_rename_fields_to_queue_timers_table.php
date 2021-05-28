<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToQueueTimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queue_timers', function (Blueprint $table) {
            $table->renameColumn('created', 'created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('queue_timers', function (Blueprint $table) {
            $table->dateTime('created')->change();
        });
    }
}
