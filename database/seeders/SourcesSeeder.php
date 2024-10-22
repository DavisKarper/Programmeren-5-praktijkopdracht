<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            ['name' => 'Homebrew'],
            ['name' => 'Player\'s Handbook'],
            ['name' => 'Dungeon Master\'s Guide'],
            ['name' => 'Monster Manual'],
            ['name' => 'Xanathar\'s Guide to Everything'],
            ['name' => 'Tasha\'s Cauldron of Everything'],
            ['name' => 'Volo\'s Guide to Monsters'],
            ['name' => 'Mordenkainen\'s Tome of Foes'],
            ['name' => 'Sword Coast Adventurer\'s Guide'],
            ['name' => 'Eberron: Rising from the Last War'],
            ['name' => 'Mythic Odysseys of Theros'],
            ['name' => 'Guildmaster\'s Guide to Ravnica'],
            ['name' => 'Van Richten\'s Guide to Ravenloft']
        ];
        foreach ($sources as $source) {
            Source::create($source);
        }
    }
}
