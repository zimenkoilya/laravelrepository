<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToAnetPaymentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anet_payment_profiles', function (Blueprint $table) {
            $table->renameColumn('created', 'created_at');
            $table->renameColumn('modified', 'modified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anet_payment_profiles', function (Blueprint $table) {
            $table->dateTime('created')->change();  
            $table->dateTime('modified')->change();  
        });
    }
}
