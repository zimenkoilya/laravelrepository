<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToCompanyBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_billing', function (Blueprint $table) {
            $table->unsignedInteger('type_id')->change();
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('created_by')->nullable()->change();
            $table->unsignedInteger('updated_by')->nullable()->change();
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
        Schema::table('company_billing', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->renameColumn('updated_at', 'updated');
        });
    }
}
