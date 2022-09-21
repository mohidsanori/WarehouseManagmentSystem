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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('brand');
            $table->string('category');
            $table->string('status');
            $table->integer('min_stock');
            $table->integer('quantity')->default(0);
            $table->integer('reorder')->nullable();
            $table->integer('linked_quantity')->default(0);
            $table->string('sale_price')->nullable();
            $table->string('product_image')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
