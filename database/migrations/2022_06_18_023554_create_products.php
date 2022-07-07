<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string('name', 200);
            $table->string('description', 2000);
            $table->string('support', 2000);
            $table->integer('category_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');   
            $table->foreign('vendor_id')->references('id')->on('vendors'); 
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
}
