<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Tester',
                'email' => 'test@test.com',
                'email_verified_at' => '2024-10-25 11:32:11',
                'password' => '$2y$12$5uKocBajtPTCI29BPe38C.oYCC14/oDrTgoSOKwb16Y3u3roeghbm',
                'remember_token' => null,
                'created_at' => '2024-10-25 11:32:11',
                'updated_at' => '2024-10-25 11:32:11',
                'verified' => 1,
                'admin' => 1
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
