<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedInteger('case_id')->change();
            $table->unsignedInteger('message_user_id')->change();
            $table->unsignedInteger('template_id')->change();
            $table->string('exp_date')->nullable()->change();
            $table->unsignedInteger('created_by')->nullable()->change();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->timestamp('created_at')->nullable()->change();
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
        Schema::table('notifications', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created_date');
            $table->dropColumn('updated_by');
            $table->dropColumn('updated_at');
        });
    }
}
