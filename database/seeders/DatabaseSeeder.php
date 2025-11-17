<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
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

        $this->call(ListRoleSeeder::class);
        $this->call(ListRouteSeeder::class);

        User::create([
            'email'         => 'jmdalit@sei.dost.gov.ph',
            'role_id'       => 1,
            'password'      => bcrypt('@dmin123'),
            'can_edit'      => true,
            'can_create'    => true,
            'can_delete'    => true,
            'is_verified'   => true,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        UserProfile::create([
            'user_id'       => 1,
            'agency_id'     => null,
            'fname'         => 'john rey',
            'lname'         => 'dalit',
            'contact_no'    => '09270097383',
            'designation'   => 'project technical assistant VI',
            'avatar'        => null,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
