<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                RoleAndPermissionSeeder::class,
                AdminSeeder::class,
//                UserSeeder::class,
                ModuleSeeder::class,
                CountrySeeder::class,
                CitySeeder::class,
                CurrencySeeder::class,
                StoreCategorySeeder::class,
                StoreBranchSeeder::class,
                ZoneSeeder::class,
            ]
        );
    }
}
