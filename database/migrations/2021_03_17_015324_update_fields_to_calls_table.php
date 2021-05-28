<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('case_id')->change();
            $table->unsignedInteger('user_id')->change();
            $table->unsignedInteger('campaign_id')->change();
            $table->unsignedInteger('label_id')->change();
            $table->unsignedInteger('result_id')->change();
            $table->unsignedInteger('type_id')->change();
            $table->unsignedInteger('sip_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->dateTime('created_at')->change();
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
        Schema::table('calls', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->dropColumn('updated_at');  
            $table->dropColumn('created_by');  
            $table->dropColumn('updated_by');  
        });
    }
}
