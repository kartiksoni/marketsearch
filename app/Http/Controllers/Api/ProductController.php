<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Product;
use App\Query;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(IndexRequest $request)
    {
        $q = $request->has('q') && $request->get('q') !== 'false' ? $request->get('q') : false;

        //If we have a query call the search command
        if($q !== false){
            Query::getModel()->incrementOrCreate(['value' => $q]);

            \Artisan::call('search',['query' => $q]);
        }

        \Log::info(print_r($request->all(),true));
        $per_page = $request->has('per_page') ? (int)$request->get('per_page'): 40;
        $sort_by = $request->has('sort_by') ? $request->get('sort_by'): 'price';
        $sort_by_dir = $request->has('sort_dir') ? (int)$request->get('sort_dir'): 'asc';
        $sort_by_dir = $sort_by_dir == 'asc' ? 1 : -1;



        if ($q !== false) {
            \Log::info($q);
            $products = Product::where('name','like','%'. $q . '%')->orWhere('description','like','%'. $q);
        } else {
            $products = Product::getModel();
        }

        if(isset($sort_by))
        {
            $products = $products->orderBy($sort_by,$sort_by_dir);
        }

        $products = $products->paginate($per_page);

        \Log::info($products->count());
        return $products;

    }
}
