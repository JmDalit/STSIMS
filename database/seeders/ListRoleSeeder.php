<?php

namespace Database\Seeders;

use App\Models\ListRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ListRole::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'Full access to all system features and settings.',
            'page_visit' => json_encode(['dashboard', 'users', 'roles']),
            'is_active' => true,
        ]);
    }
}
