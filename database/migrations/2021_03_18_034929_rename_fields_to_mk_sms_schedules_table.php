<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToMkSmsSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mk_sms_schedules', function (Blueprint $table) {
            $table->renameColumn('created_on', 'created_at');
            $table->renameColumn('updated_on', 'updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mk_sms_schedules', function (Blueprint $table) {
            $table->dateTime('created_on')->change();
            $table->string('updated_on')->change();
        });
    }
}
