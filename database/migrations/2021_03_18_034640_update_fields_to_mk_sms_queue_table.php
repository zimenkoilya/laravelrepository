<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToMkSmsQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mk_sms_queue', function (Blueprint $table) {
            $table->unsignedInteger('schedule_id')->change();
            $table->unsignedInteger('data_id')->change();
            $table->unsignedInteger('status_id')->change();
            $table->unsignedInteger('message_id')->change();
            $table->unsignedInteger('number_id')->change();
            $table->unsignedInteger('wallet_trans_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mk_sms_queue', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->renameColumn('updated_at', 'updated');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}
