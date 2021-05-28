<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToCaseContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_contact', function (Blueprint $table) {
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
        Schema::table('case_contact', function (Blueprint $table) {
            $table->dateTime('created')->change();
            $table->dateTime('updated')->change();
        });
    }
}
