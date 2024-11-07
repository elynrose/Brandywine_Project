<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMenusTable extends Migration
{
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id', 'parent_fk_10233269')->references('id')->on('menus');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->foreign('page_id', 'page_fk_10233891')->references('id')->on('content_pages');
        });
    }
}