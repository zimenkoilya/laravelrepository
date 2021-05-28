<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToPaymentScheduleGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_schedule_gateways', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->change();
            $table->unsignedInteger('account_type_id')->nullable()->change();
            $table->unsignedInteger('schedule_type_id')->nullable()->change();
            $table->unsignedInteger('billing_type_id')->nullable()->change();
            $table->unsignedInteger('gateway_id')->nullable()->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->timestamp('created_at')->nullable()->after('updated_by');
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
        Schema::table('payment_schedule_gateways', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
