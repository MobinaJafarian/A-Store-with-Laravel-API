<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Models\Category;
use App\Providers\KeysServiceProvider as keys;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function most_sold_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::most_seller_products => ProductRepository::getMostSellerProducts()->response()->getData(true),
            ],

        ], 200);
    } 

    public function most_visited_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::most_visited_products => ProductRepository::getMostVisitedProducts()->response()->getData(true),
            ],

        ], 200);
    } 

    public function newest_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::newest_products => ProductRepository::getNewestProducts()->response()->getData(true),
            ],

        ], 200);
    } 

    public function cheapets_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::cheapest_products => ProductRepository::getCheapetsProducts()->response()->getData(true),
            ],

        ], 200);
    } 

    public function most_expensive_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::most_expensive_products => ProductRepository::getMostExpensivesProducts()->response()->getData(true),
            ],

        ], 200);
    } 

    
}
