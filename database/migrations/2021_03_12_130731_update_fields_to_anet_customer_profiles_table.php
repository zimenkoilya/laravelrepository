<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToAnetCustomerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anet_customer_profiles', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('modified_at')->nullable()->change();
            $table->timestamp('confirmed_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anet_customer_profiles', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->renameColumn('modified_at', 'modified');
            $table->renameColumn('confirmed_at', 'confirmed');
            $table->dropColumn('updated_at'); 
        });
    }
}
