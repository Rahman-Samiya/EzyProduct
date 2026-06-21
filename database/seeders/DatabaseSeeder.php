<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with sample categories and products.
     */
    public function run(): void
    {
        $catalog = [
            'Electronics' => [
                ['name' => 'Wireless Mouse', 'price' => 19.99, 'stock' => 120],
                ['name' => 'Mechanical Keyboard', 'price' => 79.50, 'stock' => 60],
                ['name' => '27" 4K Monitor', 'price' => 329.00, 'stock' => 25],
                ['name' => 'USB-C Hub', 'price' => 45.00, 'stock' => 80],
            ],
            'Accessories' => [
                ['name' => 'Laptop Sleeve', 'price' => 24.99, 'stock' => 150],
                ['name' => 'Phone Stand', 'price' => 12.50, 'stock' => 200],
                ['name' => 'Cable Organizer', 'price' => 8.99, 'stock' => 300],
            ],
            'Office Supplies' => [
                ['name' => 'Notebook A5', 'price' => 5.49, 'stock' => 500],
                ['name' => 'Gel Pen Pack', 'price' => 3.99, 'stock' => 400],
                ['name' => 'Desk Lamp', 'price' => 34.00, 'stock' => 40],
            ],
        ];

        foreach ($catalog as $categoryName => $products) {
            $category = Category::create(['name' => $categoryName]);

            foreach ($products as $product) {
                $category->products()->create($product);
            }
        }
    }
}
