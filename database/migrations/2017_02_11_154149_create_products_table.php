<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('market_id')->nullable();
            $table->double('price')->nullable();
            $table->double('msrp')->nullable();
            $table->string('name')->nullable();
            $table->longText('public_url')->nullable();
            $table->string('image_url')->nullable();
            $table->string('source')->nullable();
            $table->string('watchers')->nullable();
            $table->integer('popularity')->default(0);
            $table->boolean('free_shipping')->default(0);
            $table->boolean('returns_accepted')->default(0);
            $table->boolean('is_buy_it_now')->default(0);
            $table->boolean('is_allow_offers')->default(0);
            $table->string('shipping_postal')->default(0);
            $table->string('shipping_location')->default(0);
            $table->string('shipping_country')->default(0);
            $table->dateTime('expiration_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('upc')->nullable();
            $table->string('condition')->nullable();
            $table->string('product_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
