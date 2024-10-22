<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $magicItemTypes = [
            ['name' => 'Armor'],
            ['name' => 'Potion'],
            ['name' => 'Ring'],
            ['name' => 'Rod'],
            ['name' => 'Scroll'],
            ['name' => 'Staff'],
            ['name' => 'Wand'],
            ['name' => 'Weapon'],
            ['name' => 'Wondrous Item'],
        ];

        foreach ($magicItemTypes as $magicItemType) {
            Type::create($magicItemType);
        }
    }
}
