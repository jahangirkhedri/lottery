<?php

namespace Module\Campaign\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Module\Campaign\Models\Campaign;

class CampaignFactory extends Factory
{

    protected $model = Campaign::class;
    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'description' =>fake()->paragraph,
            'max_code' => 3,
        ];
    }
}
