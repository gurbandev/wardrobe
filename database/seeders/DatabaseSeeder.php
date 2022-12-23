<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Verification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            AttributeValueSeeder::class,
            LocationSeeder::class,
        ]);

        Product::factory()->count(100)->create();
        Verification::factory()->count(20)->create();
        Customer::factory()->count(15)->create();
        CustomerAddress::factory()->count(30)->create();
        Order::factory()->count(40)->create();
        OrderProduct::factory()->count(100)->create();

        $this->call([
            OrderSeeder::class,
        ]);
    }
}
