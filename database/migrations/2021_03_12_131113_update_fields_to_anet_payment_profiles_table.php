<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToAnetPaymentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anet_payment_profiles', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('modified_at')->nullable()->change();
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
        Schema::table('anet_payment_profiles', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->renameColumn('modified_at', 'modified');
            $table->dropColumn('updated_at');
        });
    }
}
