<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToCaseEmailAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_email_accounts', function (Blueprint $table) {
            $table->renameColumn('created', 'created_at');
            $table->renameColumn('modified', 'updated_at');
            $table->renameColumn('modified_by', 'updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_email_accounts', function (Blueprint $table) {
            $table->dateTime('created')->change();
            $table->dateTime('modified')->change();
            $table->unsignedInteger('modified_by')->change();
        });
    }
}
