<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
       'image',
       'product_id'
    ];

    public static function saveImage($file){
        if($file){
            $name = time().'.'.$file->extension();
            $smallImage = Image::make($file->getRealPath());
            $bigImage = Image::make($file->getRealPath());
            $smallImage->resize(256,256,function ($constraint){
                $constraint->aspectRatio();
            });
            Storage::disk('local')->put('admin/products/small/'.$name,(string) $smallImage->encode('png',90));
            Storage::disk('local')->put('admin/products/big/'.$name,(string) $bigImage->encode('png',90));
            return $name;
        }else{
            return '';
        }
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
