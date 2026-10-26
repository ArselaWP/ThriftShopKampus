<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['Vintage Oversize Hoodie', 'hoodie-vintage-oversize', 'Hoodie vintage nyaman untuk gaya kasual. Kondisi terawat.', 189000, 'Hoodie', 'L', 'Sangat baik', 2, 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=900&q=85', true],
            ['Denim Jacket Classic', 'denim-jacket-classic', 'Jaket denim klasik yang mudah dipadukan.', 249000, 'Jaket', 'M', 'Baik', 1, 'https://images.unsplash.com/photo-1543076447-215ad9ba6923?auto=format&fit=crop&w=900&q=85', true],
            ['Cargo Pants Olive', 'cargo-pants-olive', 'Celana cargo warna olive dengan banyak kantong.', 159000, 'Celana', 'L', 'Baik', 3, 'https://images.unsplash.com/photo-1517438476312-10d79c077509?auto=format&fit=crop&w=900&q=85', false],
            ['Vintage Leather Bag', 'vintage-leather-bag', 'Tas vintage dengan tampilan klasik.', 129000, 'Aksesori', 'All size', 'Sangat baik', 1, 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=900&q=85', false],
            ['Basic Graphic Tee', 'basic-graphic-tee', 'Kaos graphic untuk outfit harian.', 45000, 'Kaos', 'M', 'Baik', 4, 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=85', false],
            ['Retro Windbreaker', 'retro-windbreaker', 'Windbreaker retro ringan untuk aktivitas luar.', 85000, 'Jaket', 'XL', 'Baik', 2, 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=900&q=85', false],
            ['Vintage Knit Sweater', 'vintage-knit-sweater', 'Sweater rajut bernuansa vintage.', 95000, 'Sweater', 'M', 'Sangat baik', 1, 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=900&q=85', false],
            ['Canvas Shoulder Bag', 'canvas-shoulder-bag', 'Tas bahu canvas sederhana dan fungsional.', 65000, 'Aksesori', 'All size', 'Baik', 2, 'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?auto=format&fit=crop&w=900&q=85', false],
        ];

        foreach ($products as [$name, $slug, $description, $price, $category, $size, $condition, $stock, $image, $featured]) {
            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'category' => $category,
                    'size' => $size,
                    'condition' => $condition,
                    'stock' => $stock,
                    'image_url' => $image,
                    'is_featured' => $featured,
                ]
            );
        }
    }
}
