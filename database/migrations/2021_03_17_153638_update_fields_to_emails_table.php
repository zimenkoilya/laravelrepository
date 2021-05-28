<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->unsignedInteger('case_id')->nullable()->change();
            $table->unsignedInteger('reply_id')->nullable()->change();
            $table->unsignedInteger('msg_rule_id')->nullable()->change();
            $table->unsignedInteger('created_by')->nullable()->change();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created_date');
            $table->dropColumn('updated_by');
            $table->dropColumn('updated_at');
        });
    }
}
