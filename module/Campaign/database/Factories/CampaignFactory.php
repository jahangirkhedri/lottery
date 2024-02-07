<?php

namespace Module\Campaign\database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'description' =>fake()->paragraph,
            'max_code' => 3,
        ];
    }
}
