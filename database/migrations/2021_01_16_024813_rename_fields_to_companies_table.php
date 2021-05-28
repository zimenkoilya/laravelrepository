<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->renameColumn('is_active', 'active');
            $table->renameColumn('susp', 'suspended');
            $table->renameColumn('created', 'created_at');
            $table->renameColumn('updated', 'updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->renameColumn('active', 'is_active');
            $table->renameColumn('suspended', 'susp');
            $table->renameColumn('created_at', 'created');
            $table->renameColumn('updated_at', 'updated');
        });
    }
}
