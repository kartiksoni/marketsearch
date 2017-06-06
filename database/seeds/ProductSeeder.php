<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $num_created_products = 100;

        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Product::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        for ($x = 0; $x <= $num_created_products; $x++)
        {
            $data = [
                'public_url'=> 'http://www.ebay.com/itm/Amcrest-IP2M-841-ProHD-1080P-1920TVL-30FPS-Wireless-WiFi-IP-Camera-/332095049087',
                'image_url'=> 'http://i.ebayimg.com/images/g/ZAQAAOSwTuJYnKdg/s-l1600.jpg',
                'source'=> 'ebay',
                'watchers'=> $faker->numberBetween(0,5000),
                'price'=> $faker->numberBetween(0,500),
                'popularity'=> $faker->numberBetween(0,1000),
                'free_shipping'=> $faker->numberBetween(0,1),
                'expiration_date'=> $faker->dateTimeBetween('-2 days','now'),
                'description'=> $faker->paragraph,
                'upc'=> '859888005535',
                'product_id'=> 332095049087,
                'name'=> $faker->sentence(10,true),
            ];

            $product = \App\Product::create($data);
            
        }
    }
}
