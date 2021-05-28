<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToTriggerLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trigger_logs', function (Blueprint $table) {
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->string('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trigger_logs', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created'); 
            $table->dropColumn('updated_at'); 
            $table->dropColumn('created_by'); 
            $table->dropColumn('updated_by'); 
        });
    }
}
