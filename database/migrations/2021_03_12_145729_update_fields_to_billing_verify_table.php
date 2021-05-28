<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToBillingVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billing_verify', function (Blueprint $table) {
            $table->unsignedInteger('billing_id')->change();
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->after('created_at');
            $table->unsignedInteger('created_by')->change();
            $table->unsignedInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billing_verify', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->dropColumn('updated_at');  
            $table->dropColumn('updated_by');  
        });
    }
}
