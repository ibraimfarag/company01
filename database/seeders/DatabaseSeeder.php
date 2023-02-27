<?php

namespace Database\Seeders;

use App\Models\Leadership;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(PagesTableSeeder::class);
        $this->call(PageSectionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LeadershipSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(BenefitSeed::class);
        $this->call(ClientCategorySeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(HomeIconSeeder::class);
    }
}
