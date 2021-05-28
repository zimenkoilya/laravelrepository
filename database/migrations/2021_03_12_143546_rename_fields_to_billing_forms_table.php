<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToBillingFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billing_forms', function (Blueprint $table) {
            $table->renameColumn('created', 'created_at');
            $table->renameColumn('submitted', 'submitted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billing_forms', function (Blueprint $table) {
            $table->dateTime('created')->change();  
            $table->dateTime('submitted')->change();  
        });
    }
}
