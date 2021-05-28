<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToCallDidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call_dids', function (Blueprint $table) {
            $table->string('did')->change();
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('setting_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('call_dids', function (Blueprint $table) {
            $table->dropColumn('created_by');  
            $table->dropColumn('updated_by');  
            $table->dropColumn('updated_at');  
            $table->dropColumn('created_at');  
        });
    }
}
