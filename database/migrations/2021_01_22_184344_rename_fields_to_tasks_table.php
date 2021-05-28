<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('assigned_date', 'assigned_at');
            $table->renameColumn('created', 'created_at');
            $table->renameColumn('updated', 'updated_at');
            $table->renameColumn('completed', 'completed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dateTime('created')->change(); 
            $table->dateTime('updated')->change(); 
            $table->dateTime('assigned_date')->change(); 
            $table->dateTime('completed')->change(); 
        });
    }
}
