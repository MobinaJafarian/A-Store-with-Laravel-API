<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\KeysServiceProvider as keys;
use Illuminate\Http\Request;

class UserApiController extends Controller
{

    /**
     * @OA\Post(
     ** path="/api/v1/register",
     *  tags={"User Api"},
     *   security={{"sanctum":{}}},
     *  description="use to signin user with recieved code",
     * @OA\RequestBody(
     *    required=true,
     *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *               @OA\Property(
     *                  property="image",
     *                  description="user image",
     *                  type="array",
     *                  @OA\Items(
     *                       type="string",
     *                       format="binary",
     *                  ),
     *               ),
     *           @OA\Property(
     *                  property="phone",
     *                  description="user phone number",
     *                  type="string",
     *               ),
     *          @OA\Property(
     *                  property="name",
     *                  description="user name",
     *                  type="string",
     *               ),
     *          @OA\Property(
     *                  property="address",
     *                  description="user address",
     *                  type="string",
     *               ),
     *          @OA\Property(
     *                  property="postal_code",
     *                  description="user postal code",
     *                  type="string",
     *               ),
     *          @OA\Property(
     *                  property="lat",
     *                  description="user location latitude",
     *                  type="double",
     *               ),
     *          @OA\Property(
     *                  property="lang",
     *                  description="user location longitude",
     *                  type="double",
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

    public function register(Request $request)
    {
        $user = auth()->user();
        // 1|6pamQsc2nsQq2C2tiOdog7s4k4nLShugAwbmCkyj
        if ($user) {
            User::updateUserInfo($user, $request);
            return Response()->json([
                'result' => true,
                'message' => "user updated",
                'data' => [
                    Keys::user => new UserResource($user),
                ],
            ], 201);

        } else {
            return Response()->json([
                'result' => false,
                'message' => "user not found",
                'data' => [],
            ], 403);
        }
    }

    /**
     * @OA\Post(
     * path="/api/v1/profile",
     *   tags={"User info"},
     *   security={{"sanctum":{}}},
     *   @OA\Response(
     *      response=200,
     *      description="It's Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function profile(Request $request)
    {
        $user = auth()->user();
        return Response()->json([
            'result' => true,
            'message' => "user profile",
            'data' => [
                Keys::user => new UserResource($user),
                Keys::user_processing_count => UserRepository::processingUserOrderCount($user),
                Keys::user_received_count => UserRepository::receivedUserOrderCount($user),
                Keys::user_rejected_count => UserRepository::rejectedUserOrderCount($user),
            ],
        ], 200);

    }

    public function receivedOrders(Request $request)
    {
        $user = auth()->user();
        return Response()->json([
            'result' => true,
            'message' => "user received orders",
            'data' => UserRepository::receivedUserOrder($user),
        ], 200);
    }
}
