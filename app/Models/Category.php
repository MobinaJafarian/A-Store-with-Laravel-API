<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
