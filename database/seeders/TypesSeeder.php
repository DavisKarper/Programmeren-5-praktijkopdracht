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
            [
                'name' => 'Armor',
                'image' => 'images/armor.jpg'
            ],
            [
                'name' => 'Potion',
                'image' => 'images/potion.jpg'
            ],
            [
                'name' => 'Ring',
                'image' => 'images/ring.jpg'
            ],
            [
                'name' => 'Rod',
                'image' => 'images/rod.jpg'
            ],
            [
                'name' => 'Scroll',
                'image' => 'images/scroll.jpg'
            ],
            [
                'name' => 'Staff',
                'image' => 'images/staff.jpg'
            ],
            [
                'name' => 'Wand',
                'image' => 'images/wand.jpg'
            ],
            [
                'name' => 'Weapon',
                'image' => 'images/weapon.jpg'
            ],
            [
                'name' => 'Wondrous Item',
                'image' => 'images/wondrous-item.jpg'
            ]
        ];


        foreach ($magicItemTypes as $magicItemType) {
            Type::create($magicItemType);
        }
    }
}
