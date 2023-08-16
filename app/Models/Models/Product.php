<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'vp_product';
    protected $primaryKey = 'prod_id';
    protected $guarded = [];
}
