<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kemeja Flanel Vintage',
                'slug' => 'kemeja-flanel-vintage',
                'description' => 'Kemeja flanel thrift dengan gaya vintage.',
                'price' => 45000,
                'category' => 'Atasan',
                'size' => 'L',
                'condition' => 'Baik',
                'stock' => 5,
                'image_url' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Jaket Denim Classic',
                'slug' => 'jaket-denim-classic',
                'description' => 'Jaket denim bergaya klasik untuk sehari-hari.',
                'price' => 75000,
                'category' => 'Outerwear',
                'size' => 'M',
                'condition' => 'Sangat Baik',
                'stock' => 3,
                'image_url' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Celana Cargo Thrift',
                'slug' => 'celana-cargo-thrift',
                'description' => 'Celana cargo kasual dengan desain simpel.',
                'price' => 60000,
                'category' => 'Bawahan',
                'size' => 'L',
                'condition' => 'Baik',
                'stock' => 4,
                'image_url' => null,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
