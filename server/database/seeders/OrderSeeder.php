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
        $user = User::factory()->create();

        Order::factory()
            ->for($user)
            ->hasAttached(Product::factory()->count(3), ['quantity' => rand(1,5)])
            ->create();
    }
}
