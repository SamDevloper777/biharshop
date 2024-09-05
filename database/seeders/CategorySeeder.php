<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['cat_title' => 'Electronics', 'cat_description' => 'Electronics products'],
            ['cat_title' => 'clothing', 'cat_description' => 'clothing products'],
            ['cat_title' => 'books', 'cat_description' => 'Books products'],
            ['cat_title' => 'home & garden', 'cat_description' => 'Home & Garden products'],
            ['cat_title' => 'sports & outdoor', 'cat_description' => 'sport & outdoors products'],
            ['cat_title' => 'Toys & games', 'cat_description' => 'Toys & games products'],
            ['cat_title' => 'beauty & health', 'cat_description' => 'beauty & health products'],
            ['cat_title' => 'Movies & Tv', 'cat_description' => 'Movies & Tv products'],
            ['cat_title' => 'Automotive', 'cat_description' => 'Automotive products'],
            ['cat_title' => 'Pets', 'cat_description' => 'Pets products'],
            ['cat_title' => 'Travel', 'cat_description' => 'Travel products'],
            ['cat_title' => 'other', 'cat_description' => 'other products'],
        
        ];

        foreach ($categories as $category) {
           $category['cat_slug'] = Str::slug($category['cat_title']);
           Category::create($category);
            
        }
    }
}
