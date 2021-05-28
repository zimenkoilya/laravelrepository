<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToEmailImapAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_imap_accounts', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->change();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamp('created_at')->nullable()->change();
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
        Schema::table('email_imap_accounts', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('updated_at');
        });
    }
}
