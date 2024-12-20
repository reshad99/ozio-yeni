<?php

namespace Database\Seeders;

use App\Models\StoreBranch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreBranchSeeder extends Seeder
{
    public function run(): void
    {
        $storeBranches = [
            ['name' => 'Grandmart'],
            ['name' => 'Bolmart'],
            ['name' => 'Tamstore'],
        ];

        StoreBranch::insert($storeBranches);
    }
}
