<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\ProductCategoryGrandMother;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mainCat()
    {
        return $this->belongsTo(ProductCategoryGrandMother::class, 'cat_1', 'id');
    }

    public function secondCat()
    {
        return $this->belongsTo(productCategorySecond::class, 'cat_2', 'id');
    }

    public function thirdCat()
    {
        return $this->belongsTo(ProductCategoryThird::class, 'cat_3', 'id');
    }

    // public function tags()
    // {
    //     return $this->belongsTo(ProductTag::class, 'id', 'id');
    // }
}
