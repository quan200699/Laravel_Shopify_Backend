<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->boolean('status')->nullable();
            $table->string('preservation')->nullable();
            $table->string('ingredient')->nullable();
            $table->integer('mass')->nullable();
            $table->string('description')->nullable();
            $table->integer('saleOff')->nullable();
            $table->timestamp('createdDate')->nullable();
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
}
