<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToMkNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mk_numbers', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('setting_id')->change();
            $table->unsignedInteger('ref_id')->change();
            $table->unsignedInteger('vertical_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->timestamp('created_at')->nullable();
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
        Schema::table('mk_numbers', function (Blueprint $table) {
            $table->renameColumn('updated_at', 'updated');
            $table->dropColumn('created_at');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}
