<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->integer('stock_number');
            $table->decimal('price', 15, 2)->nullable();
            $table->string('title');
            $table->string('make');
            $table->string('vehicle_model');
            $table->string('body');
            $table->string('capacity');
            $table->string('engine');
            $table->string('fuel_type');
            $table->string('brakes');
            $table->string('mileage');
            $table->string('air_conditioning');
            $table->longText('additional_information')->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
