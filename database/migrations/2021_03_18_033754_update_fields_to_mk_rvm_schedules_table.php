<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToMkRvmSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mk_rvm_schedules', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('campaign_id')->change();
            $table->unsignedInteger('template_id')->change();
            $table->unsignedInteger('list_id')->change();
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
        Schema::table('mk_rvm_schedules', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created_on');
            $table->renameColumn('updated_at', 'updated_on');
        });
    }
}
