<?php namespace App\Http\Controllers;

use App\Http\Requests\Home\IndexRequest;

class HomeController extends \App\Http\Controllers\Controller
{
    
    public function index(IndexRequest $request)
    {
        $data = [
            'sort_by' => $request->has('sort_by') ? $request->get('sort_by'): 'price',
            'display' => $request->has('display') ? $request->get('display'): 'list',
            'feed' => $request->has('feed') ? $request->get('feed'): 'all',
            'q' => $request->has('q') ? $request->get('q'): '',
        ];

        return view('welcome',$data);
    }


}