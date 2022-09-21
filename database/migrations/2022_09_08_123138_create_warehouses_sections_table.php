<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses_sections', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse');
            $table->string('section');
            $table->integer('rows');
            $table->integer('columns');
            $table->integer('shelves');
            $table->integer('racks');
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
        Schema::dropIfExists('warehouses_sections');
    }
};
