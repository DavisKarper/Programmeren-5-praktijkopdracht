<?php

namespace Database\Seeders;

use App\Models\Rarity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rarities = [
            ['name' => 'Common'],
            ['name' => 'Uncommon'],
            ['name' => 'Rare'],
            ['name' => 'Very Rare'],
            ['name' => 'Legendary'],
            ['name' => 'Artifact']
        ];

        foreach ($rarities as $rarity) {
            Rarity::create($rarity);
        }
    }
}
