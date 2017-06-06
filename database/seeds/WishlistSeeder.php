<?php

use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $num_created_wishlists = 100;
        $attached_products = 10;

        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Wishlist::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        for ($x = 0; $x <= $num_created_wishlists; $x++)
        {
            $wishlist_user = \App\User::all()->random(1)->first();

            $data = [
                'user_id'=> $wishlist_user->id,
                'name'=> $faker->sentence(10,true),
            ];

            $wishlist = \App\Wishlist::create($data);

            $products = \App\Product::all()->random($attached_products);
            \Log::info(print_r($products,true));
            $wishlist->products()->attach($products);
            
        }
    }
}
