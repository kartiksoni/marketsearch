<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_products', function(Blueprint $table)
        {
            $table->integer('wishlist_id')->unsigned();
            $table->foreign('wishlist_id')
                ->references('id')->on('wishlists')
                ->onDelete('cascade');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

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
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('wishlist_products');
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
