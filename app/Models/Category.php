<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->withDefault(['title' => '-----']);
    }
    
    public function child()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public static function saveImage($file){
        if($file){
            $name = time().'.'.$file->extension();
            $smallImage = Image::make($file->getRealPath());
            $bigImage = Image::make($file->getRealPath());
            $smallImage->resize(256,256,function ($constraint){
                $constraint->aspectRatio();
            });
            Storage::disk('local')->put('admin/categories/small/'.$name,(string) $smallImage->encode('png',90));
            Storage::disk('local')->put('admin/categories/big/'.$name,(string) $bigImage->encode('png',90));
            return $name;
        }else{
            return '';
        }
    }
}
