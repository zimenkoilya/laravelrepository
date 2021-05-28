<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToKbLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kb_log', function (Blueprint $table) {
            $table->unsignedInteger('post_id')->change();
            $table->unsignedInteger('user_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->timestamp('created_at')->nullable()->change()->after('updated_by');
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
        Schema::table('kb_log', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('updated_at');
        });
    }
}
