<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToCallNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call_notes', function (Blueprint $table) {
            $table->unsignedInteger('call_id')->change();
            $table->unsignedInteger('created_by')->change();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->timestamp('created_at')->nullable()->change();
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
        Schema::table('call_notes', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created_date');
            $table->dropColumn('updated_by');  
            $table->dropColumn('updated_at');  
        });
    }
}
