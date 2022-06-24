<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCriterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_criterias', function (Blueprint $table) {
            $table->integer('criteria_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('value');
            $table->timestamps();
            $table->foreign('criteria_id')->references('id')->on('criterias');
            $table->foreign('product_id')->references('id')->on('products'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_criterias');
    }
}
