<?php
namespace Module\Campaign\Database\Seeders;

use Illuminate\Database\Seeder;
use Module\Campaign\Models\Campaign;

class CampaignSeeder extends Seeder
{
    public function run()
    {
       Campaign::create([
           'name' => fake()->sentence,
           'description' =>fake()->paragraph,
           'max_code' => 3,
       ]);
    }
}
