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

class IndozoneVillageSeeder extends Seeder
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
        $villages = IndozoneHelper::getVillages();

        foreach($villages as $village){
            // Insert Data with Chunk
            DB::transaction(function() use($village) {
                $collection = collect($village);

                $parts = $collection->chunk(1000);

                foreach ($parts as $subset) {
                    DB::table('villages')->insert($subset->toArray());
                }
            });
        }

        
    }
}
