<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_product', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('car_id');
            $table->unsignedInteger("product_id");
            $table->timestamps();
            $table->foreign("car_id")->references("id")->on("cars");
            $table->foreign("product_id")->references("id")->on("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_products');
    }
}
