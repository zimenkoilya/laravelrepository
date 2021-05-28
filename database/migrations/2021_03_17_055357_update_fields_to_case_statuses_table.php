<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToCaseStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_statuses', function (Blueprint $table) {
            $table->unsignedInteger('case_id')->change();
            $table->unsignedInteger('status_id')->change();
            $table->unsignedInteger('accounting_status_id')->change();
            $table->unsignedInteger('dialer_id')->change();
            $table->unsignedInteger('account_type_id')->change();
            $table->unsignedInteger('poi_id')->change();
            $table->unsignedInteger('processor_id')->change();
            $table->unsignedInteger('direct_mail_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamp('created_at')->nullable()->change();
            $table->string('updated_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_statuses', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->renameColumn('updated_at', 'updated');
            $table->renameColumn('created_at', 'created');
        });
    }
}
