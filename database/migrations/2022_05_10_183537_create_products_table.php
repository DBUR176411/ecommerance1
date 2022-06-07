<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit');
            $table->double('price')->nullable();
            $table->integer('quantity');
            $table->timestamps();
            //add relation
            $table->unsignedBigInteger('catagory_id');
           $table->foreign('catagory_id')
           ->references('id')
           ->on('Catagories')
           ->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
