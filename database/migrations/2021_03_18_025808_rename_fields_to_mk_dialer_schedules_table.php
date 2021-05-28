<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToMkDialerSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mk_dialer_schedules', function (Blueprint $table) {
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
        Schema::table('mk_dialer_schedules', function (Blueprint $table) {
            $table->dateTime('created_on')->change();
            $table->dateTime('updated_on')->change();
        });
    }
}
