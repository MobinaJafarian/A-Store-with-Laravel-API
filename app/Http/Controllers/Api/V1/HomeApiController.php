<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\services\Keys;
use App\Models\Category;
use App\Models\Slider;

class HomeApiController extends Controller
{
    public function home()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::sliders => Slider::getSliders(),
                Keys::categories => Category::getAllCategories(),
                Keys::amazing_products => ProductRepository::get6AmazingProducts(),
                Keys::banner => Slider::query()->inRandomOrder()->first(),
                Keys::most_seller_products => ProductRepository::get6MostSellerProducts(),
                Keys::newest_products => ProductRepository::get6NewestProducts(),
            ],

        ], 200);
    }
}
