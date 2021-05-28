<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->nullable()->after('created_at');
            $table->unsignedInteger('created_by')->nullable()->after('updated_at');
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            // $table->dropColumn(['cost_per_lead', 'system', 'phone']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            // $table->string('cost_per_lead')->nullable();
            // $table->string('system')->nullable();
            // $table->string('phone')->nullable();
            $table->dateTime('created_at')->change();
            $table->dropColumn('updated_at');    
            $table->dropColumn('created_by');    
            $table->dropColumn('updated_by');    
        });
    }
}
