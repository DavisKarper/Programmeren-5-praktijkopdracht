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
                'color' => '#000000'
            ],
            [
                'name' => 'Uncommon',
                'color' => '#00FF00'
            ],
            [
                'name' => 'Rare',
                'color' => '#0000FF'
            ],
            [
                'name' => 'Very Rare',
                'color' => '#800080'
            ],
            [
                'name' => 'Legendary',
                'color' => '#FFD700'
            ],
            [
                'name' => 'Artifact',
                'color' => '#B22222'
            ]
        ];

        foreach ($rarities as $rarity) {
            Rarity::create($rarity);
        }
    }
}
