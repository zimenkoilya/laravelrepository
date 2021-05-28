<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToAccountingTypesCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounting_types_companies', function (Blueprint $table) {
            $table->renameColumn('account_type_id', 'accounting_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounting_types_companies', function (Blueprint $table) {
            $table->renameColumn('accounting_type_id', 'account_type_id');
        });
    }
}
