<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\models\ProductCategory::class, 6)->create()->each(function($category) {
            $category->products()->saveMany(factory(App\models\Product::class, 4)->make());
        });
    }
}
