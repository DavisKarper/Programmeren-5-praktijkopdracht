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
            [
                'name' => 'Common',
                'color' => '#474747'
            ],
            [
                'name' => 'Uncommon',
                'color' => '#1F9400'
            ],
            [
                'name' => 'Rare',
                'color' => '#0070DD'
            ],
            [
                'name' => 'Very Rare',
                'color' => '#A335EE'
            ],
            [
                'name' => 'Legendary',
                'color' => '#FF8000'
            ],
            [
                'name' => 'Artifact',
                'color' => '#B22222'
            ],
        ];

        foreach ($rarities as $rarity) {
            Rarity::create($rarity);
        }
    }
}
