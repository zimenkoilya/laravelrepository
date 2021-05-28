<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToCallSupressionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call_supression', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('created_by')->change();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->string('created_at')->change();
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
        Schema::table('call_supression', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->dropColumn('updated_by');  
            $table->dropColumn('updated_at');
        });
    }
}
