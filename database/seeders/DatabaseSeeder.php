<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Cart::create([
            'user_id' => '11',
            'product_id' => '2',
            'quantity' => '2'
        ]);

        // Product::create([
        //     'name' => 'Dong largerer',
        //     'quantity' =>  '20',
        //     'price' => '10',
        //     'description' => 'this is description'
        // ]);
    }
}
