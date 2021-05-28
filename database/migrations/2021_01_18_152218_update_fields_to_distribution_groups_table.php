<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToDistributionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribution_groups', function (Blueprint $table) {
            $table->unsignedInteger('department_id')->nullable()->change();
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->nullable()->after('created_at');
            $table->unsignedInteger('created_by')->nullable()->change();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distribution_groups', function (Blueprint $table) {
            $table->dropColumn('updated_at'); 
            $table->dropColumn('updated_by'); 
        });
    }
}
