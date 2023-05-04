<?php

namespace App\Http\Repositories;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductRepository
{

    public static function get6AmazingProducts()
    {
        $products = Product::query()->where('is_special', true)
            ->orderBy('discount', 'DESC')->take(6)->get();
        return ProductResource::collection($products);
    }

    public static function get6MostSellerProducts()
    {
        $products = Product::query()
            ->orderBy('sold', 'DESC')->take(6);
        return ProductResource::collection($products);
    }
    
    public static function getMostSellerProducts()
    {
        $products = Product::query()
            ->orderBy('sold', 'DESC')->paginate(12);
        return ProductResource::collection($products);
    }

    public static function get6NewestProducts()
    {
        $products = Product::query()->latest()->take(6)->get();
        return ProductResource::collection($products);
    }
}
