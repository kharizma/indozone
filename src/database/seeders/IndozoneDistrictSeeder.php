<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kharizma\Indozone\IndozoneHelper;
use Illuminate\Support\Facades\DB;

class IndozoneDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @deprecated
     * 
     * @return void
     */
    public function run()
    {
        // Get Data
        $districts = IndozoneHelper::getDistricts();

        // Insert Data to Database
        DB::transaction(function() use($districts) {
            $collection = collect($districts);
            
            $parts = $collection->chunk(1000);

            foreach ($parts as $subset) {
                DB::table('districts')->insert($subset->toArray());
            }
        });
    }
}
