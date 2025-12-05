<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_agencies')->insert(
            [
                ['name' => 'Department of Science and Technology - III',    'slug' => 'dost-iii',    'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '030000000'],
                ['name' => 'Department of Science and Technology - IVA',    'slug' => 'dost-iva',    'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '040000000'],
                ['name' => 'Department of Science and Technology - IVB',    'slug' => 'dost-ivb',    'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '170000000'],
                ['name' => 'Department of Science and Technology - V',      'slug' => 'dost-v',      'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '050000000'],
                ['name' => 'Department of Science and Technology - VI',     'slug' => 'dost-vi',     'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '060000000'],
                ['name' => 'Department of Science and Technology - VII',    'slug' => 'dost-vii',    'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '070000000'],
                ['name' => 'Department of Science and Technology - VIII',   'slug' => 'dost-viii',   'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '080000000'],
                ['name' => 'Department of Science and Technology - IX',     'slug' => 'dost-ix',     'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '090000000'],
                ['name' => 'Department of Science and Technology - X',      'slug' => 'dost-x',      'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '100000000'],
                ['name' => 'Department of Science and Technology - XI',     'slug' => 'dost-xi',     'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '110000000'],
                ['name' => 'Department of Science and Technology - XII',    'slug' => 'dost-xii',    'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '120000000'],
                ['name' => 'Department of Science and Technology - CARAGA', 'slug' => 'dost-caraga', 'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '160000000'],
                ['name' => 'Department of Science and Technology - CAR',    'slug' => 'dost-car',    'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '140000000'],
                ['name' => 'Ministry of Science and Technology - BARMM',    'slug' => 'most-barmm',  'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '150000000'],
                ['name' => 'Science Education Institute',                   'slug' => 'sei',         'address' => null, 'barangay_code' => null, 'city_code' => null, 'province_code' => null, 'region_code' => '130000000'],
            ]
        );
    }
}
