<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\HomeInterface;
use App\Http\Traits\CustomersTrait;
use App\Models\Customer;

class HomeRepository implements HomeInterface
{
    use CustomersTrait;

    private $customerModel;

    public function __construct(Customer $customer)
    {
        $this->customerModel = $customer;
    }

    public function customers()
    {
        $customers = $this->customerModel::paginate(10);
        if(request('countryCode'))
        {
            $customers = $this->FilterWithCountryCode($customers, request('countryCode'));
        }
        if(request('state'))
        {
            $customers = $this->FilterWithState($customers, request('state'));
        }

        $customers = paginateData($customers,6);
        return view('index', compact(['customers']));
    }
}
