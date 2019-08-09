<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationalsTablesDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('images', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('product_id')->nullable();
          $table->foreign('product_id')->references('id')->on('products');
          $table->string('route');
          $table->timestamps();
      });

      Schema::create('presentation_product', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('presentation_id')->nullable();
          $table->foreign('presentation_id')->references('id')->on('presentations');
          $table->unsignedBigInteger('product_id')->nullable();
          $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('presentation_product');
    }
}
