<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PizzaFilter extends AbstractFilter
{
 
    public const CATEGORIES = 'categories';
    public const SORTED = 'sorted';

    protected function getCallbacks(): array
    {
        return [
   
            self::CATEGORIES => [$this, 'categories'],
            self::SORTED => [$this, 'sorted'],
        ];

    }
    protected function  categories(Builder $builder, $value)
    {
        $builder->whereHas('categories', function ($query) use ($value) {
            $query->whereIn('category_id', $value);
        });
    }
    protected function sorted(Builder $builder, $value){
        $builder->orderBy('price',$value);
    }
}
