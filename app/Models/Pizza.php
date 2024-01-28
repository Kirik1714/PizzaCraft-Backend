<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizzas';

    protected $guarded = [];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'pizza_categories', 'pizza_id', 'category_id');
    }

    public function crustDiameter()
    {
        
        return $this->belongsToMany(CrustDiameter::class, 'pizza_crust_diameters', 'pizza_id', 'crust_diameter_id');
    }

    public function crustType()
    {
        return $this->belongsToMany(CrustType::class, 'pizza_crust_types', 'pizza_id', 'crust_type_id');
    }

 
}
