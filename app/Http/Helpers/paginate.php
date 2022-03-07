<?php

use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('paginateData')) {
    function paginateData($collection, $perPage = 10)
    {
        $currentPage=request('page');

        $currentPageResults = $collection->slice(($currentPage-1)*$perPage,$perPage)->all();

       return new LengthAwarePaginator($currentPageResults, count($collection),$perPage,$currentPage,['path'=>request()->url(),'query'=>request()->query()]);
    }
}

