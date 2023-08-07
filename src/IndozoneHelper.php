<?php

namespace Kharizma\Indozone;

use ParseCsv\Csv;

use Illuminate\Support\Facades\File;

class IndozoneHelper
{
    protected static $path = __DIR__.'/data/csv';

    public static function getCsvData($path = '')
    {
        $csv = new Csv();
        $csv->auto($path);

        return $csv->data;
    }

    public static function getProvinces()
    {
        $result = self::getCsvData(self::$path.'/provinces.csv');

        return $result;
    }

    public static function getRegencies()
    {
        $result = self::getCsvData(self::$path.'/regencies.csv');

        return $result;
    }

    public static function getDistricts()
    {
        $result = self::getCsvData(self::$path.'/districts.csv');

        return $result;
    }

    public static function getVillages()
    {
        $filesInFolder = File::allFiles(self::$path.'/villages');

        foreach ($filesInFolder as $path) {
            $file = pathinfo($path);

            $result[] = self::getCsvData(self::$path.'/villages/'.$file['basename']);

            
        }

        return $result;
    }
}