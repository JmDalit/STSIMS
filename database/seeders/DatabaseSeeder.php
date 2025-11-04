<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ListRoleSeeder::class);


        User::factory()->create([

            'email' => 'jmdalit@sei.dost.gov.ph',
            'password' => bcrypt('@dmin123'),
            'can_edit' => true,
            'can_create' => true,
            'can_delete' => true,
            'is_verified' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
