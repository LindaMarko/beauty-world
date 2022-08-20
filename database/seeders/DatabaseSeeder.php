<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $api_url = 'http://makeup-api.herokuapp.com/api/v1/products.json';
        $response = http::get($api_url);
        $data = json_decode($response->body());

        $brands = array();
        $categories = array();

        foreach($data as $product) {
            $product = (array)$product;

            if(!in_array($product['brand'], $brands)) {
                array_push($brands, $product['brand']);

                Brand::create(
                    [
                        'brand_name_en' => ucfirst($product['brand']),
                    ],
                );
            }

            if(!in_array($product['product_type'], $categories)) {
                array_push($categories, $product['product_type']);

                Category::create(
                    [
                        'category_name_en' => ucfirst($product['product_type']),
                    ],
                );
            }


        }

        $sliders = [
            [
                'slider_img'=>'upload/slider/1741524002816306.jpg',
                'title'=>'Colorful Makeup',
                'description'=>'Do you dare?',
            ],
            [
                'slider_img'=>'upload/slider/1741524605656482.jpg',
                'title'=>'Feel Good',
                'description'=>'Cool and Functional',
            ],
            [
                'slider_img'=>'upload/slider/1741524457825875.jpg',
                'title'=>'',
                'description'=>'',
             ],

        ];

        Slider::insert($sliders);

    }
}