<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToTemplateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_imports', function (Blueprint $table) {
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_imports', function (Blueprint $table) {
            $table->dropColumn('created_at'); 
            $table->dropColumn('updated_at'); 
            $table->dropColumn('created_by'); 
            $table->dropColumn('updated_by'); 
        });
    }
}
