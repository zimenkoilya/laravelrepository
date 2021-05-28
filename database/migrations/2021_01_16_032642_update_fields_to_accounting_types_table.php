<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToAccountingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounting_types', function (Blueprint $table) {
            $table->boolean('active')->default(1)->change();
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
        Schema::table('accounting_types', function (Blueprint $table) {
            $table->dropColumn('created_at'); 
            $table->dropColumn('updated_at'); 
        });
    }
}
