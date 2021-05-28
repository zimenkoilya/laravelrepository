<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToPaymentScheduleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_schedule_types', function (Blueprint $table) {
            $table->dropColumn('account_type_id');
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
        Schema::table('payment_schedule_types', function (Blueprint $table) {
            $table->string('account_type_id')->nullable();
            $table->dropColumn('created_at'); 
            $table->dropColumn('updated_at'); 
        });
    }
}
