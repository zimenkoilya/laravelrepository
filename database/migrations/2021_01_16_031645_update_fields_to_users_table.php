<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->string('password')->nullable()->after('email_verified_at');
            $table->string('remember_token', 100)->nullable()->after('passwd');
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->nullable()->after('created_at');

            $table->unsignedInteger('created_by')->nullable()->change();
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('updated_at'); 
            $table->dropColumn('updated_by'); 
            $table->dropColumn('email_verified_at'); 
            $table->dropColumn('password'); 
            $table->dropColumn('remember_token'); 
        });
    }
}
