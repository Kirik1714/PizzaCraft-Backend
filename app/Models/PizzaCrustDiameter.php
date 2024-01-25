<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaCrustDiameter extends Model
{
    use HasFactory;
    protected $table = 'pizza_crust_diameters';

    protected $guarded = [];

}
