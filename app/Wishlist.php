<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use Searchable;

    protected $fillable = [
        'user_id',
        'name',
    ];
    protected $appends = [
        'products',
    ];

    public function getProductsAttribute()
    {
        return $this->products()->get();
    }
    public function products()
    {
        return $this->belongsToMany('App\Product','wishlist_products');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}