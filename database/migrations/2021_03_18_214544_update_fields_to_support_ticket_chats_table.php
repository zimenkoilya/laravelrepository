<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsToSupportTicketChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_ticket_chats', function (Blueprint $table) {
            $table->unsignedInteger('service_desk_item_id')->change();
            $table->unsignedInteger('created_by')->nullable()->change();
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
        Schema::table('support_ticket_chats', function (Blueprint $table) {
            $table->renameColumn('created_at', 'created');
            $table->dropColumn('updated_by');
            $table->dropColumn('updated_at');
        });
    }
}
