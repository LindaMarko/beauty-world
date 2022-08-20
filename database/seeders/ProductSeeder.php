<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $api_url = 'http://makeup-api.herokuapp.com/api/v1/products.json';
        $response = http::get($api_url);
        $data = json_decode($response->body());

        foreach($data as $product) {
            $product = (array)$product;

            Product::create(
                [
                    'product_name_en' => $product['name'],
                    'product_slug_en' => strtolower(str_replace(' ', '-', $product['name'])),
                    'product_type' => $product['product_type'],
                    'product_tags_en' => $product['tag_list'],
                    'price' => $product['price'],
                    'price_sign' => $product['price_sign'],
                    'category_name_en' => $product['category'],
                    'brand' => $product['brand'],
                    'image_link' => $product['image_link'],
                    'description_en' => $product['description'],
                ],
            );
        }
    }
}