<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SmsCode;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/v1/send_sms",
     *  tags={"Auth Api"},
     *  description="use for send verification sms to user",
     * @OA\RequestBody(
     *    required=true,
     * *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="mobile",
     *                  description="Enter mobile number",
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

    public function sendSms(Request $request)
    {
        $mobile = $request->input('mobile');
        $checkLastSms = SmsCode::checkTwoMinute($mobile);
        if(!$checkLastSms){
            $code = rand(1111, 9999);
            SmsCode::createSmsCode($mobile, $code);
            return Response()->json([
                'result'=>true,
                'message'=>"send sms is done",
                'data'=>[
                    'mobile'=>$mobile,
                    'code'=>$code
                ]
            ],201);
        }else{
            return Response()->json([
                'result'=>false,
                'message'=>"please wait for two minutes",
                'data'=>[]
            ],403);
        }
    }

    /**
     * @OA\Post(
     ** path="/api/v1/verify_sms_code",
     *  tags={"Auth Api"},
     *  description="use to check sms code that recieved by user",
     * @OA\RequestBody(
     *    required=true,
     * *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="mobile",
     *                  description="user mobile number",
     *                  type="string",
     *               ),
     *           @OA\Property(
     *                  property="code",
     *                  description="recieved user sms code",
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
    public function verifySms(Request $request)
    {
        $mobile = $request->input('mobile');
        $code = $request->input('code');

        $check = SmsCode::checkSend($mobile, $code);
        if($check){

            $user = User::query()->where('mobile', $mobile)->first();

            if($user){
                return Response()->json([
                    'result'=>true,
                    'message'=>"user registered before",
                    'data'=>[
                        'id'=>$user->id,
                        'token'=>$user->createToken("new Token")->plainTextToken
                    ]
                ],201);
            }else{

                $user = User::query()->create([
                    'mobile'=>$mobile,
                    'password'=> Hash::make(rand(1111,9999))
                ]);

                return Response()->json([
                    'result'=>true,
                    'message'=>"new user created",
                    'data'=>[
                        'id'=>$user->id,
                        'token'=>$user->createToken("new Token")->plainTextToken
                    ]
                ],201);
            }
        }
    }
}
