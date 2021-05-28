<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->change();
            $table->unsignedInteger('created_by')->nullable()->after('updated_at');
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->boolean('suspended')->defualt(0)->change();
            $table->dropColumn('account_id');
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
            $table->unsignedInteger('account_id')->nullable();
            $table->dropColumn('created_by'); 
            $table->dropColumn('updated_by'); 
            $table->dateTime('created_at')->change();
            $table->dateTime('updated_at')->change();
        });
    }
}
