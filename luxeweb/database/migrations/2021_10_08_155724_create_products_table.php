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
            $table->id();
            $table->string('name');
            $table->integer('category_id')->default(0);
            $table->float('price')->default(0);
            $table->integer('inventory')->default(1);
            $table->longText('short_description');
            $table->longText('full_description')->nullable();
            $table->longText('link')->nullable();
            $table->longText('etsy_link')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('sold')->default(0);
            $table->tinyInteger('email_button')->default(1);
            $table->tinyInteger('etsy_button')->default(1);
            $table->json('images')->nullable();            
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
