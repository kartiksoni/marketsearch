<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;

    protected $searchableColumns = ['name', 'description'];

    protected $fillable = [
        'public_url',
        'price',
        'free_shipping',
        'expiration_date',
        'description',
        'upc',
        'product_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('expiration_date', '>', Carbon::now());
        });
    }

    public function wishlists()
    {
        return $this->belongsToMany('\App\Wishlist','wishlist_products');
    }

}