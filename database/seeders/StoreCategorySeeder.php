<?php

namespace Database\Seeders;

use App\Models\StoreCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storeCategories = [
            ['name' => 'supermarket', 'module_id' => 1],
            ['name' => 'hipermarket', 'module_id' => 1],
        ];

        StoreCategory::insert($storeCategories);
    }
}
