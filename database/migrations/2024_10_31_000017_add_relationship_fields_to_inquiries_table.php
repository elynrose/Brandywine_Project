<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id', 'inventory_fk_10233284')->references('id')->on('inventories');
        });
    }
}
