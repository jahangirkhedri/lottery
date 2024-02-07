<?php
namespace Module\Campaign\database\Seeders;

use Illuminate\Database\Seeder;
use Module\Campaign\Models\Campaign;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        Campaign::factory(5)->create();
    }
}
