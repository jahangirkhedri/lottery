<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Module\Campaign\Database\Seeders\CampaignSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!User::count()){
            User::factory()->create([
                'email' => "user@gmail.com"
            ]);
        }

         User::factory(10)->create();
         resolve(CampaignSeeder::class)->run();

    }
}
