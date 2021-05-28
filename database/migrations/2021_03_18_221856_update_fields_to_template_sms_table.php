<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToTemplateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_sms', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('ct_id')->change();
            $table->unsignedInteger('created_by')->nullable()->change();
            $table->unsignedInteger('updated_by')->nullable()->change();
            $table->string('created_at')->nullable()->change();
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
        Schema::table('template_sms', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->renameColumn('updated_at', 'updated');
        });
    }
}
