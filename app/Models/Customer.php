<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $appends = ['CountryCode', 'CountryName', 'State'];

    protected function getCountryCodeAttribute()
    {
        return substr($this->phone, 1, 3);
    }

    protected function getCountryNameAttribute()
    {
        return getCountryByCode($this->CountryCode);
    }

    protected function getStateAttribute()
    {
        return checkStateNumber($this->phone, $this->CountryCode);
    }
}
