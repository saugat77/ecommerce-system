<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['sel_categories' => '2,3','no_of_products' => '3'],

        ];
        foreach($category as $cat){
        \App\Models\HomeCategory::firstOrCreate($cat);

        }
    }
}
