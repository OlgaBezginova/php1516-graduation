<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(3)->create();

        foreach ($users as $user) {

            $quantity = rand(1,5);
            $price = rand(100,10000)/100;

            Order::factory()
                ->for($user)
                ->hasAttached(Product::factory()->count(3), ['quantity' => $quantity, 'price' => $price])
                ->create();
        }


    }
}
