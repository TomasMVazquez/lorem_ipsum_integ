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

      // Insert subcategories
      DB::table('presentation_product')->insert(
        array(
          array('presentation_id' => '3','product_id' => '1'),
          array('presentation_id' => '4','product_id' => '1'),
          array('presentation_id' => '5','product_id' => '1'),
          array('presentation_id' => '6','product_id' => '2'),
          array('presentation_id' => '1','product_id' => '3'),
          array('presentation_id' => '2','product_id' => '3'),
          array('presentation_id' => '7','product_id' => '4'),
          array('presentation_id' => '8','product_id' => '4'),
          array('presentation_id' => '9','product_id' => '5'),
          array('presentation_id' => '10','product_id' => '5'),
          array('presentation_id' => '11','product_id' => '6')
      ));

      //Insert images
      DB::table('images')->insert(
        array(
          array('product_id' => '1','route' => '/imgs/items/1.jpg'),
          array('product_id' => '2','route' => '/imgs/items/2.jpg'),
          array('product_id' => '3','route' => '/imgs/items/3.jpg'),
          array('product_id' => '4','route' => '/imgs/items/4.jpg'),
          array('product_id' => '5','route' => '/imgs/items/5.jpg'),
          array('product_id' => '6','route' => '/imgs/items/6.jpg')
      ));

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
