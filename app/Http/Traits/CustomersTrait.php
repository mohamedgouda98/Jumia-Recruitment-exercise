<?php

namespace App\Http\Traits;

trait CustomersTrait
{

    private function FilterWithCountryCode($collection, $countryCode)
    {
        return $collection->filter(function($item) use($countryCode){
            if($item->CountryCode == $countryCode)
            {
                return $item;
            }
        })->values();
    }

    private function FilterWithState($collection, $state)
    {
        return $collection->filter(function($item) use($state){
            if($item->State == $state)
            {
                return $item;
            }
        })->values();
    }

}
