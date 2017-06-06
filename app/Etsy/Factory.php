<?php namespace App\Etsy;


use App\Search\FactoryInterface;

class Factory implements FactoryInterface
{

    public function search($query)
    {
        dd('etsy factory');
        // TODO: Implement search() method.
    }
}