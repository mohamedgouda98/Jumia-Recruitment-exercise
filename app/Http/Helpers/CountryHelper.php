<?php


if (!function_exists('getCountriesData')) {
    function getCountriesData()
    {
        return [
            ['name' => 'Cameroon', 'code' => '237', 'regex' => '#\(237\)\ ?[2368]\d{7,8}#'],
            ['name' => 'Ethiopia', 'code' => '251', 'regex' =>'#\(251\)\ ?[1-59]\d{8}$#'],
            ['name' => 'Morocco', 'code' => '212', 'regex' =>'#\(212\)\ ?[5-9]\d{8}$#'],
            ['name' => 'Mozambique', 'code' => '258', 'regex' =>'#\(258\)\ ?[28]\d{7,8}$#'],
            ['name' => 'Uganda', 'code' => '256', 'regex' =>'#\(256\)\ ?\d{9}$#'],
        ];
    }
}


if (!function_exists('getCountryByCode')) {
    function getCountryByCode(string $code)
    {
        $countries = getCountriesData();
        foreach ($countries as $country)
        {
            if($country['code'] == $code)
            {
                return $country['name'];
            }
        }
    }
}


if (!function_exists('checkStateNumber')) {
    function checkStateNumber(string $phone, string $code)
    {
        $countries = getCountriesData();
        foreach ($countries as $country)
        {
            if($country['code'] == $code && preg_match($country['regex'], $phone))
            {
                return 'ok';
            }
        }
        return 'nok';
    }
}
