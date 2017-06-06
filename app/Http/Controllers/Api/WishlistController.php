<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlist\IndexRequest;
use App\Http\Requests\Wishlist\ShowRequest;
use App\Http\Requests\Wishlist\UpdateRequest;
use App\Http\Requests\Wishlist\StoreRequest;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(IndexRequest $request)
    {
        \Log::info('api/wishlist/index');
        return Wishlist::all();
        //@todo return wishlists associated to the user
    }

    public function show(ShowRequest $request, Wishlist $wishlist)
    {
        \Log::info('api/wishlist/show');

        //@todo return specific wishlist
        return $wishlist;
    }

    public function update(UpdateRequest $request, Wishlist $wishlist)
    {
        \Log::info('api/wishlist/update');
        $wishlist->update($request->all());
        $this->addProductsToWishlist($request, $wishlist);
        return $wishlist;
        //@todo update the wishlist
    }

    public function store(StoreRequest $request)
    {
        \Log::info('store wishlist');
        //@todo update the wishlist
        try{
        $data = [
            'name' => $request->get('name')
        ];

        $newWishlist = Wishlist::create($data);


            $this->addProductsToWishlist($request, $newWishlist);

            return $newWishlist;


        }catch(\Exception $e)
        {
            \Log::error($e->getMessage() . 'WishlistController store');
            return response()->json(array(
                'code'      =>  401,
                'message'   =>  $e->getMessage()
            ), 401);
        }


    }

    /**
     * @param Request $request
     * @param $wishlist
     */
    protected function addProductsToWishlist(Request $request, $wishlist)
    {
        $ids = [];

        if (is_array($request->get('products'))) {
            foreach ($request->get('products') as $product) {
                array_push($ids, $product['id']);

            }
            $products = Product::whereIn('id', $ids)->get();


            foreach ($products as $product) {
                //Check if there is already an existing product, if not attach it.
                    if(!$existing = $wishlist->products()->where('id','=',$product->id)->first())
                    {
                        \Log::info('yep');
                        $wishlist->products()->attach($product->id);
                    }
                \Log::info('done');

            }

        }
    }
}
