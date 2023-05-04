<?php

namespace App\Models;

use App\Http\Resources\BrandResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image'
    ];

    public static function saveImage($file){
        if($file){
            $name = time().'.'.$file->extension();
            $smallImage = Image::make($file->getRealPath());
            $bigImage = Image::make($file->getRealPath());
            $smallImage->resize(256,256,function ($constraint){
                $constraint->aspectRatio();
            });
            Storage::disk('local')->put('admin/brands/small/'.$name,(string) $smallImage->encode('png',90));
            Storage::disk('local')->put('admin/brands/big/'.$name,(string) $bigImage->encode('png',90));
            return $name;
        }else{
            return '';
        }
    }

    public static function getAllBrands()
    {
        $brands = self::query()->get();
        return BrandResource::collection($brands);
    }
}
