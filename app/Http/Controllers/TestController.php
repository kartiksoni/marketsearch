<?php namespace App\Http\Controllers;

use App\Http\Requests\Home\IndexRequest;

class TestController extends \App\Http\Controllers\Controller
{
    
    public function index()
    {
//        $etsy = \Etsy::search('test');
        $ebay = \Ebay::search('test');
//        $amazon = \Amazon::search('test');















    }


}