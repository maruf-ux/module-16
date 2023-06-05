<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fakedata option one
        // Product::factory(10)->create();
        
        // fakedata option two
        // Product::create([
        //     'name'=> 'Product Name',
        //     'price'=> fake()->randomElement([10000, 20000, 50000]),
        //     'quantity'=> fake()->randomElement([3, 2, 1, 4, 4]),
        //     'category'=> fake()->word(),
        //     'description'=> fake()->sentence(),
        // ]);

        // fakedata option there
        // Product::create([
        //     'name'=> 'Product Name',
        //     'price'=> '10000',
        //     'quantity'=> '2',
        //     'category'=> 'phone',
        //     'description'=> 'my description',
        // ]);

        // fakedata option four
        // $products = collect([
        //     [
        //         'name'=> 'Product Name',
        //         'price'=> '10000',
        //         'quantity'=> '2',
        //         'category'=> 'phone',
        //         'description'=> 'my description',
        //     ],
        //     [
        //         'name'=> 'Product two',
        //         'price'=> '10000',
        //         'quantity'=> '2',
        //         'category'=> 'phone',
        //         'description'=> 'my description',
        //     ]
        // ]);

        // $products->each(function ($product) {
        //     Product::create($product);
        // });

        // real data option six
        $productsJson = File::get('database/json/products.json');
        $products = collect( json_decode($productsJson) );

        $products->each(function ($product) {
            Product::create([
                'name'=> $product->name,
                'price'=> $product->price,
                'quantity'=> $product->quantity,
                'category'=> $product->category,
                'description'=> $product->description
            ]);
        });

    }
}
