<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use Searchable;

    protected $searchableColumns = ['value'];

    protected $fillable = [
        'value',

    ];

    public function incrementOrCreate($attributes = [])
    {
        if(!$existing = Query::getModel()->where('value','=',$attributes['value'])->first())
        {
            return $this->create($attributes);
        }else{
            $existing->incrementSearchCount();
            $existing->save();
        }

        return $existing;

    }

    public function incrementSearchCount()
    {
        $this->search_count += 1;
    }

}