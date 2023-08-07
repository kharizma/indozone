<?php

/*
 * This file is part of the Indozone package.
 *
 * (c) Ully Kharisma Putra <kharizma | ullykharisma@gmail.com>
 *
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IndozoneSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IndozoneProvinceSeeder::class);
        $this->call(IndozoneRegencySeeder::class);
        $this->call(IndozoneDistrictSeeder::class);
        $this->call(IndozoneVillageSeeder::class);
    }
}