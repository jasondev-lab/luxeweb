<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->integer('dealer_id');
            $table->string('name');
            $table->string('state');
            $table->string('address');
            $table->string('web_address')->nullable();
            $table->string('card')->nullable();
            $table->integer('hours')->nullable();
            $table->longText('description')->nullable();
            $table->json('keywords')->nullable();
            $table->string('phone_number');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->json('images')->nullable();
            $table->tinyInteger('is_approved')->default(0);
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
        Schema::dropIfExists('businesses');
    }
}
