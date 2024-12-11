<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HomeCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
   $sel_categories = 1;
$products = 1;
        return [
            'sel_categories'=>$sel_categories,
            'no_of_products'=>$products

        ];
    }
}
