<?php

namespace App\Helpers;

use App\Models\User;
use DateTime;
use Hekmatinasser\Verta\Verta;

class Helper{
    public static function make_slug($string)
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public static function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function generateRandomInteger($length = 20)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $codeExist = User::query()->where('code', $randomString)->first();
        if ($codeExist) {
            // return $this->generateRandomInteger(6);
        } else {
            return $randomString;
        }
    }
}