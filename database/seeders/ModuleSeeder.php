<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'name' => 'market',
            'status' => StatusEnum::ACTIVE->value
        ]);

        Module::create([
            'name' => 'restaurant',
            'status' => StatusEnum::ACTIVE->value
        ]);
    }
}
