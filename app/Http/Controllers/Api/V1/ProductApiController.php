<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Providers\KeysServiceProvider as keys;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
        /**
     * @OA\Get(
     ** path="/api/v1/most_sold_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function most_sold_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::most_seller_products => ProductRepository::getMostSellerProducts()->response()->getData(true),
            ],

        ], 200);
    } 

        /**
     * @OA\Get(
     ** path="/api/v1/most_visited_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function most_visited_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::most_visited_products => ProductRepository::getMostVisitedProducts()->response()->getData(true),
            ],

        ], 200);
    } 

        /**
     * @OA\Get(
     ** path="/api/v1/newest_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function newest_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::newest_products => ProductRepository::getNewestProducts()->response()->getData(true),
            ],

        ], 200);
    } 

        /**
     * @OA\Get(
     ** path="/api/v1/cheapest_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function cheapets_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::cheapest_products => ProductRepository::getCheapetsProducts()->response()->getData(true),
            ],

        ], 200);
    } 


    /**
     * @OA\Get(
     ** path="/api/v1/most_expensive_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function most_expensive_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application home page',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::most_expensive_products => ProductRepository::getMostExpensivesProducts()->response()->getData(true),
            ],

        ], 200);
    } 
    
        /**
     * @OA\Get(
     ** path="/api/v1/products_by_category/{id}",
     *  tags={"Products Page"},
     *  description="get products data by category id",
     * *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productsByCategory($id)
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::products_by_category => ProductRepository::getProductsByCategory($id)->response()->getData(true),
            ],

        ], 200);
    } 
    
       /**
     * @OA\Get(
     ** path="/api/v1/products_by_brand/{id}",
     *  tags={"Products Page"},
     *  description="get products data by category id",
     * *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productsByBrand($id)
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::products_by_brand => ProductRepository::getProductsByBrand($id)->response()->getData(true),
            ],

        ], 200);
    } 


    /**
     * @OA\Get(
     ** path="/api/v1/product_details/{id}",
     *  tags={"Product Details"},
     *  description="get product details data by product id",
     *     @OA\Parameter(
     *         description="product id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productDetail($id)
    {
        $product = Product::query()->find($id);
        $product->increment('review');

        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                new ProductResource($product)
            ],

        ], 200);
    }
    
        /**
     * @OA\Post(
     ** path="/api/v1/save_product_comment",
     *  tags={"Product Details"},
     *   security={{"sanctum":{}}},
     *  description="save user comment for product",
     * @OA\RequestBody(
     *    required=true,
     *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="product_id",
     *                  description="product id",
     *                  type="integer",
     *               ),
     *     *           @OA\Property(
     *                  property="parent_id",
     *                  description="product id",
     *                  type="integer",
     *               ),
     *          @OA\Property(
     *                  property="body",
     *                  description="user comment text",
     *                  type="string",
     *               ),
     *           ),
     *       )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Data saved",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function saveComment(Request $request)
    {
        $user = auth()->user();
        Comment::query()->create([
            'body'=>$request->input('body'),
            'parent_id'=>$request->input('parent_id',null),
            'user_id'=>$user->id,
            'product_id'=>$request->input('product_id'),
        ]);

        $product = Product::query()->find($request->input('product_id'));

        return response()->json([
            'result'=>true,
            'message'=>'application products page',
            'data'=>[
                new ProductResource($product)
            ]

        ],200);
    }

        /**
     * @OA\Post(
     ** path="/api/v1/search_product",
     *  tags={"Products Page"},
     *  description="search product",
     *    @OA\RequestBody(
     *    required=true,
     *          @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="search",
     *                  type="string",
     *               ),
     *     )
     *   )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function searchProduct(Request $request)
    {
        return response()->json([
            'result'=>true,
            'message'=>'application products page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::searched_products=>ProductRepository::searchedProduct($request->input('search'))->response()->getData(true),
            ]

        ],200);
    }
}
