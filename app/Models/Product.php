<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'cost_price', 'price'];
    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public static function arrayForSelect()
    {

        $arr = [];
        $products = Product::all();
        foreach ($products as $product) {

            $arr[$product->id] = $product->title;

        };

        return $arr;
    }
}