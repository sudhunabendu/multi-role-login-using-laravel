<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'sku' => $this->faker->unique()->sku,
            // 'summary'=>$this->faker->text,
            'desc'=>$this->faker->text,
            'stock'=>$this->faker->numberBetween(2,10),
            // 'brand_id'=>$this->faker->randomElement(Brand::pluck('id')->toArray()),
            // 'vendor_id'=>$this->faker->randomElement(Vendor::pluck('id')->toArray()),
            // 'cat_id'=>$this->faker->randomElement(Category::where('parent_id')->pluck('id')->toArray()),
            // 'photo'=>$this->faker->imageUrl('400','200'),
            'price'=>$this->faker->randomFloat(100,1000),
            // 'offer_price'=>$this->faker->randomFloat(100,1000),
            // 'discount'=>$this->faker->randomFloat(10,2),
            // 'size'=>$this->faker->randomElement(['S','M','L']),
            // 'condition'=>$this->faker->randomElement(['new','popular','winter'])->default('new'),
            'status'=>$this->faker->randomElement(['active','inactive'])->default('active'),
        ];
    }
}
